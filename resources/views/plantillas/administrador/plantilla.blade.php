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
                "menu content submenu";
            grid-template-columns: 280px 1fr 320px;
            grid-template-rows: 64px 1fr;
            min-height: 100vh;
            background-color: rgb(34, 37, 42);
            color: #e2e8f0;
        }

        /* Menú lateral - Ahora fijo */
        .fixed-menu {
            grid-area: menu;
            background-color: rgb(46, 49, 54);
            z-index: 40;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            height: 100vh; /* Ocupa toda la altura */
            overflow-y: auto; /* Scroll interno si el contenido es muy largo */
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
        }

        /* Submenú */
        .fixed-submenu {
            grid-area: submenu;
            background-color: rgb(40, 42, 46);
            overflow-y: auto;
            z-index: 20;
            border-left: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            body {
                grid-template-columns: 240px 1fr 280px;
            }
        }

        @media (max-width: 768px) {
            body {
                grid-template-areas:
                    "header header header"
                    "content content content";
                grid-template-columns: 1fr;
            }

            .fixed-menu,
            .fixed-submenu {
                position: fixed;
                top: 64px;
                bottom: 0;
                width: 280px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .fixed-menu.open {
                transform: translateX(0);
                left: 0;
            }

            .fixed-submenu.open {
                transform: translateX(0);
                right: 0;
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

<body class="antialiased">
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

<!-- Submenú -->
<aside class="fixed-submenu">
    @yield('submenu')
</aside>

<!-- Script para manejar el responsive (opcional) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aquí podrías añadir lógica para los toggles del menú en móvil
        // Por ejemplo:
        // document.querySelector('.menu-toggle').addEventListener('click', function() {
        //     document.querySelector('.fixed-menu').classList.toggle('open');
        // });
    });
</script>
</body>
</html>
