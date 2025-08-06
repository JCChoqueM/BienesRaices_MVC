<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/nosotros', 'funcion_nosotros');
$router->get('/anuncios', 'funcion_anuncios');
$router->get('/contacto', 'funcion_contacto');
$router->get('/blog', 'funcion_blog');
$router->get('/propiedad', 'funcion_propiedad');



$router->comprobarRutas();
