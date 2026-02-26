<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Compra - RefaTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">RefaTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('compras.index') }}">Compras</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4>Detalles de la Compra</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><strong>ID:</strong></label>
                            <p>{{ $compra->id }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Usuario:</strong></label>
                            <p>{{ $compra->usuario->nombre ?? 'Sin usuario' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Producto:</strong></label>
                            <p>{{ $compra->producto->nombre_producto ?? 'Sin producto' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Cantidad:</strong></label>
                            <p>{{ $compra->cantidad }} unidades</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Total:</strong></label>
                            <p>${{ $compra->total }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Fecha:</strong></label>
                            <p>{{ is_object($compra->fecha_compra) ? $compra->fecha_compra->format('d/m/Y H:i') : \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('compras.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
