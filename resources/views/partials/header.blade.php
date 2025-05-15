<header class="bg-white shadow-md">
  <div class="container mx-auto flex items-center justify-between p-4">
      <!-- Logo -->
      <a href="{{ route('main') }}">
          <img src={{ asset("logo.svg")}} alt="Icono" class="h-30 w-auto">
      </a>

      <!--Header-->
      <nav class="hidden md:flex space-x-6">
          <ol class="flex space-x-6">
              <li><a id="btn_hombre" class="text-gray-700 hover:text-gray-900 font-medium">Hombre</a></button></li>
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

          <!-- Icono del carrito -->
          <a href="{{ route('cart.view') }}" class="relative p-2 text-gray-700 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              @if(count(Session::get('cart', [])) > 0)
                  <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                      {{ array_sum(array_column(Session::get('cart', []), 'cantidad')) }}
                  </span>
              @endif
          </a>

          <!-- Botón del menú móvil -->
          <button id="menu-toggle" class="md:hidden p-2 focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
          </button>
      </div>
  </div>

  <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
      <ol class="flex flex-col space-y-4 p-4">
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Hombre</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Mujer</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Niños</a></li>
          <li><a class="text-gray-700 hover:text-gray-900 font-medium">Ofertas</a></li>
      </ol>
  </div>
</header>
