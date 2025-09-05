document.addEventListener('DOMContentLoaded', function () {
  eventListener();
  darkMode();
});
function darkMode() {
  const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
  /*   console.log(prefiereDarkMode.matches) */
  if (prefiereDarkMode.matches) {
    document.body.classList.add('dark-mode'); // añade la clase
  } else {
    document.body.classList.remove('dark-mode'); // quita la clase
  }
  prefiereDarkMode.addEventListener('change', function () {
    if (prefiereDarkMode.matches) {
      document.body.classList.add('dark-mode'); // añade la clase
    } else {
      document.body.classList.remove('dark-mode'); // quita la clase
    }
  });

  const botonDarkMode = document.querySelector('.dark-mode-boton');
  botonDarkMode.addEventListener('click', function () {
    document.body.classList.toggle('dark-mode'); // añade o quita la clase
  });
}
function eventListener() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', navegacionResponsive);
  //muestra campos condicionales
  const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
  metodoContacto.forEach((input) => input.addEventListener('click', mostrarMetodoContacto));
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion');

  navegacion.classList.toggle('mostrar'); /* añade o quita la clase */
  /*  if (navegacion.classList.contains('mostrar')) {
   navegacion.classList.remove('mostrar');
  } else {
   navegacion.classList.add('mostrar');
  } */
}

function mostrarMetodoContacto(e) {
  const contactoDiv = document.querySelector('#contacto');
  if (e.target.value === 'telefono') {
    contactoDiv.innerHTML = `<label for="telefono">Número de Telefono:</label>
      <input
        type="tel"
        id="telefono"
        placeholder="Tu Telefono"
        name="contacto[telefono]" />
         <p>Elija la fecha y la hora para la llamada</p>
      <label for="fecha">Fecha:</label>
      <input
        type="date"
        id="fecha"
        name="contacto[fecha]" />
      <label for="hora">Hora:</label>
      <input
        type="time"
        id="hora"
        min="09:00"
        max="18:00"
        name="contacto[hora]" />
    `;
  } else {
    contactoDiv.innerHTML = `
       <label for="email">Email:</label>
      <input
        type="email"
        id="email"
        placeholder="Tu Email"
        name="contacto[email]"
        required />
    `;
  }
}
