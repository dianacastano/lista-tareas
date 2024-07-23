<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($tareas as $index => $tarea)
            <li>
                {{ $tarea['nombre'] }} - 
                @if ($tarea['completada'])
                    <span>Completada</span>
                @else
                    <form action="{{ route('tareas.complete', $index) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Completar</button>
                    </form>
                @endif
                <form action="{{ route('tareas.destroy', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tareas.create') }}">Crear Nueva Tarea</a>
</body>
</html>
