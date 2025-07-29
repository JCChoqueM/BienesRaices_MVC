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
