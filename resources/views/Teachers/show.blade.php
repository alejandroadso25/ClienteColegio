<h1>Detalle del profesor</h1>

<p><strong>ID:</strong> {{ $teacher['id'] }}</p>
<p><strong>Nombre:</strong> {{ $teacher['nombre'] }}</p>
<p><strong>Apellido:</strong> {{ $teacher['apellido'] }}</p>
<p><strong>Teléfono:</strong> {{ $teacher['telefono'] }}</p>
<p><strong>Cédula:</strong> {{ $teacher['cedula'] }}</p>

<a href="{{ route('teachers.edit', $teacher['id']) }}">Editar</a>
<a href="{{ route('teachers.index') }}">Volver al listado</a>