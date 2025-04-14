<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Tech Hospital</title>

    <!-- Tailwind CSS y FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('imagen/logo-icon.png') }}" type="image/x-icon">

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
    :root {
        --primary: #2563EB;         /* Azul médico */
        --primary-light: #3B82F6;
        --primary-dark: #1E40AF;
        --light-bg: #F8FAFC;        /* Blanco azulado suave */
        --menu-bg: #FFFFFF;         /* Blanco puro */
        --content-bg: #F1F5F9;      /* Fondo claro con matiz */
        --accent: #38BDF8;          /* Celeste moderno */
        --text-primary: #1E293B;
        --text-secondary: #64748B;
        --success: #10B981;
        --warning: #F59E0B;
        --danger: #EF4444;
    }

    body {
        background-color: var(--light-bg);
        font-family: 'Inter', sans-serif;
        color: var(--text-primary);
    }

    .fixed-menu {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 280px;
        background: var(--menu-bg);
        border-right: 1px solid #E2E8F0;
        padding: 1.5rem 1rem;
        overflow-y: auto;
        z-index: 50;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .estado {
        position: fixed;
        top: 0;
        left: 280px;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow-y: auto;
        background-color: var(--content-bg);
        transition: all 0.3s ease;
    }

    header {
        background-color: white;
        border-bottom: 1px solid #E2E8F0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .active-link {
        background-color: var(--primary-light);
        color: white !important;
        border-radius: 8px;
    }

    .active-link .icon {
        background-color: var(--primary-dark);
        color: white;
    }

    /* Efectos hover para elementos interactivos */
    .nav-link:hover:not(.active-link) {
        background-color: #EFF6FF;
        border-radius: 8px;
    }

    /* Scrollbar personalizada */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #F1F5F9;
    }

    ::-webkit-scrollbar-thumb {
        background: #CBD5E1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94A3B8;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .fixed-menu {
            width: 240px;
            transform: translateX(-100%);
        }

        .estado {
            left: 0;
        }

        .menu-open .fixed-menu {
            transform: translateX(0);
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }

        .menu-open .estado {
            left: 240px;
        }
    }

    @media (max-width: 768px) {
        .fixed-menu {
            width: 280px;
            position: fixed;
            z-index: 100;
        }

        .estado {
            left: 0;
        }
    }
</style>

<body class="text-gray-800 antialiased">

<!-- Menú lateral -->
<div class="fixed-menu">
    @yield('menu')
</div>

<!-- Área principal con encabezado y contenido -->
<div class="estado">
    <!-- Encabezado fijo -->
    <header class="sticky top-0 z-30 bg-white border-b border-gray-200 shadow-sm px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <!-- Botón de menú para móvil (solo visible en pantallas pequeñas) -->
            <button id="menuToggle" class="lg:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <div class="flex items-center gap-3">
                <img src="{{ asset('imagen/logo-icon.png') }}" alt="Logo" class="h-8 w-8">
                <h1 class="text-lg font-semibold text-gray-800 tracking-tight">
                    <span class="hidden md:inline">Hospital Distrital de Laredo</span>
                    <span class="md:hidden">HDL</span> – Panel de Soporte
                </h1>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <!-- Notificaciones -->
            <button class="relative p-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
            </button>

            <!-- Perfil de usuario -->
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-medium">Bienvenido, <span class="text-primary">Soporte</span></p>
                    <p class="text-xs text-gray-500 truncate max-w-[160px]">soporte@hospital.com</p>
                </div>
                <div class="relative group">
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-md cursor-pointer">
                        <img src="https://ui-avatars.com/api/?name=Soporte&background=2563EB&color=fff" alt="Avatar" class="object-cover w-full h-full">
                    </div>
                    <!-- Menú desplegable de usuario -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-40 hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi perfil</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                        <div class="border-t border-gray-200"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido dinámico -->
    <main class="flex-1 p-6">
        <!-- Breadcrumbs -->
        <div class="mb-6 flex items-center text-sm text-gray-600">
            <a href="#" class="hover:text-primary">Inicio</a>
            <span class="mx-2">/</span>
            <span class="font-medium text-primary">@yield('title')</span>
        </div>

        <!-- Contenido principal -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            @yield('soprote')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 px-6 py-4 text-center text-sm text-gray-500">
        <p>© 2023 Hospital Distrital de Laredo. Todos los derechos reservados.</p>
        <p class="mt-1">v1.0.0</p>
    </footer>
</div>

<!-- Script para el menú móvil -->
<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.body.classList.toggle('menu-open');
    });
</script>

</body>
</html>
