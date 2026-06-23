<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Editar Producto</h1>

    <form method="POST" action="{{ route('productos.update', $producto) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control" value="{{ old('sku', $producto->sku) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $producto->categoria) }}" required>
        </div>

        <div class="mb-3">
    <label class="form-label">Precio</label>
    <input
        type="text"
        name="precio"
        class="form-control"
        value="{{ old('precio', number_format((float) $producto->precio, 2, '.', '')) }}"
        pattern="^\d+(\.\d{1,2})?$"
        required>
    <small class="text-muted">Usar punto decimal. Ejemplo: 89.99</small>
</div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de registro</label>
            <input type="datetime-local" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $producto->fecha_registro->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="activo" value="1" class="form-check-input" {{ old('activo', $producto->activo) ? 'checked' : '' }}>
            <label class="form-check-label">Activo</label>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
