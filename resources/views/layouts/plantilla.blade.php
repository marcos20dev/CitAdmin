<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>



<body class="bg-gray-100">

    @include('layouts.partials.header')

    @yield('login')

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

</body>

</html>
