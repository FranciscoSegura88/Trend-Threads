<header class="bg-white shadow-md">
  <div class="container mx-auto flex items-center justify-between p-4">
      <!-- Logo -->
      <a href="{{ route('main') }}">
          <img src="{{ asset('logo.svg') }}" alt="Icono" class="h-30 w-auto">
      </a>

      <!-- Menú principal -->
      <nav class="hidden md:flex space-x-6">
          <ol class="flex space-x-6">
              <li><a id="btn_hombre" class="text-gray-700 hover:text-gray-900 font-medium">Hombre</a></li>
              <li><a id="btn_mujer" class="text-gray-700 hover:text-gray-900 font-medium">Mujer</a></li>
              <li><a id="btn_ninos" class="text-gray-700 hover:text-gray-900 font-medium">Niños</a></li>
              <li><a id="btn_ofertas" class="text-gray-700 hover:text-gray-900 font-medium">Ofertas</a></li>
          </ol>
      </nav>

      <div class="flex items-center space-x-4">
          <!-- Barra de búsqueda -->
          <div class="hidden md:block">
              <input type="text" id="buscador" placeholder="Buscar productos..."
                  class="border border-gray-300 rounded-lg px-4 py-2 w-50">
          </div>

          <!-- Menú de usuario (VERSIÓN TOGGLE CON CLIC) -->
          @if(session('user'))
          <div class="relative" x-data="{ open: false }">
              <button @click="open = !open" class="flex items-center space-x-1 text-gray-700 hover:text-gray-900">
                  <span>{{ Str::limit(session('user')['name'], 10) }}</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                  </svg>
              </button>
              <div
                  x-show="open"
                  @click.away="open = false"
                  class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200"
              >
                  <a href="{{ route('account') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi cuenta</a>
                  <a href="{{ route('orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mis pedidos</a>
                  <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
              </div>
          </div>
          @else
          <div class="flex space-x-4">
              <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium hidden md:block">Ingresar</a>
              <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium hidden md:block">Registrarse</a>
          </div>
          @endif

          <!-- Icono del carrito (igual que antes) -->
          <a href="{{ route('cart.view') }}" class="relative p-2 text-gray-700 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
              @if(count(Session::get('cart', [])) > 0)
                  <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                      {{ array_sum(array_column(Session::get('cart', []), 'cantidad')) }}
                  </span>
              @endif
          </a>

          <!-- Botón del menú móvil (igual que antes) -->
          <button id="menu-toggle" class="md:hidden p-2 focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
          </button>
      </div>
  </div>

  <!-- Menú móvil (igual que antes) -->
  <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
      <ol class="flex flex-col space-y-4 p-4">
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Hombre</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Mujer</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Niños</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Ofertas</a></li>
          @if(session('user'))
              <li><a href="{{ route('account') }}" class="text-gray-700 hover:text-gray-900 font-medium">Mi cuenta</a></li>
              <li><a href="{{ route('logout') }}" class="text-gray-700 hover:text-gray-900 font-medium">Cerrar sesión</a></li>
          @else
              <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-medium">Ingresar</a></li>
              <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 font-medium">Registrarse</a></li>
          @endif
      </ol>
  </div>
</header>

<!-- Scripts (agrega Alpine.js solo si no lo tienes) -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    // Menú móvil (igual que antes)
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
