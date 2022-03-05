<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('../../js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('../assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Template CSS -->

    <link rel="stylesheet" href="../../assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="stylesheet" href="../../assets/css/data.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/alcoyLogo.png" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
    <div id="#app"></div>
    @auth
        @yield('voda')
        @yield('search')
        @yield('editUser')
        @yield('lionarch')
        @yield('resort_search')


        <div id="#app" class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky" style="background:#21791A;">
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
                            @if(Auth::user()->image)
                            <img src="{{ asset('storage/images/'.Auth::user()->image) }}" class="rounded-circle" style="width:30px; height: 30px;" alt="img">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <aside id="sidebar-wrapper ">
                <div class="sidebar-brand " style="background:#21791A;">
                    <a href=""> <img alt="image" src="../../assets/img/logo.png" class="header-logo rounded-circle" />
                        <span class="text-white " class="logo-name">{{ __('Alcoy') }}</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    @if (Auth::user()->type == 'ADMIN')
                    <li class="dropdown">
                        <a href="/admin_dashboard" class="nav-link"><i
                                data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                    </li>
                    @endif
                    @if (Auth::user()->type == 'STAFF')
                    <li class="dropdown">
                        <a href="/staff_dashboard" class="nav-link"><i
                                data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="/profile" class="nav-link"><i
                                data-feather="user"></i><span>{{ __('Profile') }}</span></a>
                    </li>  @if(Auth::user()->type == "STAFF")
                    <li class="dropdown">
                        <a href="/resort_guest/{{Auth::user()->resortList->resort_id}}" class="nav-link"><i
                                data-feather="list"></i><span>{{ Auth::user()->resortList->resort_name }}</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="/staff_register" class="nav-link"><i
                                data-feather="edit"></i><span>{{ __('Direct Register') }}</span></a>
                    </li>
                    @endif
            
                  
                    @if (Auth::user()->type == 'ADMIN')
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
                    @endif
                </ul>
            </aside>
        </div>
    @endauth

    <main class="py-4">


    </main>
    @yield('content')


    <!-- General JS Scripts -->
    <script src="{{ asset('../assets/js/app.min.js') }}"></script>

    <script src="{{ asset('../assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('../assets/bundles/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script> --}}
    <script src="{{ asset('../assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/js/page/datatables.js') }}"></script> --}}

    <!-- Template JS File -->
    <script src="{{ asset('../assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('../assets/js/custom.js') }}"></script>
    <script src="{{ asset('../assets/js/jquery.printPage.js') }}"></script>
    <script>
        
        $(document).ready(function() {
            $('.print').printPage();
        });

    </script>
</body>

</html>
