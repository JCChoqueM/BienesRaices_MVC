<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices </title>
    <link
        rel="stylesheet"
        href="/build/css/app.css" />
</head>

<body>
    <!-- BLOQUE header [inicio] -->
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor <?php echo $inicio ? 'contenido-header' : ''; ?> ">
            <!-- subBloque barra [inicio] -->
            <div class="barra">
                <!-- subBloque2 logo BienesRaices [inicio] -->
                <a href="/index.php">
                    <img
                        src="/build/img/logo.svg"
                        alt="Logotipo de Bienes Raices" />
                </a>
                <!-- !subBloque2 logo BienesRaices [fin] -->
                <div class="mobile-menu">
                    <img
                        src="/build/img/barras.svg"
                        alt="icono menu responsive" />
                </div>
                <!-- subBloque2 navegacion [inicio] -->
                <div class="derecha">
                    <img
                        src="/build/img/dark-mode.svg"
                        class="dark-mode-boton" />
                    <nav class="navegacion">
                        <a href="nosotros.php"> Nosotros</a>
                        <a href="anuncios.php">Anuncio</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
                <!-- !subBloque2 navegacion [fin] -->
            </div>
            <!-- !subBloque barra [fin] -->
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : ""; ?>


        </div>
    </header>
    <!-- !BLOQUE header [fin] -->