@extends('welcome')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-6">Ayuda y Soporte</h1>

    <p class="mb-4">¿Tienes algún problema o necesitas asistencia? Aquí encontrarás las formas de contactarnos y resolver tus dudas.</p>

    <ul class="space-y-4">
        <li>
            <strong>📧 Correo:</strong> <a href="mailto:soporte@tutienda.com" class="text-blue-500 hover:underline">soporte@tutienda.com</a>
        </li>
        <li>
            <strong>📞 Teléfono:</strong> +52 55 1234 5678 (Lunes a Viernes, 9am a 6pm)
        </li>
        <li>
            <strong>💬 Chat en vivo:</strong> Disponible en la esquina inferior derecha de la página (de lunes a viernes).
        </li>
    </ul>
</div>
@endsection
