<h1>Editar profesor</h1>

<form action="{{ route('teachers.update', $teacher['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre"
           value="{{ old('nombre', $teacher['nombre']) }}">

    <label for="apellido">Apellido</label>
    <input id="apellido" name="apellido"
           value="{{ old('apellido', $teacher['apellido']) }}">

    <label for="telefono">Teléfono</label>
    <input id="telefono" name="telefono" type="tel"
           value="{{ old('telefono', $teacher['telefono']) }}">

    <label for="cedula">Cédula</label>
    <input id="cedula" name="cedula"
           value="{{ old('cedula', $teacher['cedula']) }}">

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('teachers.index') }}">Cancelar</a>