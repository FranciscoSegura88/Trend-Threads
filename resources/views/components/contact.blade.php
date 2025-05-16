@extends('welcome')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Contacto</h1>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <form action="{{ url('/contact-submit') }}" method="GET" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Mensaje</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                Enviar mensaje
            </button>
        </form>
    </div>
</section>
@endsection
