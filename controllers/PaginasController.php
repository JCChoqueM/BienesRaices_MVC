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
      $send = $_GET['send'] ?? null;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $respuestas = $_POST['contacto'];

         //crear una nueva instancia
         $mail = new PHPMailer();

         //configurar SMTP
         $mail->isSMTP();
         $mail->Host = 'sandbox.smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Username = '8fefb8f9915fa9';
         $mail->Password = 'ed2804ec46bcf4';
         //funciona
         /*          $mail->Username = '8fefb8f9915fa9';
         $mail->Password = 'ed2804ec46bcf4'; */

         //no funciona
   /*       $mail->Username = '2fa30b65028981';
         $mail->Password = '2b53453ad4ce9d'; */

         $mail->SMTPSecure = 'tls';
         $mail->Port = 2525;

         //configurar el contenido del mail
         $mail->setFrom('admin@bienesraices.com');
         $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
         $mail->Subject = 'Tienes un nuevo mensaje';

         //habilitar HTML
         $mail->isHTML(true);
         $mail->CharSet = 'UTF-8';

         //definir el contenido
         $contenido = '<html>';
         $contenido .= '<p>Un nuevo cliente quiere contactarse con ustedes</p>';
         $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

         if ($respuestas['contacto'] == 'telefono') {
            $contenido .= '<p>Eligio ser contactado por Teléfono. </p>';
            $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
            $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] . '</p>';
            $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] . '</p>';
         } else {
            $contenido .= '<p>Eligio ser contactado por email:</p>';
            $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
         }

         $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
         $contenido .= '<p>Vende o compra:' . $respuestas['tipo'] . '</p>';
         $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . '</p>';
         $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';

         $contenido .= ' <p>Tienes un nuevo mensaje</p>';
         $contenido .= '</html>';
         $mail->Body .= $contenido;
         $mail->AltBody = 'Esto es un texto alternativo sin HTML';

         $mail->Body = $contenido;

         //enviar el mail
         if ($mail->send()) {
            $mensaje = '(send)Mensaje enviado correctamente';
            header('Location: /contacto?send=4');
            exit;
         } else {
            $mensaje = '(send)Error al enviar el mensaje';
            header('Location: /contacto?send=5');
            exit;
         }
      }

      $router->render("paginas/contacto", [
         'send' => $send
      ]);
   }
}
