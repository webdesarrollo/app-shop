<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">
    @yield('estilo')
    <title>ADMIN</title>
  </head>
  <body>

    <div class="container-scroller">
        @include('layouts.parciales.adminNav')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.parciales.adminSidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('layouts.parciales.breadcrumb')
                    <!--Contenido-->
                    @yield('contenido')

                </div>
                @include('layouts.parciales.adminFooter')
            </div>
        </div>
    </div>

<!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('sripts')
<!-- Scripts -->
  </body>
</html>
