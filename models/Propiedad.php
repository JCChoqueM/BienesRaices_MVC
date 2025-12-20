<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }
    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        } elseif (mb_strlen($this->titulo, 'UTF-8') > 45) {
            $longitud = mb_strlen($this->titulo, 'UTF-8');
            $exceso = $longitud - 45;
            self::$errores[] = "El título no debe exceder los 45 caracteres. Has usado $longitud caracteres, te pasaste por $exceso.";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir un numero de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir un numero de baños";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir un numero de estacionamientos";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes Elejir un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }
}
