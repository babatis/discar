<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?> </script>
    
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <div id="app">
        @include('layouts.header_admin')
        <div class="app-body">
            @include('layouts.sidebar_admin')
            <main class="main">
                    @yield('menu')
                <div class="container-fluid mt-3 px-3">
                    <div class="animated fadeIn">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    {{-- <footer class="app-footer d-print-none">
        <div>
            <a href="https://www.lemo.cl">Comercial Lemo & Montoya SPA</a>
            <span>&copy; 2018.</span>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="#">cdc</a>
        </div>
    </footer > --}}
    <!-- Scripts -->
   
     <script src="{{ mix('js/app.js') }}" defer></script>
     
     @yield('js')
     
</body>
</html>
