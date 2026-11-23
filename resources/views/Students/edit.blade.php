<h1>Editar estudiante</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('students.update', $student['id']) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text"
           value="{{ old('nombre', $student['nombre']) }}" required>

    <label for="apellido">Apellido</label>
    <input id="apellido" name="apellido" type="text"
           value="{{ old('apellido', $student['apellido']) }}" required>

    <label for="fecha_nacimiento">Fecha de nacimiento</label>
    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date"
           value="{{ old('fecha_nacimiento', $student['fecha_nacimiento']) }}" required>

    <label for="expediente">Expediente</label>
    <input id="expediente" name="expediente" type="text"
           value="{{ old('expediente', $student['expediente']) }}" required>

    <label for="delegado_id">Delegado</label>
    <select id="delegado_id" name="delegado_id">
        <option value="">Sin delegado</option>
        @foreach ($students as $candidate)
            @if ($candidate['id'] != $student['id'])
                <option value="{{ $candidate['id'] }}"
                    {{ (string) old('delegado_id', $student['delegado_id']) === (string) $candidate['id'] ? 'selected' : '' }}>
                    {{ $candidate['nombre'] }} {{ $candidate['apellido'] }}
                </option>
            @endif
        @endforeach
    </select>

    @if (!empty($student['imagen']))
        <p>Imagen actual:</p>
        <img src="{{ $student['imagen'] }}" alt="Imagen del estudiante" width="150">
    @endif

    <label for="imagen">Cambiar imagen</label>
    <input id="imagen" name="imagen" type="file" accept=".jpg,.jpeg,.png,.webp">
    @error('imagen')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('students.index') }}">Cancelar</a>