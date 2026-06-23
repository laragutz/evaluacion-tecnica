<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
	<div class="d-flex justify-content-between align-items-center mb-4">
    		<h1>Listado de Productos</h1>
		<a href="{{ route('productos.exportar') }}"
   		class="btn btn-outline-success">
    		Exportar Excel
		</a>

    		<a href="{{ route('productos.create') }}"
       		class="btn btn-success">
        	+ Nuevo Producto
    		</a>
	</div>
	@if(session('success'))
    		<div class="alert alert-success">
        		{{ session('success') }}
    		</div>
	@endif
    <form method="GET" action="{{ route('productos.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <input
                    type="text"
                    name="buscar"
                    class="form-control"
                    placeholder="Buscar..."
                    value="{{ $buscar }}">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">
                    Buscar
                </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>SKU</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Activo</th>
		<th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        @foreach($productos as $producto)

            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->sku }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>${{ number_format($producto->precio,2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    {{ $producto->activo ? 'Sí' : 'No' }}
                </td>
		<td>
    <a href="{{ route('productos.show', $producto) }}" class="btn btn-info btn-sm">Ver</a>
    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm">Editar</a>

    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar este producto?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
    </form>
</td>
            </tr>

        @endforeach

        </tbody>

    </table>

    {{ $productos->links() }}

</div>

</body>
</html>
