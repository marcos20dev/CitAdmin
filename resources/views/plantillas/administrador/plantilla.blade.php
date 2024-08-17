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
        .fixed-menu {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 17%;
            /* Ancho del menú */
            background-color: rgb(46, 49, 54);
            /* Color de fondo del menú */
            padding: 2rem;
            /* Relleno del menú */
            overflow-y: auto;
            /* Desplazamiento vertical automático si el contenido excede el tamaño del menú */
        }

        .fixed-submenu {
            position: fixed;
            top: 60px;
            right: 0;
            bottom: 0;
            width: 25%;
            /* Aumentar el ancho */
            max-width: 420px;
            /* Limitar el ancho máximo */
            padding: 1rem;
            /* Reducir el relleno */
            overflow-y: auto;
            background-color: rgb(40, 42, 46);
            /* Color de fondo */
        }


        /* Estilo para el encabezado fijo */
        .fixed-header {
            position: fixed;
            top: 0;
            left: 17%;
            /* Ajuste del espacio para el menú */
            right: 0;
            z-index: 1000;
            /* Asegura que el encabezado esté por encima de otros elementos */
            background-color: rgb(46, 49, 54);
            /* Color de fondo del encabezado */
            padding: 0rem;
            /* Relleno del encabezado */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Sombra del encabezado */
        }


        .content-main {
            background-color: rgb(34, 37, 42);
            /* Color de fondo del contenido principal */
            padding: 2rem;
            /* Relleno del contenido principal */
            margin-left: 20%;
            /* Aumento del margen izquierdo */
            margin-right: 20%;
            /* Aumento del margen derecho */
        }

      
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
            background-color: rgb(34, 37, 42);

        }

        .content-wrapper {
            display: flex;
        }

        .content-main {
            flex-grow: 1;
        }

        .content-main.left-margin-adjusted {
            margin-left: 20%;
           
        }

        .submenu {
            margin-left: 10px;
      
        }
    </style>

</head>

<body>

    <div class="fixed-header">
        @yield('header')
    </div>

    <div class="fixed-menu">
        @yield('menu')
    </div>

    <div class="ml-1/4 mt-8 content-main">

        @yield('content')
    </div>

    <div class="fixed-submenu">
        @yield('submenu')
    </div>
</body>

</html>
