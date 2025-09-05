<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
   public static function index(Router $router)
   {
      $propiedades = Propiedad::get(3);
      $inicio = true;

      $router->render("paginas/index", [
         'propiedades' => $propiedades,
         'inicio' => $inicio
      ]);
   }
   public static function nosotros(Router $router)
   {
      $router->render("paginas/nosotros", []);
   }
   public static function propiedades(Router $router)
   {
      $propiedades = Propiedad::all();

      $router->render("paginas/propiedades", [
         'propiedades' => $propiedades,
      ]);
   }
   public static function propiedad(Router $router)
   {
      $id = validarORedireccionar('/propiedades');

      //buscar la propiedad por su id
      $propiedad = Propiedad::find($id);

      $router->render("paginas/propiedad", [
         'propiedad' => $propiedad,
      ]);
   }
   public static function blog(Router $router)
   {
      $router->render("paginas/blog", []);
   }
   public static function entrada(Router $router)
   {
      $router->render("paginas/entrada", []);
   }
   public static function contacto(Router $router)
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $respuestas = $_POST['contacto'];

         //crear una nueva instancia
         $mail = new PHPMailer();

         //configurar SMTP
         $mail->isSMTP();
         $mail->Host = 'sandbox.smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Username = '2fa30b65028981';
         $mail->Password = '2b53453ad4ce9d';
         $mail->SMTPSecure = 'tls'; //tls=transport layer security  'mas seguro que ssl'
         $mail->Port = 2525;

         //configurar el contenido del mail
         $mail->setFrom('admin@bienesraices.com'); //quien envia el mail
         $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); //quien recibe el mail
         $mail->Subject = 'Tienes un nuevo mensaje';

         //habilitar HTML
         $mail->isHTML(true); //enviar como HTML
         $mail->CharSet = 'UTF-8'; //caracteres especiales (español ñ ´)

         //definir el contenido
         $contenido = '<html>';
         $contenido .= '<p>Un nuevo cliente quiere contactarse con ustedes</p>';
         $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
         $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
         $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
         $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
         $contenido .= '<p>Vende o compra:' . $respuestas['tipo'] . '</p>';
         $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . '</p>';
         $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';
          $contenido.= '<p>Fecha de contacto: ' . $respuestas['fecha'] . '</p>';
         $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] . '</p>';
         $contenido .= ' <p>Tienes un nuevo mensaje</p>';
         $contenido .= '</html>';
         $mail->Body .= $contenido;
         $mail->AltBody = 'Esto es un texto alternativo sin HTML';

         $mail->Body = $contenido;

         //enviar el mail
         if ($mail->send()) {
            echo 'Mensaje enviado correctamente';
         } else {
            echo 'Error al enviar el mensaje';
         }
      }
      $router->render("paginas/contacto", []);
   }
}
