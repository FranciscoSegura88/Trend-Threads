@extends('welcome')

@section('content')

@php
$reseñas = [
    [
        'id_producto' => 1,
        'usuario' => 'Juan Pérez',
        'calificacion' => 5,
        'comentario' => 'Excelente calidad, la camiseta es muy cómoda y el diseño es perfecto.',
        'fecha' => '2023-05-15'
    ],
    [
        'id_producto' => 1,
        'usuario' => 'María Gómez',
        'calificacion' => 4,
        'comentario' => 'Muy buena camiseta, aunque la talla me quedó un poco grande.',
        'fecha' => '2023-06-20'
    ],
    [
        'id_producto' => 2,
        'usuario' => 'Carlos Ruiz',
        'calificacion' => 5,
        'comentario' => 'La mejor compra que he hecho, el material es de primera calidad.',
        'fecha' => '2023-04-10'
    ],
    [
        'id_producto' => 3,
        'usuario' => 'Ana López',
        'calificacion' => 3,
        'comentario' => 'Buena camiseta pero el color no es exactamente como en la foto.',
        'fecha' => '2023-07-05'
    ],
    [
        'id_producto' => 4,
        'usuario' => 'Pedro Martínez',
        'calificacion' => 5,
        'comentario' => 'Increíble calidad, se nota que es producto original. Lo recomiendo 100%.',
        'fecha' => '2023-08-12'
    ],
    [
        'id_producto' => 5,
        'usuario' => 'Laura Sánchez',
        'calificacion' => 4,
        'comentario' => 'Muy bonito diseño y cómodo de usar. El envío fue rápido.',
        'fecha' => '2023-09-01'
    ],
    [
        'id_producto' => 6,
        'usuario' => 'Miguel Ángel',
        'calificacion' => 5,
        'comentario' => 'A mi hijo le encantó la mochila, es resistente y tiene buen espacio.',
        'fecha' => '2023-06-15'
    ],
    [
        'id_producto' => 7,
        'usuario' => 'Sofía Castro',
        'calificacion' => 4,
        'comentario' => 'El gorro es cálido y de buena calidad, perfecto para el invierno.',
        'fecha' => '2023-05-22'
    ],
    [
        'id_producto' => 15,
        'usuario' => 'Ricardo Torres',
        'calificacion' => 5,
        'comentario' => 'El accesorio es exactamente como lo describen, muy satisfecho con la compra.',
        'fecha' => '2023-08-30'
    ],
    [
        'id_producto' => 21,
        'usuario' => 'Elena Vargas',
        'calificacion' => 5,
        'comentario' => 'Los tenis son super cómodos, los he usado para correr y son perfectos.',
        'fecha' => '2023-07-18'
    ],
    [
        'id_producto' => 24,
        'usuario' => 'Diana Flores',
        'calificacion' => 4,
        'comentario' => 'Bonito accesorio, aunque un poco caro para lo que es.',
        'fecha' => '2023-09-05'
    ],
    [
        'id_producto' => 30,
        'usuario' => 'Gabriela Morales',
        'calificacion' => 5,
        'comentario' => 'Me encantan estos tenis, son ligeros y muy cómodos para el día a día.',
        'fecha' => '2023-08-20'
    ]
];
@endphp

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
                  <a href="{{ route('payment')}}">
                    <button class="flex-1 bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition duration-300">
                        Comprar ahora
                    </button>
                  </a>
                </div>
            </div>
        </div>

        <!-- Reseñas -->
        <div class="p-6 border-t border-gray-200">
            <h3 class="text-xl font-semibold mb-4">Reseñas de clientes</h3>

            @if(count($reseñas) > 0)
                <div class="space-y-6">
                    @foreach($reseñas as $reseña)
                        <div class="border-b border-gray-100 pb-4">
                            <div class="flex items-center mb-2">
                                <div class="text-yellow-400 flex">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < $reseña['calificacion'])
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">{{ $reseña['calificacion'] }}.0</span>
                            </div>
                            <h4 class="font-medium">{{ $reseña['usuario'] }}</h4>
                            <p class="text-gray-500 text-sm mb-1">{{ $reseña['fecha'] }}</p>
                            <p class="text-gray-700">{{ $reseña['comentario'] }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Este producto aún no tiene reseñas.</p>
            @endif

            <!-- Formulario para agregar reseña -->
            <div class="mt-8">
                <h4 class="text-lg font-medium mb-4">Escribe tu reseña</h4>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Calificación</label>
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="text-gray-400 hover:text-yellow-400 focus:outline-none star-rating" data-rating="{{ $i }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-value" value="0">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Comentario</label>
                        <textarea name="comment" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition duration-300">Enviar reseña</button>
                </form>
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

<script>
    // Script para el sistema de calificación con estrellas
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating');
        const ratingInput = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingInput.value = rating;

                // Actualizar la visualización de las estrellas
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.querySelector('svg').classList.add('text-yellow-400');
                        s.querySelector('svg').classList.remove('text-gray-400');
                    } else {
                        s.querySelector('svg').classList.remove('text-yellow-400');
                        s.querySelector('svg').classList.add('text-gray-400');
                    }
                });
            });

            star.addEventListener('mouseover', function() {
                const rating = this.getAttribute('data-rating');

                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.querySelector('svg').classList.add('text-yellow-400');
                        s.querySelector('svg').classList.remove('text-gray-400');
                    }
                });
            });

            star.addEventListener('mouseout', function() {
                const currentRating = ratingInput.value;

                stars.forEach((s, index) => {
                    if (index >= currentRating) {
                        s.querySelector('svg').classList.remove('text-yellow-400');
                        s.querySelector('svg').classList.add('text-gray-400');
                    }
                });
            });
        });
    });
</script>
@endsection
