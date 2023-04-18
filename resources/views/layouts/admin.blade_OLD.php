<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appAdminLte3.css') }}" rel="stylesheet">

    <!-- datatables -->
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/colReorder.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/searchBuilder.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
  
    
    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-gray navbar-light" style="background-color: gray;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item" >
                <a class="nav-link" style="color:orange;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('img/campana.png') }}" class="brand-image-xl.single">
                     <img src="{{ asset('img/usuario.png') }}"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline" style="color:white;">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="{{ route('profile.show') }}" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Sign out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('contenido')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 2023
        </div>
        <strong>Copyright &copy; 2023 <a href="#" target="_blank">SICOS</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/appAdminLte3.js') }}" defer></script>

<script type="text/javascript" src="{{asset('js/jquery-3.6.0.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}" defer></script>
<script src="{{ asset('js/jszip.min.js') }}" defer></script>
<script src="{{ asset('js/pdfmake.min.js') }}" defer></script>
<script src="{{ asset('js/vfs_fonts.js') }}" defer></script>
<script src="{{ asset('js/buttons.html5.min.js') }}" defer></script>
<script src="{{ asset('js/buttons.print.min.js') }}" defer></script>

<script src="{{ asset('js/dataTables.searchBuilder.min.js') }}" defer></script>

<script src="{{ asset('js/latest/js/toastr.min.js') }}" defer></script>
  
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
