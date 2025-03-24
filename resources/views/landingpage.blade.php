<!-- resources/views/landingpage.blade.php -->
<x-guest-layout>
    <div class="container">
        <h1>Bienvenido a la Landing Page</h1>
        <p>Esta es la página de inicio para usuarios no registrados.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
    </div>
</x-guest-layout>