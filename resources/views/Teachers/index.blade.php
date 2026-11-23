<h1>Profesores</h1>

<a href="{{ route('teachers.create') }}">Crear profesor</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Cédula</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher['id'] }}</td>
                <td>{{ $teacher['nombre'] }}</td>
                <td>{{ $teacher['apellido'] }}</td>
                <td>{{ $teacher['telefono'] }}</td>
                <td>{{ $teacher['cedula'] }}</td>
                <td>
                    <a href="{{ route('teachers.show', $teacher['id']) }}">Ver</a>
                    <a href="{{ route('teachers.edit', $teacher['id']) }}">Editar</a>

                    <form action="{{ route('teachers.destroy', $teacher['id']) }}"
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
                <td colspan="6">No hay profesores registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>