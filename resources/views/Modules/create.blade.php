<h1>Crear módulo</h1>

<form action="{{ route('modules.store') }}" method="POST">
    @csrf

    <label for="codigo">Código</label>
    <input id="codigo" name="codigo" type="text" value="{{ old('codigo') }}">

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('modules.index') }}">Volver al listado</a>