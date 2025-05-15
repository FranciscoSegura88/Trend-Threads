<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'components.main')->name('main');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
Route::get('/add-to-cart/{id}', [ProductoController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductoController::class, 'viewCart'])->name('cart.view');
Route::post('/update-cart/{id}', [ProductoController::class, 'updateCart'])->name('cart.update');
Route::get('/remove-from-cart/{id}', [ProductoController::class, 'removeFromCart'])->name('cart.remove');

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
  // Obtener datos del formulario
  $formData = $request->all();

  // Obtener carrito de la sesión
  $carrito = session()->get('temp_cart', []);

  // Calcular total
  $total = array_reduce($carrito, function($sum, $item) {
      return $sum + ($item['precio'] * $item['cantidad']);
  }, 0);

  return view('components.confirmation', [
      'datos' => $formData,
      'carrito' => $carrito,
      'total' => $total
  ]);
})->name('confirmation');
