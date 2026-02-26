<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RefaTech - Sistema de Gestión</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">RefaTech</h1>
            <p class="text-gray-600">Sistema de refacciones y equipos de computo</p>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-2">Bienvenido a RefaTech</h2>
                <p class="text-gray-600 text-lg">Selecciona una opción del menú</p>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Usuarios -->
                <a href="{{ route('usuarios.index') }}" class="bg-white rounded-lg shadow-md hover:shadow-lg p-6 text-center transition hover:bg-blue-50">
                    <div class="text-4xl mb-3">👥</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Usuarios</h3>
                    <p class="text-gray-600 text-sm">Gestionar usuarios del sistema</p>
                </a>

                <!-- Proveedores -->
                <a href="{{ route('proveedores.index') }}" class="bg-white rounded-lg shadow-md hover:shadow-lg p-6 text-center transition hover:bg-green-50">
                    <div class="text-4xl mb-3">🏢</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Proveedores</h3>
                    <p class="text-gray-600 text-sm">Administrar proveedores</p>
                </a>

                <!-- Productos -->
                <a href="{{ route('productos.index') }}" class="bg-white rounded-lg shadow-md hover:shadow-lg p-6 text-center transition hover:bg-yellow-50">
                    <div class="text-4xl mb-3">📦</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Productos</h3>
                    <p class="text-gray-600 text-sm">Gestionar productos</p>
                </a>

                <!-- Compras -->
                <a href="{{ route('compras.index') }}" class="bg-white rounded-lg shadow-md hover:shadow-lg p-6 text-center transition hover:bg-purple-50">
                    <div class="text-4xl mb-3">🛒</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Compras</h3>
                    <p class="text-gray-600 text-sm">Historial de compras</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
