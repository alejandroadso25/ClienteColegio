<h1>Detalle del estudiante</h1>

<p><strong>ID:</strong> {{ $student['id'] }}</p>
<p><strong>Nombre:</strong> {{ $student['nombre'] }}</p>
<p><strong>Apellido:</strong> {{ $student['apellido'] }}</p>
<p><strong>Fecha de nacimiento:</strong> {{ $student['fecha_nacimiento'] }}</p>
<p><strong>Expediente:</strong> {{ $student['expediente'] }}</p>
<p>
    <strong>Delegado:</strong>
    @if (!empty($student['delegado']))
        {{ $student['delegado']['nombre'] }} {{ $student['delegado']['apellido'] }}
    @else
        Sin delegado asignado
    @endif
</p>

<h2>Alumnos que representa</h2>

@forelse ($student['alumnos_delegados'] ?? [] as $alumno)
    <p>{{ $alumno['nombre'] }} {{ $alumno['apellido'] }}</p>
@empty
    <p>No representa a otros alumnos.</p>
@endforelse

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

{{-- Modulos que cursa el estudiante --}}
<h2>Módulos cursados por el estudiante</h2>
@forelse ($student['modules'] ?? [] as $module) {{--Recorre modulos y muestra si hay estudiante--}}
    <p> {{ $module ['codigo'] }} - {{ $module ['nombre'] }} </p> {{--Muestra el codigo y nombre del modulo--}}
@empty
    <p>El estudiante no está en ningún módulo.</p> {{-- Si no hay modulos muestra este mensaje --}}
@endforelse