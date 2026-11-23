<h1>Estudiantes</h1>

<a href="{{ route('students.create') }}">Crear estudiante</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Expediente</th>
            <th>Delegado</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($students as $student)
            <tr>
                <td>{{ $student['id'] }}</td>
                <td>{{ $student['nombre'] }}</td>
                <td>{{ $student['apellido'] }}</td>
                <td>{{ $student['fecha_nacimiento'] }}</td>
                <td>{{ $student['expediente'] }}</td>
                <td>{{ $student['delegado_id'] ?? 'Sin delegado' }}</td>
                <td>
                    @if (!empty($student['imagen']))
                        <img src="{{ $student['imagen'] }}"
                             alt="Imagen de {{ $student['nombre'] }}"
                             width="70">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>
                    <a href="{{ route('students.show', $student['id']) }}">Ver</a>
                    <a href="{{ route('students.edit', $student['id']) }}">Editar</a>

                    <form action="{{ route('students.destroy', $student['id']) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No hay estudiantes registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>