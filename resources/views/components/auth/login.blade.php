@extends('welcome')

@section('content')
    <section class="max-w-md mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Iniciar sesión</h1>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="GET">
              <div class="space-y-4">
                  <div>
                      <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                      <input type="email" id="email" name="email" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-md">
                  </div>
                  <div>
                      <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                      <input type="password" id="password" name="password" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-md">
                  </div>
                  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                      Ingresar
                  </button>
              </div>
          </form>

          <script>
            // Opcional: Previene envíos duplicados
            document.getElementById('login-form').addEventListener('submit', function() {
                this.querySelector('button[type="submit"]').disabled = true;
            });
          </script>

            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                    ¿No tienes cuenta? Regístrate
                </a>
            </div>
        </div>
    </section>
@endsection
