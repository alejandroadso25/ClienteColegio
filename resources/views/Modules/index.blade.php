<h1>Módulos</h1>

<a href="{{ route('modules.create') }}">Crear módulo</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($modules as $module)
            <tr>
                <td>{{ $module['id'] }}</td>
                <td>{{ $module['codigo'] }}</td>
                <td>{{ $module['nombre'] }}</td>
                <td>
                    <a href="{{ route('modules.show', $module['id']) }}">Ver</a>
                    <a href="{{ route('modules.edit', $module['id']) }}">Editar</a>

                    <form action="{{ route('modules.destroy', $module['id']) }}"
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
                <td colspan="4">No hay módulos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>