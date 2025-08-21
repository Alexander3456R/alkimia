<?php
namespace Model;

class Inventario extends ActiveRecord {
    protected static $tabla = 'inventario';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'disponibles'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
    }


    public function validar() {
            if(!$this->nombre) {
                self::$alertas['error'][] = 'El Nombre es Obligatorio';
            }
            if(!$this->descripcion) {
                self::$alertas['error'][] = 'La descripción es Obligatoria';
            }
            if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
                self::$alertas['error'][] = 'Añade una cantidad';
            }

            return self::$alertas;
        }
}