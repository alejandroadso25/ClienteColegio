<h1>Crear profesor</h1>

<form action="{{ route('teachers.store') }}" method="POST">
    @csrf

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" value="{{ old('nombre') }}">

    <label for="apellido">Apellido</label>
    <input id="apellido" name="apellido" value="{{ old('apellido') }}">

    <label for="telefono">Teléfono</label>
    <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}">

    <label for="cedula">Cédula</label>
    <input id="cedula" name="cedula" value="{{ old('cedula') }}">

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('teachers.index') }}">Volver al listado</a>