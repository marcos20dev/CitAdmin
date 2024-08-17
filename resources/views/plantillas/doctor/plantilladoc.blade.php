<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Incluir bb-rich-text-editor -->
    <link rel="shortcut icon" href="{{ asset('imagen/logo-icon.png') }}" type="image/x-icon">

    <style>
        /* Estilo para el menú fijo */
        .fixed-menu {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 18%; /* Ancho del menú incrementado */
            background-color: rgb(253, 254, 255); /* Color de fondo del menú */
            padding: 2rem; /* Relleno del menú */
            overflow-y: auto; /* Desplazamiento vertical automático si el contenido excede el tamaño del menú */
        }

        /* Estilo para el encabezado fijo */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 18%; /* Ajuste del espacio para el menú incrementado */
            right: 0;
            z-index: 1000; /* Asegura que el encabezado esté por encima de otros elementos */
            background-color: rgb(112, 146, 201); /* Color de fondo del encabezado */
            padding: 0rem; /* Relleno del encabezado */
        }

        /* Estilo para el contenido principal */
        .content-main {
            background-color: rgb(236, 238, 239); /* Color de fondo del contenido principal */
            padding: 2rem; /* Relleno del contenido principal */
            margin-left: 20%; /* Aumento del margen izquierdo */
            margin-right: 20%; /* Aumento del margen derecho */
        }

        /* Estilos para hacer el diseño responsive */
        @media (max-width: 767px) {
            .fixed-menu {
                width: 100%;
                height: auto;
                bottom: auto;
                padding: 1rem;
            }

            .fixed-header {
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 1rem;
            }

            .ml-1/5 {
                margin-left: 0;
            }

            .mt-16 {
                margin-top: 1rem;
            }
        }

        body {
            background-color: rgb(241, 243, 245); /* Color de fondo oscuro para toda la página */
        }

        .content-wrapper {
            display: flex;
        }

        .content-main {
            flex-grow: 1;
        }

        .content-main.left-margin-adjusted {
            margin-left: 20%; /* Ajusta el valor según sea necesario */
        }

        .submenu {
            margin-left: 10px; /* Ajusta el valor según sea necesario */
        }

        .estado {
            position: fixed;
            top: 60px; /* Ajusta esto para que coincida con la altura del encabezado */
            left: 18%; /* Ajuste del espacio para el menú incrementado */
            right: 0;
            z-index: 25;
            background-color: rgb(236, 238, 239); /* Color de fondo del contenido principal */
            height: calc(100vh - 60px); /* Ajusta la altura para llenar el espacio restante debajo del encabezado */
            overflow-y: auto; /* Desplazamiento vertical si el contenido excede el tamaño */
        }
    </style>

</head>

<body>

    <!-- Encabezado fijo -->
    <div class="fixed-header">
        @yield('header')
    </div>

    <!-- Menú fijo -->
    <div class="fixed-menu">
        @yield('menu')
    </div>

    <!-- Contenido principal con margen ajustado para el menú y el encabezado fijos -->
    <div class="estado">
        @yield('content')
    </div>

</body>

</html>
