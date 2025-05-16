@extends('welcome')

@section('content')
    <section class="max-w-md mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crear cuenta</h1>

            <form action="{{ route('register') }}" method="GET">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                        Registrarse
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 text-sm">
                    ¿Ya tienes cuenta? Inicia sesión
                </a>
            </div>
        </div>
    </section>
@endsection
