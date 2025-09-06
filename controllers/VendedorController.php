<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
  public static function crear(Router $router)
  {
    $errores = Vendedor::getErrores();
    $vendedor = new Vendedor;
    //arreglo con mensajes de errores

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $vendedor = new Vendedor($_POST['vendedor']);

      $errores = $vendedor->validar();


      if (empty($errores)) {
        //Guarda en la base de datos
        $vendedor->guardar();
      }
    }
    $router->render("vendedores/crear", [
      'vendedor' => $vendedor,
      'errores' => $errores
    ]);
  }
  
  public static function actualizar(Router $router)
  {

    $errores = Vendedor::getErrores();
    $id = validarORedireccionar('/admin');
    $vendedor = Vendedor::find($id);
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      //Asignar los atributos
      $args = $_POST['vendedor'];

      $vendedor->sincronizar($args);

      // Validacion
      $errores = $vendedor->validar();

      if (empty($errores)) {
        $vendedor->guardar();
      }
    }
    $router->render("vendedores/actualizar", [

      'vendedor' => $vendedor,
      'errores' => $errores
    ]);
  }
  public static function eliminar()
  {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
      $id = $_POST['id'];
 
      $id = filter_var($id, FILTER_VALIDATE_INT);
      if ($id) {
        $tipo = $_POST['tipo'] ?? '';
        if (validarTipoContenido($tipo)) {
          $vendedor = Vendedor::find($id);
          $vendedor->eliminar();
        }
      }
    }
  }
}
