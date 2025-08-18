<?php

namespace Model;

class Contacto extends ActiveRecord {

    protected static $tabla = 'contacto';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'mensaje'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $mensaje;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this->fecha = $args['fecha'] ?? '';

    }


    public function validarContacto() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->telefono) {
            self::$alertas['error'][] = 'El Campo Teléfono es Obligatorio';
        }
        if(!$this->mensaje) {
            self::$alertas['error'][] = 'El Campo Mensaje es Obligatorio';
        }
    }
}