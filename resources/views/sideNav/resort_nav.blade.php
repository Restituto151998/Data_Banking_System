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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('../assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/data.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/logo.png" />

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<style>
    .paginate_button {
        color: #21791A;
    }

    @media screen and (min-width: 676px) {
        .modal-dialog {
            max-width: 1000px;
            /* New width for default modal */
        }

    }

    @media print {
        #date {
            display: none;
        }

        #scroll {
            overflow-x: hidden;
        }

        .print {
            display: none;
        }

        .main-sidebar {
            display: none;
            margin-top: -20px;
        }

        #table_length {
            display: none;
        }

        #table_filter {
            display: none;
        }

        #table_info {
            display: none;
        }

        .pagination {
            display: none;
        }

        #arrow {
            display: none;
        }

        .sta {
            display: none;
        }

        #back {
            display: none;
        }

    }

</style>

<body>
    <div class="loader"></div>
    <div id="#app"></div>
    @auth
        @yield('editResortlist')
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
                        <a href="/" data-toggle="sidebar" id="click_me" class="nav-link nav-link-lgcollapse-btn">
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
                            <a class="dropdown-item text-center" style="color:#21791A;" href="/profile"
                                document.getElementById('logout-form').submit();">
                                {{ __('Profile') }}
                                <img src="{{ Auth::user()->image ?? asset('storage/images/default_profile.jpg') }}"
                                    class="rounded-circle ml-2" style="width:20px; height: 20px;" alt="img">
                            </a>
                            <a class="dropdown-item text-center" style="color:#21791A;" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                          document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i data-feather="log-out" class="ml-2"></i>
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
            <aside id="sidebar-wrapper ">
                <div class="sidebar-brand " style="background:#21791A;">
                    <a href=""> <img alt="image" src="../../assets/img/logo.png" class="header-logo rounded-circle" />
                        <span class="text-white " class="logo-name" id="alcoy">{{ __('Alcoy') }}</span>
                    </a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    @if (Auth::user()->type == 'ADMIN')
                        <li class="dropdown">
                            <a href="/admin_dashboard" class="nav-link"
                                style="{{ request()->routeIs('admin.dashboard') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                        </li>
                    @endif
                    @if (Auth::user()->type == 'STAFF')
                        <li class="dropdown">
                            <a href="/staff_dashboard" class="nav-link"
                                style="{{ request()->routeIs('staff.dashboard') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="monitor"></i><span>{{ __('Dashboard') }}</span></a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="/profile" class="nav-link"
                            style="{{ request()->routeIs('admin.profile') ? '  border-right: 10px solid green;' : '' }}"><i
                                data-feather="user"></i><span>{{ __('Profile') }}</span></a>
                    </li>
                    @if (Auth::user()->type == 'STAFF')
                        <li class="dropdown">
                            <a href="/resort_guest/{{ Auth::user()->resortList->resort_id }}" class="nav-link"
                                style="{{ request()->is('resort_guest*') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="list"></i><span>{{ Auth::user()->resortList->resort_name }}</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="/staff_register" class="nav-link"
                                style="{{ request()->routeIs('staff.staff_register') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="edit"></i><span>{{ __('Direct Register') }}</span></a>
                        </li>
                    @endif
                    @if (Auth::user()->type == 'ADMIN')
                        <li class="dropdown">
                            <a href="/add_resort" class="nav-link"
                                style="{{ request()->routeIs('admin.add_resort') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="image"></i><span>{{ __('Add Resort') }}</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="/add_user" class="nav-link"
                                style="{{ request()->is('add_user*') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="users"></i><span>{{ __('Users') }}</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="/resort_list" class="nav-link"
                                style="{{ request()->is('resort_list*') ? '  border-right: 10px solid green;' : '' }}"><i
                                    data-feather="list"></i><span>{{ __('Resort Assignee') }}</span></a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="/generate_qrcode" class="nav-link"
                            style="{{ request()->routeIs('resorts.generate_qrcode') ? '  border-right: 10px solid green;' : '' }}"><i
                                data-feather="code"></i><span>{{ __('QRcode') }}</span></a>
                    </li>
                </ul>
            </aside>
        </div>
    @endauth

    <main class="py-4">


    </main>
    @yield('content')

    <script src="{{ asset('../assets/js/app.min.js') }}"></script>
    <script src="{{ asset('../assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('../assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('../assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('../assets/js/scripts.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('../assets/js/jquery.printPage.js') }}"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn-password').on('click', function() {
                $('#change-password').attr('hidden', false);
                $('#btn-password').attr('hidden', true);
            });

            $('#table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });

            $('.p').hide();

            $("#click_me").click(function() {
                $("#alcoy").toggle();
            });

            $('#imageMain').change(function() {
                $('#btn-edit').prop('disabled', false);
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-imageMain').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        function filterText() {
            var rex = new RegExp($('#filterText').val());
            if (rex == "/all/") {
                clearFilter()
            } else {
                $('.tr').hide();
                $('.tr').filter(function() {
                    return rex.test($(this).text());
                }).show();
            }
        }

        function clearFilter() {
            $('.filterText').val('');
            $('.tr').show();
        }

        $('.from').change(function() {
            $('#update-btn').attr('disabled', false);
        });

        $('.to').change(function() {
            $('#update-btn').attr('disabled', false);
        });

        const resort_name = $('#resort_name').val();
        $('#resort_name').on('input change', function() {
            if ($(this).val() != resort_name) {
                $('#btn-edit').prop('disabled', false);
            } else {
                $('#btn-edit').prop('disabled', true);
            }
        });

        const description = $('#resort_description').val();
        $('#resort_description').on('input change', function() {
            if ($(this).val() != description) {
                $('#btn-edit').prop('disabled', false);
            } else {
                $('#btn-edit').prop('disabled', true);
            }
        });

        $('#inputGroupSelect01').change(function() {
            $('#btn-edit').attr('disabled', false);
        });

        const name = $('#name').val();
        $('#name').on('input change', function() {
            if ($(this).val() != name) {
                $('#edit').prop('disabled', false);
            } else {
                $('#edit').prop('disabled', true);
            }
        });

        const username = $('#username').val();
        $('#username').on('input change', function() {
            if ($(this).val() != username) {
                $('#edit').prop('disabled', false);
            } else {
                $('#edit').prop('disabled', true);
            }
        });

        const phone_number = $('#phone_number').val();
        $('#phone_number').on('input change', function() {
            if ($(this).val() != phone_number) {
                $('#edit').prop('disabled', false);
            } else {
                $('#edit').prop('disabled', true);
            }
        });

        const gender = $('#gender').val();
        $('#gender').on('input change', function() {
            if ($(this).val() != gender) {
                $('#edit').prop('disabled', false);
            } else {
                $('#edit').prop('disabled', true);
            }
        });

        const address = $('#address').val();
        $('#address').on('input change', function() {
            if ($(this).val() != address) {
                $('#edit').prop('disabled', false);
            } else {
                $('#edit').prop('disabled', true);
            }
        });
        
        function newpass() {
        var x = document.getElementById("new");
        if (x.type === "password") {
            x.type = "text";
            $('#newpass').toggleClass('fa fa-eye fa fa-eye-slash');
        } else {
            x.type = "password";
            $('#newpass').toggleClass('fa fa-eye-slash fa fa-eye');
        }
    }

    function confirm() {
        var x = document.getElementById("confirm");
        if (x.type === "password") {
            x.type = "text";
            $('#conf').toggleClass('fa fa-eye fa fa-eye-slash');
        } else {
            x.type = "password";
            $('#conf').toggleClass('fa fa-eye-slash fa fa-eye');
        }
    }

    </script>
</body>

</html>
