<h1>Editar módulo</h1>

<form action="{{ route('modules.update', $module['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="codigo">Código</label>
    <input
        id="codigo"
        name="codigo"
        type="text"
        value="{{ old('codigo', $module['codigo']) }}"
    >

    <label for="nombre">Nombre</label>
    <input
        id="nombre"
        name="nombre"
        type="text"
        value="{{ old('nombre', $module['nombre']) }}"
    >

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('modules.index') }}">Cancelar</a>