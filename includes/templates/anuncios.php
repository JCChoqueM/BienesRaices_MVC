  <?php

    use App\Propiedad;


    if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
        $propiedades = Propiedad::all();
    } else {
        $propiedades = Propiedad::get(3);
    }
    ?>


  <div class="contenedor-anuncios">

      <!-- subBloque2 anuncio Alberca [inicio] -->

      <?php foreach ($propiedades as $propiedad): ?>

          <div class="anuncio">
              <img
                  loading="lazy"
                  width="200"
                  height="300"
                  src="/imagenes/<?php echo $propiedad->imagen; ?>"
                  alt="anuncio" />


              <!-- subBloque3 contenido-anuncio Alberca [inicio] -->
              <div class="contenido-anuncio">
                  <h3><?php echo $propiedad->titulo; ?></h3>

                  <p><?php echo $propiedad->descripcion; ?></p>
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
                  <a
                      href="anuncio.php?id=<?php echo $propiedad->id; ?>"
                      class="boton-amarillo-block">
                      Ver Propiedad
                  </a>
              </div>
              <!-- !subBloque3 contenido-anuncio Alberca [fin] -->
          </div>
          <!-- !subBloque2 anuncio Alberca [fin] -->

      <?php endforeach; ?>
  </div>