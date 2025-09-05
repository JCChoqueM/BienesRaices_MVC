<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source
      srcset="build/img/destacada.webp"
      type="image/webp" />
    <source
      srcset="build/img/destacada.avif"
      type="image/avif" />
    <img
      loading="lazy"
      width="200"
      height="300"
      src="build/img/destacada.jpg"
      alt="" />
  </picture>
  <h2>Llene el formulario de contacto</h2>
  <!-- Botón JS para llenar el formulario -->
  <button id="llenarForm" class="boton boton-azul">Llenar Formulario</button>

  <form
    action="/contacto"
    method="POST"
    class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>
      <label for="nombre">Nombre:</label>
      <input
        type="text"
        id="nombre"
        placeholder="Tu Nombre"
        name="contacto[nombre]"
        required />
   
      
      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
    </fieldset>
    <fieldset>
      <legend>Informacion sobre Propiedad</legend>
      <label for="opciones">Vende o Compra:</label>
      <select id="opciones" name="contacto[tipo]" required>
        <option
          value=""
          disabled
          selected>
          --Seleccione--
        </option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
      </select>
      <label for="presupuesto">Precio o Presupuesto:</label>
      <input
        type="number"
        id="presupuesto"
        placeholder="Tu Precio o Presupuesto"
        name="contacto[precio]"
        required />
    </fieldset>
    <fieldset>
      <legend>Informacion sobre la Propiedad</legend>
      <p>Como desea ser contactado</p>
      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input
          type="radio"
          name="contacto[contacto]"
          value="telefono"
          id="contactar-telefono"
          required />
        <label for="contactar-email">Email</label>
        <input
          type="radio"
          name="contacto[contacto]"
          value="email"
          id="contactar-email"
          required />
      </div>

      <div id="contacto"></div>

    
    </fieldset>
    <input
      type="submit"
      value="Enviar"
      class="boton boton-verde" />
  </form>
</main>

<script>
  document.getElementById("llenarForm").addEventListener("click", function() {
    document.getElementById("nombre").value = "Juan Pérez";
    document.getElementById("email").value = "juanperez@example.com";
    document.getElementById("telefono").value = "71234567";
    document.getElementById("mensaje").value = "Estoy interesado en una propiedad.";

    document.getElementById("opciones").value = "Compra";
    document.getElementById("presupuesto").value = 50000;

    document.getElementById("contactar-email").checked = true;

    // Fecha de hoy por defecto
    let hoy = new Date().toISOString().split("T")[0];
    document.getElementById("fecha").value = hoy;

    // Hora por defecto (10:00)
    document.getElementById("hora").value = "10:00";
  });
</script>
<style>
  .boton {
    display: inline-block;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    text-align: center;
    transition: all 0.3s ease-in-out;
  }

  .boton-verde {
    background-color: #28a745;
    color: white;
  }

  .boton-verde:hover {
    background-color: #218838;
    transform: scale(1.05);
  }

  .boton-azul {
    background-color: #007bff;
    color: white;
    margin-top: 15px;
    margin-left: 10px;
  }

  .boton-azul:hover {
    background-color: #0069d9;
    transform: scale(1.05);
  }
</style>