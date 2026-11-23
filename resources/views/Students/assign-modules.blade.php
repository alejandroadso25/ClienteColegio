<h1>Matricular estudiante en módulos</h1>

<p>
    <strong>Estudiante:</strong>
    {{ $student['nombre'] }} {{ $student['apellido'] }}
</p>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@php
    $assignedModuleIds = array_column($student['modules'] ?? [], 'id');
    $selectedModuleIds = old('module_ids', $assignedModuleIds);
@endphp

<form action="{{ route('students.modules.update', $student['id']) }}" method="POST">
    @csrf
    @method('PUT')

    @forelse ($modules as $module)
        <div>
            <input
                id="module-{{ $module['id'] }}"
                type="checkbox"
                name="module_ids[]"
                value="{{ $module['id'] }}"
                {{ in_array($module['id'], $selectedModuleIds) ? 'checked' : '' }}
            >
            <label for="module-{{ $module['id'] }}">
                {{ $module['codigo'] }} - {{ $module['nombre'] }}
            </label>
        </div>
    @empty
        <p>No hay módulos disponibles.</p>
    @endforelse

    @if (count($modules) > 0)
        <button type="submit">Guardar matrícula</button>
    @endif
</form>

<a href="{{ route('students.show', $student['id']) }}">Cancelar</a>
