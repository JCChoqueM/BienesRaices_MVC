<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apeliido', 'telefono'];

    public $id;
    public $nombre;
    public $apeliido;
    public $telefono;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apeliido = $args['apeliido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El Nombre es Obligatorio";
        }
        if (!$this->apeliido) {
            self::$errores[] = "El Apellido es Obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[] = "El Telefono es Obligatorio";
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "El Telefono debe contener 10 digitos";
        }

        return self::$errores;
    }
}
