@extends('welcome')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Mis Pedidos</h1>

    @if(empty($orders))
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
            <p class="text-gray-600">No tienes pedidos registrados.</p>
            <a href="{{ route('main') }}" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                Seguir comprando
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="font-semibold">Orden #{{ $order['id'] }}</h3>
                        <p class="text-sm text-gray-500">Fecha: {{ $order['date'] }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm
                        {{ $order['status'] == 'Completado' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $order['status'] == 'Enviado' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $order['status'] == 'Procesando' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                        {{ $order['status'] }}
                    </span>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <h4 class="font-medium mb-2">Productos:</h4>
                    <ul class="space-y-2">
                        @foreach($order['items'] as $item)
                        <li class="flex justify-between">
                            <span>{{ $item['product'] }} x {{ $item['quantity'] }}</span>
                            <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                    <p class="font-medium">Dirección de envío:</p>
                    <p class="text-gray-600">
                      {{ $user['address'] ?? 'Dirección no especificada' }}
                    </p>
                </div>

                <div class="border-t border-gray-200 pt-4 flex justify-end">
                    <p class="text-lg font-bold">Total: ${{ number_format($order['total'], 2) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
