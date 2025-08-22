<?php
require __DIR__ . '/vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

echo "Clases cargadas: \n";
print_r(class_exists(Image::class) ? "ImageManagerStatic OK" : "No encontrado");
