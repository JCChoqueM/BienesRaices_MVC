<main class="contenedor seccion">
  <h1>Actualizar Vendedor(a)</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>
  <button type="button" class="boton boton-amarillo" id="auto-fill">Llenado Automático</button>
  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
  <form action="" class="formulario" method="POST" >
    <?php
    include __DIR__ . '/formulario.php';

    ?>
    <input type="submit" value="Guardar Cambios" class="boton boton-verde">
  </form>
</main>