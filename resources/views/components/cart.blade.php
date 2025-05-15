@extends('welcome')

@section('content')
<div class="container mx-auto px-4 py-8">
  <h1 class="text-3xl font-bold text-gray-800 mb-8">Tu Carrito de Compras</h1>

  @if(count($carrito ?? []) > 0)
  <div class="flex flex-col lg:flex-row gap-8">
      <!-- Lista de productos -->
      <div class="lg:w-2/3">
          <div class="bg-white rounded-lg shadow-md overflow-hidden">
              <div class="hidden md:grid grid-cols-12 bg-gray-100 p-4 font-medium text-gray-600">
                  <div class="col-span-5">Producto</div>
                  <div class="col-span-2 text-center">Precio</div>
                  <div class="col-span-2 text-center">Cantidad</div>
                  <div class="col-span-2 text-center">Subtotal</div>
                  <div class="col-span-1"></div>
              </div>

              @foreach($carrito as $id => $item)
              <div class="grid grid-cols-12 p-4 border-b border-gray-200 items-center">
                  <!-- Imagen y nombre -->
                  <div class="col-span-6 md:col-span-5 flex items-center space-x-4">
                      <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" class="w-20 h-20 object-cover rounded">
                      <span class="font-medium text-gray-800">{{ $item['nombre'] }}</span>
                  </div>

                  <!-- Precio unitario -->
                  <div class="col-span-3 md:col-span-2 text-center text-gray-600">
                      ${{ number_format($item['precio'], 2) }}
                  </div>

                  <!-- Cantidad -->
                  <div class="col-span-3 md:col-span-2 text-center">
                      <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center justify-center space-x-2">
                          @csrf
                          <button type="submit" name="cantidad" value="{{ $item['cantidad'] - 1 }}"
                                  class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                              </svg>
                          </button>
                          <span class="font-medium">{{ $item['cantidad'] }}</span>
                          <button type="submit" name="cantidad" value="{{ $item['cantidad'] + 1 }}"
                                  class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                              </svg>
                          </button>
                      </form>
                  </div>

                  <!-- Subtotal -->
                  <div class="hidden md:block col-span-2 text-center font-medium text-gray-800">
                      ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                  </div>

                  <!-- Eliminar -->
                  <div class="col-span-3 md:col-span-1 flex justify-end">
                      <a href="{{ route('cart.remove', $id) }}" class="text-red-500 hover:text-red-700">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                      </a>
                  </div>
              </div>
              @endforeach
          </div>
      </div>

      <!-- Resumen de compra -->
      <div class="lg:w-1/3">
          <div class="bg-white rounded-lg shadow-md p-6">
              <h2 class="text-xl font-bold text-gray-800 mb-4">Resumen de Compra</h2>

              <div class="space-y-3 mb-6">
                  <div class="flex justify-between">
                      <span class="text-gray-600">Subtotal</span>
                      <span class="font-medium">${{ number_format($total, 2) }}</span>
                  </div>
                  <div class="flex justify-between">
                      <span class="text-gray-600">Envío</span>
                      <span class="font-medium">$0.00</span>
                  </div>
                  <div class="border-t border-gray-200 pt-3 flex justify-between">
                      <span class="text-lg font-bold text-gray-800">Total</span>
                      <span class="text-lg font-bold text-gray-800">${{ number_format($total, 2) }}</span>
                  </div>
              </div>

              <a href="{{ route('payment') }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-medium transition duration-200 text-center block">
                Proceder al Pago
              </a>

              <div class="mt-4 text-center">
                  <a href="/" class="text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                      </svg>
                      Continuar comprando
                  </a>
              </div>
          </div>
      </div>
  </div>
  @else
  <div class="bg-white rounded-lg shadow-md p-8 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
      </svg>
      <h2 class="text-xl font-medium text-gray-700 mt-4">Tu carrito está vacío</h2>
      <p class="text-gray-500 mt-2">Agrega algunos productos para comenzar</p>
      <a href="/" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg font-medium transition duration-200">
          Explorar productos
      </a>
  </div>
  @endif
</div>
@endsection
