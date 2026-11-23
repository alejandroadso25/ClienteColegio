<h1>Detalle del estudiante</h1>

<p><strong>ID:</strong> {{ $student['id'] }}</p>
<p><strong>Nombre:</strong> {{ $student['nombre'] }}</p>
<p><strong>Apellido:</strong> {{ $student['apellido'] }}</p>
<p><strong>Fecha de nacimiento:</strong> {{ $student['fecha_nacimiento'] }}</p>
<p><strong>Expediente:</strong> {{ $student['expediente'] }}</p>
<p><strong>Delegado:</strong> {{ $student['delegado_id'] ?? 'Sin delegado' }}</p>

@if (!empty($student['imagen']))
    <p><strong>Imagen:</strong></p>
    <img src="{{ $student['imagen'] }}"
         alt="Imagen de {{ $student['nombre'] }}"
         width="200">
@else
    <p><strong>Imagen:</strong> Sin imagen</p>
@endif

<a href="{{ route('students.edit', $student['id']) }}">Editar</a>
<a href="{{ route('students.index') }}">Volver al listado</a>