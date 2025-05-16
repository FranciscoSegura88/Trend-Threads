@extends('welcome')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Mi cuenta</h1>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <h2 class="text-lg font-semibold mb-4">Información personal</h2>
                <p><strong>Nombre:</strong> {{ $user['name'] ?? 'No especificado' }}</p>
                <p><strong>Email:</strong> {{ $user['email'] ?? 'No especificado' }}</p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-4">Acciones</h2>
                <a href="{{ route('orders') }}" class="block mb-2 text-blue-600 hover:text-blue-800">
                    Mis pedidos
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    <button type="submit" class="text-red-600 hover:text-red-800">
                        Cerrar sesión
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
