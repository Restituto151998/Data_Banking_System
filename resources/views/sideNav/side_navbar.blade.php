<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script type="text/javascript">
        function disableBack() {
            window.history.forward();
        }
        setTimeout("disableBack()", 0);
        window.onunload = function() {
            null
        };

    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/data.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/data.css">
    <link rel="stylesheet" href="./assets/css/loader.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo.png" />
</head>
<style>
    @media screen and (min-width: 676px) {
        .modal-dialog {
            max-width: 1000px;
            /* New width for default modal */
        }
    }

</style>

<body>
    <div class="loader"></div>
    <div id="app"></div>
    @auth
        @yield('adminDashboard')
        @yield('staffDashboard')
        @yield('profile')
        @yield('addResort')
        @yield('addUser')
        @yield('resortList')
        @yield('editUser')
        @yield('register')
        @yield('qr-code')
        <nav class="navbar navbar-expand-lg main-navbar sticky" style="background:#21791A;">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="/" data-toggle="sidebar" id="click_me" class="nav-link nav-link-lgcollapse-btn ">
                            <i data-feather="align-justify"></i>
                        </a>
                    </li>
                </ul>
                <div class="text-white h3 pt-2">
                    @if (Auth::user()->type == 'STAFF')
                        {{ Auth::user()->resortList->resort_name }}
                    @else
                        Alcoy Data Banking
                    @endif
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
                            <img src="{{ Auth::user()->image ?? asset('storage/images/default_profile.jpg') }}"
                                class="rounded-circle" style="width:30px; height: 30px;" alt="img">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item text-center" href="{{ url()->previous() }}"
                                onclick="event.preventDefault();                                                                                                                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i data-feather="log-out" class="ml-2"></i>
                            </a>
                            <a class="dropdown-item text-center" href="/profile"
                                document.getElementById('logout-form').submit();">
                                {{ __('Profile') }}
                                <img src="{{ Auth::user()->image ?? asset('storage/images/default_profile.jpg') }}"
                                    class="rounded-circle ml-2" style="width:20px; height: 20px;" alt="img">
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-1 sticky">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand" style="background:#21791A;">
                    <a href=""> <img alt="image" src="assets/img/logo.png" class="header-logo rounded-circle" /> <span
                            class="text-white" id="alcoy">{{ __('Alcoy') }}</span>
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
                    </li>
                    @if (Auth::user()->type == 'STAFF')
                        <li class="dropdown">
                            <a href="/resort_guest/{{ Auth::user()->resortList->resort_id }}" class="nav-link"><i
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
                                    data-feather="users"></i><span>{{ __('Users') }}</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="/resort_list" class="nav-link"><i
                                    data-feather="list"></i><span>{{ __('Resort Assignee') }}</span></a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="/generate_qrcode" class="nav-link"><i
                                data-feather="code"></i><span>{{ __('QRcode') }}</span></a>
                    </li>
                </ul>
            </aside>
        </div>
    @endauth

    <body class="py-4">
        @yield('content')
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#add_resort').submit(function(e) {
                if ($(this).data('submitted') === true) {
                    alert('Form is already submitted, waiting response.');
                    e.preventDefault();
                } else {
                    $(this).data('submitted', true);
                }
            });

            $('#add_guest').submit(function(e) {
                if ($(this).data('submitted') === true) {
                    alert('Form is already submitted, waiting response.');
                    e.preventDefault();
                } else {
                    $(this).data('submitted', true);
                }
            });

            $('#form_add_user').submit(function(e) {
                if ($(this).data('submitted') === true) {
                    alert('Form is already submitted, waiting response.');
                    e.preventDefault();
                } else {
                    $(this).data('submitted', true);
                }
            });
            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('#profile').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-profile-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('#change_profile').attr('disabled', false);
            });
            $('#password').change(function() {
                $('#change-password').attr('hidden', false);
            });

            $('.p').hide();
            $("#myInput").on("keyup", function() {
                var count = 0;
                var value = $(this).val().toLowerCase();

                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

                $('.tr:visible').each(function() {
                    count++;
                });

                if (value != '') {
                    $('#no_data').hide();
                    if (count === 0) {
                        $('.p').show();

                    } else {
                        $('.p').hide();

                    }
                } else {
                    $('#no_data').show()
                    $('.p').hide();
                }


            });

            $('#pas').on('click', function() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    $('#pas').toggleClass('fa fa-eye fa fa-eye-slash');
                } else {
                    x.type = "password";
                    $('#pas').toggleClass('fa fa-eye-slash fa fa-eye');
                }
            })



        });
        $('#generate').on('click', function() {
            setTimeout(function() {
                $('#load').attr('hidden', false);
                $('#arrow_down').attr('hidden', true);
            }, 0);

            setTimeout(function() {
                $('#qr').attr('hidden', false);
                $('.qr-text').attr('hidden', false);
                $('#qr-download').attr('hidden', false);;
                $('#load').attr('hidden', true);;
            }, 3000);
            $('#generate').attr('disabled', true);;
        });
        $("#click_me").click(function() {
            $("#alcoy").toggle();
        });

    </script>
</body>

</html>
