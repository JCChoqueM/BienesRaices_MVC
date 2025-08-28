<main class="contenedor seccion">
    <h1>Actualizar</h1>
<a href="/admin" class="boton boton-verde">Volver</a>
  <button type="button" class="boton boton-amarillo" id="auto-fill">Llenado Automático</button>
      <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php
        include __DIR__ . '/formulario.php';
        
        ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>