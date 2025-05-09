document.addEventListener('DOMContentLoaded', function() {
  // Elementos del DOM
  const btnHombre = document.getElementById('btn_hombre');
  const btnMujer = document.getElementById('btn_mujer');
  const btnNinos = document.getElementById('btn_ninos');
  const btnOfertas = document.getElementById('btn_ofertas');
  const cards = document.getElementsByClassName('card');
  const subcategorias = document.querySelectorAll('.subcategoria');
  const buscador = document.getElementById('buscador');

  // Función para filtrar por categoría
  function filtrarPorCategoria(categoria) {
      Array.from(cards).forEach(card => {
          const mostrar = card.classList.contains(categoria);
          card.classList.toggle('hidden', !mostrar);
      });
  }

  // Event listeners para botones de categoría
  btnHombre.addEventListener('click', () => filtrarPorCategoria('hombre'));
  btnMujer.addEventListener('click', () => filtrarPorCategoria('mujer'));
  btnNinos.addEventListener('click', () => filtrarPorCategoria('ninos'));
  btnOfertas.addEventListener('click', () => filtrarPorCategoria('trend'));

  // Filtrado por subcategorías
  subcategorias.forEach(sub => {
      sub.addEventListener('change', function() {
          const subSeleccionadas = Array.from(subcategorias)
              .filter(s => s.checked)
              .map(s => s.dataset.sub);

          Array.from(cards).forEach(card => {
              const mostrar = subSeleccionadas.length === 0 ||
                  subSeleccionadas.some(sub => card.classList.contains(sub));
              card.classList.toggle('hidden', !mostrar);
          });
      });
  });

  // Búsqueda
  buscador.addEventListener('input', function() {
      const texto = this.value.toLowerCase();

      Array.from(cards).forEach(card => {
          const nombre = card.dataset.nombre;
          const descripcion = card.dataset.descripcion;
          const mostrar = texto === '' ||
              nombre.includes(texto) ||
              descripcion.includes(texto);

          card.classList.toggle('hidden', !mostrar);
      });
  });

  // Menú móvil
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', function() {
          mobileMenu.classList.toggle('hidden');
      });
  }
});
