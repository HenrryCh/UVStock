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
    @yield('third_party_stylesheets')

    @stack('page_css')

</head> 

<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-gray navbar-light" style="background-color: #37474F; height: 67px">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="color:orange;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >
                    <img id="campana" src="{{ asset('img/campana0.png') }}" style="height:30px;" class="brand-image-xl.single" onload="obtenerProductosStockMinimo();">

                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="border-radius: 8px; left: inherit; right:0px; margin: 12px">   
                <span class="dropdown-item dropdown-header">Notificaciones</span>
                    <div class="dropdown-divider"></div>
                    <div class="list-group-item d-flex" id="mensajes" style="font-size:80%; margin: 10px; overflow-y: auto; max-height: 200px;"></div>
                    <div class="dropdown-divider"></div>     
                </div>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown">
                    
                    @if (Auth::check() && Auth::user()->profile_photo_path)
                    <img src="{{ asset('img/profile/'.auth()->user()->profile_photo_path) }}" class="user-image img-circle elevation-2" alt="User Image">
                     @else
                    <img src="{{ asset('img/usuario.png') }}" class="user-image img-circle elevation-2" alt="User Image">
                     @endif
                    <span style="color:white;" class="d-none d-md-inline">{{ Auth::user()->name }} </span>
                </a>
           
            <ul class="dropdown-menu dropdown-menu- dropdown-menu-right " style="border-radius: 8px; width: 50px; margin: 12px">

                <!-- Menu Footer-->
                <div class="nav-item dropdown user-menu">
                    <li class="user-footer">
                        <a href="#" class="dropdown-item" role="menuitem" tabindex="-1"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>{{ __('Sign out') }}</span>
                            <span class="float-right"> <i class="fas fa-sign-out-alt"></i></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
            </ul>    
            </li>
        </ul>
    </nav>
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('contenido')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sgu-card">
                                <div class="title" align="center"><span>Datos Personales</span></div>
                                    <div class="dropdown-divider"></div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 text-center" style="max-width: 800px; margin: auto;">
                                                <div align="center">
                                                    @if (auth()->user()->profile_photo_path)
                                                    <img  style="border: 1px solid rgb(152, 149, 149); border-radius: 10px; height: 200px; width: 200px;" class="img-profile"  src="{{ asset('img/profile/'.auth()->user()->profile_photo_path) }}" alt="Profile photo">
                                                    @else
                                                    <p>Sin foto de perfil</p>
                                                    @endif
                                                </div>
                                                    @can('edit photo')
                                                        <a href="" data-target="#modal-edit-{{auth()->user()->id}}" data-toggle="modal" title="Editar datos de este registro"><button class="btn btn-info btn-sm shadow"><i class='fa fa-edit'></i></button></a>
                                                    @endcan
                                                    @include('layouts.edit')
                                            </div>
                                            <div class="col-md-9 col-lg-9">
                                                <div class="row container-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-group-item" style="font-size:100%; margin: 30px;  height: auto; width: 30em; border-radius: 10px;">
                                                            <span><b>Cédula:</b></span>
                                                            <span> {{ auth()->user()->cedula}}</span>
                                                            <div class="dropdown-divider"></div>
    
                                                            <span><b>Nombres: </b></span>
                                                            <span > {{ auth()->user()->nombres }}</span>
                                                            <div class="dropdown-divider"></div>
    
                                                            <span><b>Apellidos:</b></span>
                                                            <span> {{ auth()->user()->apellidos }}</span>
                                                            <div class="dropdown-divider"></div>
    
                                                            <span><b>Celular:</b></span>
                                                            <span> {{ auth()->user()->celular }}</span>
                                                            <div class="dropdown-divider"></div>
    
                                                            <span><b>Correo:</b></span>
                                                            <span> {{ auth()->user()->email }}</span>
                                                            <div class="dropdown-divider"></div>  
                                                            
                                                            <span><b>Rol:</b></span>
                                                            <span> {{ auth()->user()->roles[0]->name}} </span>
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>   
        </section>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/appAdminLte3.js') }}" defer></script>
@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>