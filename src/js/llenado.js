function generarTextoAleatorio(longitud = 50) {
  const palabras = ['casa', 'moderna', 'amplia', 'luminosa', 'céntrica', 'jardín', 'nueva', 'lujo', 'vista', 'tranquila'];
  let resultado = [];
  for (let i = 0; i < longitud; i++) {
    resultado.push(palabras[Math.floor(Math.random() * palabras.length)]);
  }
  return resultado.join(' ') + '.';
}

function numeroAleatorio(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

document.getElementById('auto-fill').addEventListener('click', function () {
  fetch('/contar_propiedades.php')
    .then((response) => response.text())
    .then((data) => {
      const cantidadPropiedades = parseInt(data);
      const titulos = [
        'Casa Moderna en la Ciudad',
        'Departamento Céntrico de Lujo',
        'Casa Rural con Jardín',
        'Ático con Vista Panorámica',
        'Chalet Familiar en Zona Tranquila',
      ];
      const precios = [15000, 23000, 32000, 18000, 27500];
      const titulo = cantidadPropiedades + 1 + ' - ' + titulos[Math.floor(Math.random() * titulos.length)];
      const precio = precios[Math.floor(Math.random() * precios.length)];
      const descripcion = generarTextoAleatorio(60);
      const habitaciones = numeroAleatorio(1, 9);
      const wc = numeroAleatorio(1, 9);
      const estacionamiento = numeroAleatorio(1, 9);
      document.getElementById('titulo').value = titulo;
      document.getElementById('precio').value = precio;
      document.getElementById('descripcion').value = descripcion;
      document.getElementById('habitaciones').value = habitaciones;
      document.getElementById('wc').value = wc;
      document.getElementById('estacionamiento').value = estacionamiento;

      // Elige aleatoriamente uno de los vendedores disponibles
      const selectVendedor = document.getElementById('vendedor');
      const totalOpciones = selectVendedor.options.length;
      if (totalOpciones > 1) {
        const indice = numeroAleatorio(1, totalOpciones - 1);
        selectVendedor.selectedIndex = indice;
      }
    });
});
