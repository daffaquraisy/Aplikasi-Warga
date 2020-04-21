<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
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

            @can('manage-users', $user ?? '')
            <li><a class="app-menu__item" href="{{route('users.index')}}"><i class="app-menu__icon fas fa-users"></i><span class="app-menu__label">Data Pengguna</span></a>
            </li>
            @endcan

            @can('manage-patriarches', $user ?? '')
            <li><a class="app-menu__item" href="{{route('patriarches.index')}}"><i class="app-menu__icon fas fa-user"></i><span class="app-menu__label">Data Kepala Keluarga</span></a>
            </li>
            @endcan

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-list"></i><span class="app-menu__label">Data Warga</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">

                    @can('manage-residents', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.index')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga</a>
                    </li>
                    @endcan

                    @can('see-rt1', $user ?? '')
                    <li>
                            <a class="treeview-item" href="{{route('residents.rt1')}}">
                            <i class="icon fas fa-users"></i> Semua Data Warga RT 1</a>
                    </li>
                    @endcan

                    @can('see-rt2', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt2')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 2</a>
                    </li>
                    @endcan

                    @can('see-rt3', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt3')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 3</a>
                    </li>
                    @endcan

                    @can('see-rt4', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt4')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 4</a>
                    </li>
                    @endcan

                    @can('see-rt5', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt5')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 5</a>
                    </li>
                    @endcan

                    @can('see-rt6', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt6')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 6</a>
                    </li>
                    @endcan

                    @can('see-rt7', $user ?? '')
                    <li>
                        <a class="treeview-item" href="{{route('residents.rt7')}}">
                        <i class="icon fas fa-users"></i> Semua Data Warga RT 7</a>
                    </li>
                    @endcan

                </ul>


            </li>

            @can('manage-informations', $user ?? '')
            <li><a class="app-menu__item" href="{{route('informations.index')}}"><i class="app-menu__icon fas fa-info-circle"></i><span class="app-menu__label">Data Informasi</span></a>
            </li>
            @endcan

            <li><a class="app-menu__item" href="{{route('see.informations')}}"><i class="app-menu__icon fas fa-info-circle"></i><span class="app-menu__label">Lihat Berita</span></a>
            </li>

            <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-sign-out fa-lg"></i><span class="app-menu__label">Logout</span></a>
            </li>
        </ul>
    </aside>
    <main class="app-content">

                @yield('content')   
            
    </main>

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    @yield('footer-scripts')
    @yield('snap-js')
    <script src="https://kit.fontawesome.com/20e16e5617.js"></script>


    </body>
</html>