@extends('welcome')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-12">
    <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="mt-4 text-3xl font-bold text-gray-900">¡Pago completado con éxito!</h1>
        <p class="mt-2 text-lg text-gray-600">Tu pedido #{{ str_pad(rand(1000, 9999), 6, '0', STR_PAD_LEFT) }} ha sido procesado.</p>
    </div>

    <div class="mt-10 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <!-- Resumen del pedido -->
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Resumen del pedido</h2>

            <div class="space-y-4">
                @foreach($carrito as $item)
                <div class="flex justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-12 h-12 object-cover rounded">
                        <span class="text-gray-700">{{ $item['nombre'] }} × {{ $item['cantidad'] }}</span>
                    </div>
                    <span class="font-medium">${{ number_format($item['precio'] * $item['cantidad'], 2) }}</span>
                </div>
                @endforeach
            </div>

            <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-medium">${{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Envío</span>
                    <span class="font-medium">$0.00</span>
                </div>
                <div class="flex justify-between text-lg font-bold text-gray-800 pt-2">
                    <span>Total</span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Información de envío -->
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Información de envío</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Dirección de envío</h3>
                    <p class="mt-1 text-gray-900">Juan Pérez<br>Av. Revolución 1234<br>Col. Centro, CDMX<br>06000</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Método de envío</h3>
                    <p class="mt-1 text-gray-900">Estándar (3-5 días hábiles)</p>

                    <h3 class="text-sm font-medium text-gray-500 mt-4">Método de pago</h3>
                    <p class="mt-1 text-gray-900">Tarjeta de crédito terminada en 4242</p>
                </div>
            </div>
        </div>

        <!-- Acciones -->
        <div class="p-6">
            <div class="flex flex-col sm:flex-row justify-center gap-3">
                <a href="/" class="inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                    Seguir comprando
                </a>
                <a href="#" class="inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50">
                    Ver detalles del pedido
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
