const path = require('path')
const fs = require('fs')
const { glob } = require('glob')
const { src, dest, watch, series, parallel } = require('gulp')

// SCSS
const dartSass = require('sass')
const gulpSass = require('gulp-sass')(dartSass)
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')
const cssnano = require('cssnano')
const sourcemaps = require('gulp-sourcemaps')

// JavaScript
const webpack = require('webpack-stream')
const terser = require('gulp-terser')
const rename = require('gulp-rename')

// Imágenes
const sharp = require('sharp')

// Logs
const log = require('fancy-log')

// Función para manejar errores sin detener Gulp
function handleError(err) {
    log.error('💥 Error:', err.message)
    this.emit('end')
}

// Rutas
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    jsEntry: 'src/js/app.js',
    images: 'src/img/**/*.{jpg,png}',
    build: 'public/build'
}

// CSS
function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(gulpSass({ outputStyle: 'expanded' }).on('error', handleError))
        .pipe(postcss([autoprefixer(), cssnano()]).on('error', handleError))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('public/build/css'))
        .on('end', () => log('✅ SCSS compilado'))
}

// JavaScript con Webpack + Terser
function js() {
    return src(paths.jsEntry)
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.css$/i,
                        use: ['style-loader', 'css-loader']
                    }
                ]
            },
            mode: 'production',
            entry: './src/js/app.js'
        }).on('error', handleError))
        .pipe(sourcemaps.init())
        .pipe(terser().on('error', handleError))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/js'))
        .on('end', () => log('✅ JS compilado'))
}

// Procesar imágenes (JPG, PNG → JPG, WebP, AVIF)
async function imagenes(done) {
    const srcDir = 'src/img'
    const buildDir = `${paths.build}/img`
    const images = await glob(paths.images)

    for (const file of images) {
        const relativePath = path.relative(srcDir, path.dirname(file))
        const outputDir = path.join(buildDir, relativePath)

        if (!fs.existsSync(outputDir)) {
            fs.mkdirSync(outputDir, { recursive: true })
        }

        const baseName = path.basename(file, path.extname(file))
        const extName = path.extname(file)
        const outputFile = path.join(outputDir, `${baseName}${extName}`)
        const outputWebp = path.join(outputDir, `${baseName}.webp`)
        const outputAvif = path.join(outputDir, `${baseName}.avif`)

        const options = { quality: 80 }

        try {
            await sharp(file).toFile(outputFile)
            await sharp(file).webp(options).toFile(outputWebp)
            await sharp(file).avif().toFile(outputAvif)
            log(`🖼️ Procesada imagen: ${file}`)
        } catch (err) {
            log.error(`❌ Error procesando imagen ${file}:`, err)
        }
    }

    log('✅ Imágenes optimizadas')
    done()
}

// Watcher
function dev() {
    log('👀 Observando cambios...')
    watch(paths.scss, series(css))
    watch(paths.js, series(js))
    watch(paths.images, series(imagenes))
}

// Exportaciones
exports.css = css
exports.js = js
exports.imagenes = imagenes
exports.dev = dev
exports.default = series(parallel(css, js, imagenes), dev)