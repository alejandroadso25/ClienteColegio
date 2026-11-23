<h1>Detalle del módulo</h1>

<p><strong>ID:</strong> {{ $module['id'] }}</p>
<p><strong>Código:</strong> {{ $module['codigo'] }}</p>
<p><strong>Nombre:</strong> {{ $module['nombre'] }}</p>

<a href="{{ route('modules.edit', $module['id']) }}">Editar</a>
<a href="{{ route('modules.index') }}">Volver al listado</a>