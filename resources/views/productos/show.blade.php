<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Detalle del Producto</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $producto->id }}</p>
            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>SKU:</strong> {{ $producto->sku }}</p>
            <p><strong>Categoría:</strong> {{ $producto->categoria }}</p>
            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <p><strong>Activo:</strong> {{ $producto->activo ? 'Sí' : 'No' }}</p>
            <p><strong>Fecha registro:</strong> {{ $producto->fecha_registro }}</p>
        </div>
    </div>

    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning mt-3">Editar</a>
</div>
</body>
</html>
