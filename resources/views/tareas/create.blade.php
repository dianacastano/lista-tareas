<!DOCTYPE html>
<html>
<head>
    <title>Crear Tarea</title>
</head>
<body>
    <h1>Crear Nueva Tarea</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre de la Tarea:</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('tareas.index') }}">Volver a la Lista de Tareas</a>
</body>
</html>
