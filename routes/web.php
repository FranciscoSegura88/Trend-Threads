
<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Pagina principal
Route::view('/', 'components.main')->name('main'); //carga el componente por defecto

//Ruta para mostrar detalles del producto
Route::get('/producto/{id}', function($id) {
  return app()->make(\App\Http\Controllers\ProductoController::class)->show($id);
})->name('producto.show');
