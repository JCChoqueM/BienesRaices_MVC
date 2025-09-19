<main class="contenedor seccion">
  <h1>Crear Vendedor</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>
  <button type="button" class="boton boton-amarillo" id="auto-fill">Llenado Automático</button>
  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>
  <form class="formulario" method="POST" action="/vendedores/crear">

    <?php
    include __DIR__ . '/formulario.php';

    ?>

    <input type="submit" value="Crear Vendedor" class="boton boton-verde">
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtener el botón de llenado automático
      const btnAutoFill = document.querySelector('#auto-fill');

      if (btnAutoFill) {
        btnAutoFill.addEventListener('click', function() {
          // Nombres y apellidos de ejemplo
          const nombres = ['Juan', 'María', 'Carlos', 'Ana', 'Pedro', 'Luis', 'Rosa', 'Miguel', 'Sofía', 'Diego'];
          const apellidos = ['García', 'López', 'Martínez', 'Rodríguez', 'Sánchez', 'Pérez', 'González', 'Fernández', 'Torres', 'Ramírez'];

          // Generar datos aleatorios
          const nombreAleatorio = nombres[Math.floor(Math.random() * nombres.length)];
          const apellidoAleatorio = apellidos[Math.floor(Math.random() * apellidos.length)];

          // Generar número de teléfono de 10 dígitos
          let telefono = '';
          for (let i = 0; i < 10; i++) {
            telefono += Math.floor(Math.random() * 10).toString();
          }

          // Llenar el formulario
          document.querySelector('#nombre').value = nombreAleatorio;
          document.querySelector('#apeliido').value = apellidoAleatorio;
          document.querySelector('#telefono').value = telefono;
        });
      }
    });
  </script>
</main>