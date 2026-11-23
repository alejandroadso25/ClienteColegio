<h1>Asignar profesores a {{ $module['nombre'] }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@php
    $assignedTeacherIds = array_column($module['teachers'] ?? [], 'id');
@endphp

<form action="{{ route('modules.teachers.update', $module['id']) }}" method="POST">
    @csrf
    @method('PUT')

    @forelse ($teachers as $teacher)
        <div>
            <input
                id="teacher-{{ $teacher['id'] }}"
                type="checkbox"
                name="teacher_ids[]"
                value="{{ $teacher['id'] }}"
                {{ in_array($teacher['id'], $assignedTeacherIds) ? 'checked' : '' }}
            >
            <label for="teacher-{{ $teacher['id'] }}">
                {{ $teacher['nombre'] }} {{ $teacher['apellido'] }}
            </label>
        </div>
    @empty
        <p>No hay profesores registrados.</p>
    @endforelse

    <button type="submit">Guardar asignaciones</button>
</form>

<a href="{{ route('modules.show', $module['id']) }}">Cancelar</a>