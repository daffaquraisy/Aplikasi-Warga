<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!-- Fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>App Warga @yield('title')</title>
    </head>
    <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">App Warga</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="dropdown-item" style="cursor:pointer" type="submit"><i class="fa fa-sign-out fa-lg"></i> Keluar</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <ul class="app-menu">

            <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
            </li>

            <li><a class="app-menu__item" href="{{route('users.index')}}"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Users</span></a>
            </li>

            <li><a class="app-menu__item" href="{{route('informations.index')}}"><i class="app-menu__icon fas fa-info-circle"></i><span class="app-menu__label">Manage Informations</span></a>
            </li>

            <li><a class="app-menu__item" href="{{route('see.informations')}}"><i class="app-menu__icon fas fa-info-circle"></i><span class="app-menu__label">Lihat Berita</span></a>
            </li>

            <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-sign-out fa-lg"></i><span class="app-menu__label">Logout</span></a>
            </li>
        </ul>
    </aside>
    <main class="app-content">

                @yield('content')   
            
    </main>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('footer-scripts')
    @yield('snap-js')
    <script src="https://kit.fontawesome.com/20e16e5617.js"></script>


    </body>
</html>