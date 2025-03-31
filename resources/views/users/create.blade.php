<!DOCTYPE html>
<html>
<head>
    <title>Crear User</title>
</head>
<body>
    <h1>Crear Nuevo User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>