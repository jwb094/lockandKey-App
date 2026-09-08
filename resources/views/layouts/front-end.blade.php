<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
 @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))) 
    <link rel="stylesheet" href=" {{ URL::asset('css/reset.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('css/layout.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('css/mobile_nav.css') }}">
        <link rel="stylesheet" href=" {{ URL::asset('css/mobile_nav_bootstrap_custom.css') }}">
    <link rel="stylesheet" href=" {{ URL::asset('css/sidebar.css') }}">
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href=" {{ URL::asset('css/admin_layout.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
     @else 

     @endif 
</head>

<body class="d-flex flex-column align-items-center justify-content-center vh-100 bg-body-tertiary">
    <main class="container-fluid ">
        @yield('content')
    </main>
    @include('include.public_footer')
    @stack('scripts')
    <script src="{{ URL::asset('js/mobile_nav.js') }}"></script>
      <script src="{{ URL::asset('js/admin_nav.js') }}"></script>
</body>
</html>
