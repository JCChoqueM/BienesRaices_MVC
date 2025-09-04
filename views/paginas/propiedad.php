<main class="contenedor contenido-centrado">

  <h1><?php echo $propiedad->titulo; ?></h1>
  <div class="anuncio">
    <img
      loading="lazy"
      width="200"
      height="300"
      src="/imagenes/<?php echo $propiedad->imagen; ?>"
      alt="imagen de la propiedad" />

    <div class="resumen-propiedad">
      <p class="precio">$<?php echo $propiedad->precio; ?></p>
      <ul class="iconos-caracteristicas">
        <li>
          <img
            class="icono"
            src="build/img/icono_wc.svg"
            alt="icono wc" />
          <p><?php echo $propiedad->wc; ?></p>
        </li>
        <li>
          <img
            class="icono"
            src="build/img/icono_estacionamiento.svg"
            alt="icono estacionamiento" />
          <p><?php echo $propiedad->estacionamiento; ?></p>
        </li>
        <li>
          <img
            class="icono"
            src="build/img/icono_dormitorio.svg"
            alt="icono dormitorio" />
          <p><?php echo $propiedad->habitaciones; ?></p>
        </li>
      </ul>
      <p>
        <?php echo $propiedad->descripcion; ?>
      </p>

    </div>
  </div>


</main>