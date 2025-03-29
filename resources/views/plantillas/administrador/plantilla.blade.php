<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('imagen/logo-icon.png') }}" type="image/x-icon">

    <style>
        /* Sistema de capas y posicionamiento */
        body {
            display: grid;
            grid-template-areas:
                "menu header header"
                "menu content content"; /* Configuración por defecto sin submenú */
            grid-template-columns: 280px 1fr;
            grid-template-rows: 64px 1fr;
            min-height: 100vh;
            background-color: rgb(34, 37, 42);
            color: #e2e8f0;
            overflow: hidden; /* Esto evita el scroll global */
        }

        /* Cuando hay submenú */
        body.has-submenu {
            grid-template-areas:
                "menu header header"
                "menu content submenu";
            grid-template-columns: 280px 1fr 320px;
        }

        /* Menú lateral - Ahora fijo */
        .fixed-menu {
            grid-area: menu;
            background-color: rgb(46, 49, 54);
            z-index: 40;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        /* Encabezado */
        .fixed-header {
            grid-area: header;
            background-color: rgb(46, 49, 54);
            z-index: 30;
            position: sticky;
            top: 0;
            height: 64px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Contenido principal */
        .content-main {
            grid-area: content;
            padding: 2rem;
            overflow-y: auto;
            background-color: rgb(34, 37, 42);
            height: calc(100vh - 64px); /* Altura fija menos el header */
            position: relative;
        }

        /* Submenú */
        .fixed-submenu {
            grid-area: submenu;
            background-color: rgb(40, 42, 46);
            overflow-y: auto;
            z-index: 20;
            border-left: 1px solid rgba(255, 255, 255, 0.05);
            display: none; /* Oculto por defecto */
            height: calc(100vh - 64px); /* Altura fija menos el header */
            position: sticky;
            top: 64px;
        }

        body.has-submenu .fixed-submenu {
            display: block; /* Mostrado cuando hay submenú */
        }

        /* Responsive */
        @media (max-width: 1024px) {
            body {
                grid-template-columns: 240px 1fr;
            }
            body.has-submenu {
                grid-template-columns: 240px 1fr 280px;
            }
        }

        @media (max-width: 768px) {
            body, body.has-submenu {
                grid-template-areas:
                    "header header header"
                    "content content content";
                grid-template-columns: 1fr;
                overflow: auto; /* Permitir scroll en mobile */
            }

            .content-main {
                height: auto;
                min-height: calc(100vh - 64px);
            }

            .fixed-menu,
            .fixed-submenu {
                position: fixed;
                top: 64px;
                height: calc(100vh - 64px);
                width: 280px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .fixed-menu.open {
                transform: translateX(0);
                left: 0;
            }

            .fixed-submenu {
                right: 0;
                left: auto;
                transform: translateX(100%);
            }

            .fixed-submenu.open {
                transform: translateX(0);
            }

            .menu-toggle {
                display: block;
            }
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
    </style>
</head>

<body class="antialiased @hasSection('submenu')has-submenu @endif">
<!-- Menú lateral -->
<aside class="fixed-menu">
    @yield('menu')
</aside>

<!-- Encabezado -->
<header class="fixed-header">
    @yield('header')
</header>

<!-- Contenido principal -->
<main class="content-main">
    @yield('content')
</main>

<!-- Submenú - Solo aparece si se define en la vista hija -->
@hasSection('submenu')
    <aside class="fixed-submenu">
        @yield('submenu')
    </aside>
@endif

<!-- Script para manejar el responsive -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lógica para menú móvil si es necesario
        const menuToggle = document.querySelector('.menu-toggle');
        if(menuToggle) {
            menuToggle.addEventListener('click', function() {
                document.querySelector('.fixed-menu').classList.toggle('open');
            });
        }

        // Lógica para submenú móvil si es necesario
        const submenuToggle = document.querySelector('.submenu-toggle');
        if(submenuToggle) {
            submenuToggle.addEventListener('click', function() {
                document.querySelector('.fixed-submenu').classList.toggle('open');
            });
        }
    });
</script>
</body>
</html>
