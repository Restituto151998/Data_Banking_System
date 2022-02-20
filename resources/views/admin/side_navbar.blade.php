<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Template CSS -->

    <link rel="stylesheet" href="./assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/evsu.jpg" />
</head>

<body>
    @auth
        @yield('dashboard')
        @yield('profile')
        @yield('addResort')
        @yield('addUser')
        @yield('resortList')

        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="/" data-toggle="sidebar" class="nav-link nav-link-lgcollapse-btn">
                            <i data-feather="align-justify"></i>
                        </a>
                    </li>
                </ul>
                <div class="text-white h3 pt-2">
                    Alcoy Data Banking
                </div>
            </div>
            <ul class="navbar-nav navbar-right">

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" hidden>{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <div class="main-sidebar sidebar-style-1 ">
            <aside id="sidebar-wrapper bg-primary">
                <div class="sidebar-brand">
                    <a href=""> <img alt="image" src="assets/img/evsu.jpg" class="header-logo" /> <span
                            class="logo-name">ALCOY</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown">
                        <a href="/admin_dashboard" class="nav-link"><i
                                data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                    </li>

                    <li class="dropdown">
                        <a href="/profile" class="nav-link"><i
                                data-feather="user"></i><span>{{ __('Profile') }}</span></a>
                    </li>

                    <li class="dropdown">
                        <a href="/add_resort" class="nav-link"><i
                                data-feather="image"></i><span>{{ __('Add Resort') }}</span></a>
                    </li>

                    <li class="dropdown">
                        <a href="/add_user" class="nav-link"><i
                                data-feather="users"></i><span>{{ __('Add User') }}</span></a>
                    </li>

                    <li class="dropdown">
                        <a href="/resort_list" class="nav-link"><i
                                data-feather="list"></i><span>{{ __('Resort List') }}</span></a>
                    </li>
                </ul>
            </aside>
        </div>
    @endauth

    <main class="py-4">
        @yield('content')
    </main>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                $input = $(this).closest('td').find('input')
                if ($input.attr('type') === 'password') {
                    $input.attr('type', 'text')
                    $(this).text('Hide')
                } else {
                    $input.attr('type', 'password')
                    $(this).text('Show')
                }
            })
            $('body').removeClass('theme-white')
            $('body').addClass('theme-purple')
        })

    </script>
</body>
</html>
