@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Galería de imágenes -->
        <div class="md:flex">
            <div class="md:w-1/2 p-4">
                <div class="mb-4">
                    <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full rounded-lg">
                </div>
                <div class="grid grid-cols-3 gap-2">
                    @foreach($producto['galeria'] ?? [$producto['imagen']] as $imagen)
                        <img src="{{ $imagen }}" alt="{{ $producto['nombre'] }}" class="w-full h-24 object-cover rounded cursor-pointer hover:border-2 hover:border-gray-400">
                    @endforeach
                </div>
            </div>

            <!-- Información del producto -->
            <div class="md:w-1/2 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $producto['nombre'] }}</h1>
                <div class="flex items-center mb-4">
                    <span class="text-2xl font-bold text-gray-900">${{ number_format($producto['precio'], 2) }}</span>
                    @if(in_array('trend', $producto['categorias']))
                        <span class="ml-4 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">OFERTA</span>
                    @endif
                </div>

                <p class="text-gray-600 mb-6">{{ $producto['descripcion'] }}</p>

                <!-- Especificaciones -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Especificaciones</h3>
                    <ul class="space-y-1">
                        @foreach($producto['especificaciones'] ?? [] as $key => $value)
                            <li class="flex">
                                <span class="text-gray-600 font-medium w-32">{{ $key }}:</span>
                                <span class="text-gray-800">{{ $value }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Selector de talla/cantidad -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Talla</label>
                    <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <option>Selecciona una talla</option>
                        @if(isset($producto['especificaciones']['Tallas disponibles']))
                            @foreach(explode(', ', $producto['especificaciones']['Tallas disponibles']) as $talla)
                                <option value="{{ trim($talla) }}">{{ $talla }}</option>
                            @endforeach
                        @else
                            <option value="unica">Única</option>
                        @endif
                    </select>
                </div>

                <div class="flex items-center mb-6">
                    <label class="block text-gray-700 font-medium mr-4">Cantidad</label>
                    <div class="flex items-center border border-gray-300 rounded-lg">
                        <button class="px-3 py-1 text-lg">-</button>
                        <input type="number" value="1" min="1" class="w-12 text-center border-x border-gray-300 py-1">
                        <button class="px-3 py-1 text-lg">+</button>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex space-x-4">
                  <a href="{{route('cart.add', $producto['id'])}}">
                    <button class="flex-1 bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                        Añadir al carrito
                    </button>
                  </a>
                    <button class="flex-1 bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300">
                        Comprar ahora
                    </button>
                </div>
            </div>
        </div>

        <!-- Productos relacionados -->
        @if(count($relacionados) > 0)
            <div class="p-6 border-t border-gray-200">
                <h3 class="text-xl font-semibold mb-4">Productos relacionados</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($relacionados as $relacionado)
                        <a href="{{ route('producto.show', $relacionado['id']) }}" class="card bg-white border border-gray-200 rounded-lg shadow-sm p-4 text-center hover:shadow-md transition duration-300">
                            <img src="{{ $relacionado['imagen'] }}" alt="{{ $relacionado['nombre'] }}" class="w-full rounded-lg mb-2">
                            <h4 class="font-semibold">{{ $relacionado['nombre'] }}</h4>
                            <p class="text-gray-600 text-sm">${{ number_format($relacionado['precio'], 2) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
