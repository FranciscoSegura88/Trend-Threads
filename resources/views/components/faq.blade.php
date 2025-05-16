@extends('welcome')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-6">Preguntas Frecuentes</h1>

    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold">¿Cómo realizo una compra?</h2>
            <p>Puedes agregar productos al carrito y luego finalizar tu pedido en la sección de pago.</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold">¿Cuál es el tiempo de entrega?</h2>
            <p>Los envíos suelen tardar entre 3 y 7 días hábiles dependiendo de tu ubicación.</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold">¿Puedo devolver un producto?</h2>
            <p>Sí, tienes hasta 15 días para realizar devoluciones. Consulta nuestra política para más información.</p>
        </div>
    </div>
</div>
@endsection
