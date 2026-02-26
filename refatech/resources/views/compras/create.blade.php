<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Compra - RefaTech</title>
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
                <h1 class="mb-4">Realizar Nueva Compra</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('compras.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="usuario_id" class="form-label">Usuario</label>
                        <select class="form-control @error('usuario_id') is-invalid @enderror" 
                                id="usuario_id" name="usuario_id" required>
                            <option value="">Selecciona un usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('usuario_id')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="producto_id" class="form-label">Producto</label>
                        <select class="form-control @error('producto_id') is-invalid @enderror" 
                                id="producto_id" name="producto_id" required onchange="actualizarPrecio()">
                            <option value="">Selecciona un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" 
                                    data-precio="{{ $producto->precio }}"
                                    {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->nombre_producto }} - ${{ $producto->precio }}
                                </option>
                            @endforeach
                        </select>
                        @error('producto_id')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control @error('cantidad') is-invalid @enderror" 
                               id="cantidad" name="cantidad" value="{{ old('cantidad', 1) }}" required min="1" onchange="actualizarTotal()" oninput="actualizarTotal()">
                        @error('cantidad')<span class="invalid-feedback">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Total a Pagar:</strong></label>
                        <div class="alert alert-info">
                            <h4 id="total-display">$0.00</h4>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('compras.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Realizar Compra</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function actualizarTotal() {
            const productoSelect = document.getElementById('producto_id');
            const cantidadInput = document.getElementById('cantidad');
            const totalDisplay = document.getElementById('total-display');
            
            const precioOption = productoSelect.options[productoSelect.selectedIndex];
            const precio = parseFloat(precioOption.getAttribute('data-precio')) || 0;
            const cantidad = parseInt(cantidadInput.value) || 0;
            
            const total = (precio * cantidad).toFixed(2);
            totalDisplay.textContent = '$' + parseFloat(total).toLocaleString('es-CO', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
        
        function actualizarPrecio() {
            actualizarTotal();
        }
        
        // Cargar total inicial si hay valores guardados
        document.addEventListener('DOMContentLoaded', actualizarTotal);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
