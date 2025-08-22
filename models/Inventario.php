<?php
namespace Model;

class Inventario extends ActiveRecord {
    protected static $tabla = 'inventario';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'imagen', 'precio', 'disponibles'];

    public $id;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $precio;
    public $disponibles;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La Descripción es Obligatoria';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La Imagen es obligatoria';
        }
        if(!$this->precio || !is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El Campo Precio es Obligatorio';
        }
        if(!$this->disponibles || !is_numeric($this->disponibles)) {
            self::$alertas['error'][] = 'El Campo Disponibles es obligatorio';
        }

        return self::$alertas;
    }
}
