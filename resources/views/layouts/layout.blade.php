<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dynamic Meta Info -->
    <title>@yield('meta_title', 'SMK PGRI 2 Malang')</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi SMK PGRI 2 Malang')">
    <meta name="keywords" content="@yield('meta_keywords', 'SMK, Pendidikan, Sekolah, Malang')">
    <meta name="author" content="@yield('meta_author', 'SMK PGRI 2 Malang')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo.webp') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Append version number to CSS file name -->
    <link rel="stylesheet" href="{{ asset('css/app.css?v=1.04') }}">
    <link rel="preload" href="{{ asset('css/app.css?v=1.04') }}" as="style" crossorigin="anonymous" />
</head>

<body class="antialiased font-jakarta">

    @if (!in_array(Route::currentRouteName(), ['admin.login']))
        @include('layouts.components.navbar')
    @endif
    <main class="w-full">
        @yield('content')
    </main>

    @if (!in_array(Route::currentRouteName(), ['admin.login']))
        @include('layouts.components.footer')
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.2/feather.min.js"
        integrity="sha512-zMm7+ZQ8AZr1r3W8Z8lDATkH05QG5Gm2xc6MlsCdBz9l6oE8Y7IXByMgSm/rdRQrhuHt99HAYfMljBOEZ68q5A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
