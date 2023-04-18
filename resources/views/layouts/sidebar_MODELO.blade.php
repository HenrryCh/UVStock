<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: gray;">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('img/logo.png') }}"
             alt="AdminLTE Logo"
             class="brand-image-xl.single img-circle elevation-3">
        <span class="brand-text font-weight-bold" style="color:orange;">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
