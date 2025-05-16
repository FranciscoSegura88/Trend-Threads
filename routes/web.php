<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;

// =============================================
// Usuarios simulados
// =============================================
$simulatedUsers = [
    [
        'id' => 1,
        'name' => 'Ana García',
        'email' => 'ana@ejemplo.com',
        'password' => 'clave123',
        'address' => 'Calle Primavera 45, Ciudad'
    ],
    [
        'id' => 2,
        'name' => 'Carlos Méndez',
        'email' => 'carlos@ejemplo.com',
        'password' => 'password123',
        'address' => 'Av. Central 302, Ciudad'
    ],
    [
        'id' => 3,
        'name' => 'Luisa Fernández',
        'email' => 'luisa@ejemplo.com',
        'password' => 'luisa2023',
        'address' => 'Boulevard Norte 78, Ciudad'
    ]
];

// =============================================
// Órdenes simuladas (para todos los usuarios)
// =============================================
$simulatedOrders = [
    // Órdenes de Ana (user_id = 1)
    [
        'id' => 1001,
        'user_id' => 1,
        'date' => '2023-05-15',
        'total' => 125.99,
        'status' => 'Completado',
        'items' => [
            ['product' => 'Camiseta básica blanca', 'price' => 19.99, 'quantity' => 2],
            ['product' => 'Jeans slim fit', 'price' => 49.99, 'quantity' => 1]
        ]
    ],
    [
        'id' => 1002,
        'user_id' => 1,
        'date' => '2023-06-20',
        'total' => 89.97,
        'status' => 'Enviado',
        'items' => [
            ['product' => 'Zapatillas running', 'price' => 65.50, 'quantity' => 1],
            ['product' => 'Calcetines deportivos', 'price' => 12.49, 'quantity' => 2]
        ]
    ],

    // Órdenes de Carlos (user_id = 2)
    [
        'id' => 1003,
        'user_id' => 2,
        'date' => '2023-07-01',
        'total' => 210.75,
        'status' => 'Procesando',
        'items' => [
            ['product' => 'Chaqueta denim', 'price' => 89.99, 'quantity' => 1],
            ['product' => 'Gorra ajustable', 'price' => 15.99, 'quantity' => 2],
            ['product' => 'Cinturón de cuero', 'price' => 29.99, 'quantity' => 1]
        ]
    ],
    [
        'id' => 1004,
        'user_id' => 2,
        'date' => '2023-08-12',
        'total' => 150.50,
        'status' => 'Completado',
        'items' => [
            ['product' => 'Polo manga corta', 'price' => 25.50, 'quantity' => 3],
            ['product' => 'Short deportivo', 'price' => 35.00, 'quantity' => 2]
        ]
    ],

    // Órdenes de Luisa (user_id = 3)
    [
        'id' => 1005,
        'user_id' => 3,
        'date' => '2023-09-05',
        'total' => 75.25,
        'status' => 'Enviado',
        'items' => [
            ['product' => 'Blusa floral', 'price' => 32.75, 'quantity' => 1],
            ['product' => 'Falda midi', 'price' => 42.50, 'quantity' => 1]
        ]
    ],
    [
        'id' => 1006,
        'user_id' => 3,
        'date' => '2023-10-18',
        'total' => 180.00,
        'status' => 'Completado',
        'items' => [
            ['product' => 'Abrigo invernal', 'price' => 120.00, 'quantity' => 1],
            ['product' => 'Botines de cuero', 'price' => 60.00, 'quantity' => 1]
        ]
    ]
];

// =============================================
// Rutas principales
// =============================================
Route::view('/', 'components.main')->name('main');

// =============================================
// Rutas de productos y carrito
// =============================================
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
Route::get('/add-to-cart/{id}', [ProductoController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductoController::class, 'viewCart'])->name('cart.view');
Route::post('/update-cart/{id}', [ProductoController::class, 'updateCart'])->name('cart.update');
Route::get('/remove-from-cart/{id}', [ProductoController::class, 'removeFromCart'])->name('cart.remove');

// =============================================
// Rutas de pago
// =============================================
Route::get('/payment', function() {
    $carrito = request()->session()->get('temp_cart', []);
    $total = 0;

    foreach($carrito as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }

    if(empty($carrito)) {
        return redirect()->route('cart.view')->with('error', 'Tu carrito está vacío');
    }

    return view('components.payment', [
        'carrito' => $carrito,
        'total' => $total
    ]);
})->name('payment');

Route::post('/process-payment', function(Request $request) {
    $carrito = request()->session()->get('temp_cart', []);

    if(empty($carrito)) {
        return redirect()->route('cart.view')->with('error', 'Tu carrito está vacío');
    }

    return redirect()->route('confirmation');
})->name('process.payment');

Route::get('/confirmation', function(Request $request) {
    $formData = $request->all();
    $carrito = session()->get('temp_cart', []);

    $total = array_reduce($carrito, function($sum, $item) {
        return $sum + ($item['precio'] * $item['cantidad']);
    }, 0);

    return view('components.confirmation', [
        'datos' => $formData,
        'carrito' => $carrito,
        'total' => $total
    ]);
})->name('confirmation');

// =============================================
// Rutas estáticas
// =============================================
Route::get('/contacto', function() {
    return view('components.contact');
})->name('contact');

Route::get('/politicas-privacidad', function() {
    return view('components.privacy');
})->name('privacy');

Route::get('/terminos-condiciones', function() {
    return view('components.terms');
})->name('terms');

Route::get('/contact-submit', function(Request $request) {
    return back()->with('success', '¡Mensaje enviado! (Simulación)');
});

Route::view('/faq', 'components.faq')->name('faq');

Route::view('/ayuda', 'components.support')->name('help');


// =============================================
// Autenticación simulada (GET)
// =============================================
Route::get('/login', function() {
    if (session('user')) {
        return redirect()->route('account');
    }
    return view('components.auth.login');
})->name('login');

Route::get('/login-process', function(Request $request) use ($simulatedUsers) {
    $user = collect($simulatedUsers)->firstWhere('email', $request->email);

    if ($user && $request->password === $user['password']) {
        session(['user' => $user]);
        return redirect()->route('account')->with('success', '¡Bienvenido '.$user['name'].'!');
    }

    return redirect()->route('login')->with('error', 'Credenciales incorrectas');
})->name('login.process');

Route::get('/register', function() {
    return view('components.auth.register');
})->name('register');

Route::get('/register-process', function(Request $request) {
    $newUser = [
        'id' => rand(4, 9999),
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'address' => ''
    ];

    session(['user' => $newUser]);
    return redirect()->route('account')->with('success', '¡Registro exitoso!');
})->name('register.process');

// =============================================
// Rutas protegidas (requieren sesión)
// =============================================
Route::get('/cuenta', function() {
    if (!session('user')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión');
    }
    return view('components.account', ['user' => session('user')]);
})->name('account');

Route::get('/mis-pedidos', function() use ($simulatedOrders) {
    if (!session('user')) return redirect()->route('login');

    $userOrders = array_filter($simulatedOrders, function($order) {
        return $order['user_id'] == session('user')['id'];
    });

    return view('components.orders', [
        'user' => session('user'),
        'orders' => $userOrders ?: []
    ]);
})->name('orders');

Route::get('/logout', function() {
    session()->forget('user');
    return redirect()->route('main')->with('success', 'Sesión cerrada');
})->name('logout');

