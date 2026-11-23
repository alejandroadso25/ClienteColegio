<h1>Detalle del módulo</h1>

<p><strong>ID:</strong> {{ $module['id'] }}</p>
<p><strong>Código:</strong> {{ $module['codigo'] }}</p>
<p><strong>Nombre:</strong> {{ $module['nombre'] }}</p>

<a href="{{ route('modules.edit', $module['id']) }}">Editar</a>
<a href="{{ route('modules.index') }}">Volver al listado</a>

{{---Profesores asignados al modulo --}}
<h2>Profesores asignados</h2>

@forelse ($module['teachers'] ?? [] as $teacher)
    <p>{{ $teacher['nombre'] }} {{ $teacher['apellido'] }}</p>
@empty
    <p>No hay profesores asignados a este módulo.</p>
@endforelse

<h2>Alumnos matriculados</h2>

@forelse ($module['students'] ?? [] as $student)
    <p>{{ $student['nombre'] }} {{ $student['apellido'] }}</p>
@empty
    <p>No hay alumnos matriculados en este módulo.</p>
@endforelse