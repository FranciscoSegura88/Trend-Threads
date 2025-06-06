@extends('welcome')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Información de pago -->
        <div class="md:w-2/3">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Información de Pago</h1>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <form action="{{ route('confirmation') }}" method="GET" id="payment-form">
                    <!-- Datos de contacto -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-800 mb-4">Información de contacto</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Datos de envío -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-800 mb-4">Dirección de envío</h2>
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">Nombre(s)</label>
                                    <input type="text" id="first-name" name="first-name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Apellidos</label>
                                    <input type="text" id="last-name" name="last-name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                                <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                    <input type="text" id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                    <select id="state" name="state" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Seleccionar</option>
                                        <option value="">Jalisco</option>
                                        <option value="">Veracruz</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">Código postal</label>
                                    <input type="text" id="zip" name="zip" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Método de pago -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-800 mb-4">Método de pago</h2>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="credit-card" name="payment-method" type="radio" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">Tarjeta de crédito/débito</label>
                            </div>
                            <div id="credit-card-form" class="mt-4 space-y-4">
                                <div>
                                    <label for="card-number" class="block text-sm font-medium text-gray-700 mb-1">Número de tarjeta</label>
                                    <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="expiry" class="block text-sm font-medium text-gray-700 mb-1">Fecha de expiración</label>
                                        <input type="text" id="expiry" name="expiry" placeholder="MM/AA" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="cvc" class="block text-sm font-medium text-gray-700 mb-1">Código de seguridad</label>
                                        <input type="text" id="cvc" name="cvc" placeholder="CVC" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-md font-medium transition duration-200">
                      Realizar pago
                  </button>
                </form>
            </div>
        </div>

        <!-- Resumen del pedido -->
        <div class="md:w-1/3">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Resumen del pedido</h2>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <!-- Sección de cupón -->
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700">¿Tienes un cupón de descuento?</span>
                    </div>
                    <div class="flex">
                        <input type="text" id="coupon-code" placeholder="Código del cupón" class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:ring-blue-500 focus:border-blue-500">
                        <button id="apply-coupon" class="bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-r-md transition duration-200">
                            Aplicar
                        </button>
                    </div>
                    <p id="coupon-message" class="text-sm mt-1 hidden"></p>
                </div>

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

                    <!-- Descuento por cupón -->
                    <div id="discount-row" class="flex justify-between text-green-600">
                        <span>Descuento</span>
                        <span id="discount-amount">-$0.00</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Envío</span>
                        <span class="font-medium">$0.00</span>
                    </div>
                    <div class="flex justify-between text-lg font-bold text-gray-800 pt-2">
                        <span>Total</span>
                        <span id="total-amount">${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const couponCodeInput = document.getElementById('coupon-code');
        const applyCouponBtn = document.getElementById('apply-coupon');
        const couponMessage = document.getElementById('coupon-message');
        const discountRow = document.getElementById('discount-row');
        const discountAmount = document.getElementById('discount-amount');
        const totalAmount = document.getElementById('total-amount');

        // Cupones válidos (en un sistema real esto vendría de tu backend)
        const validCoupons = {
            'DESCUENTO10': 10, // 10% de descuento
            'VERANO20': 20,    // 20% de descuento
            'BIENVENIDA15': 15 // 15% de descuento
        };

        applyCouponBtn.addEventListener('click', function() {
            const couponCode = couponCodeInput.value.trim().toUpperCase();
            const subtotal = {{ $total }};

            if (!couponCode) {
                showCouponMessage('Por favor ingresa un código de cupón', 'text-red-500');
                return;
            }

            if (validCoupons[couponCode]) {
                const discountPercentage = validCoupons[couponCode];
                const discountValue = (subtotal * discountPercentage) / 100;
                const newTotal = subtotal - discountValue;

                // Mostrar el descuento
                discountAmount.textContent = `-$${discountValue.toFixed(2)}`;
                discountRow.classList.remove('hidden');

                // Actualizar el total
                totalAmount.textContent = `$${newTotal.toFixed(2)}`;

                showCouponMessage(`¡Cupón aplicado! ${discountPercentage}% de descuento`, 'text-green-500');
            } else {
                showCouponMessage('Cupón no válido o ha expirado', 'text-red-500');
                discountRow.classList.add('hidden');
                totalAmount.textContent = `$${subtotal.toFixed(2)}`;
            }
        });

        function showCouponMessage(message, colorClass) {
            couponMessage.textContent = message;
            couponMessage.className = `text-sm mt-1 ${colorClass}`;
            couponMessage.classList.remove('hidden');
        }
    });
</script>
@endsection
