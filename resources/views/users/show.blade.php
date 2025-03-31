<!DOCTYPE html>
<html>
<head>
    <title>Detalles del User</title>
</head>
<body>
    <h1>Detalles del User</h1>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}">Volver a la lista</a>
</body>
</html>