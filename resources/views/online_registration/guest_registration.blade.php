<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="./assets/css/data.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/alcoyLogo.png" />
</head>

<body style="background-color:#21791A">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"
                    id="register">
                    @if (session()->has('status'))
                        <div class="alert alert-success alert-dismissible fade  show" role="alert">
                            {{ session()->get('status') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col" id="register_content">
                                <div class="inline-block">
                                    <div>
                                        <img alt="image" src="assets/img/logo.png"
                                            class="register-logo rounded-circle" />
                                        <h3 class="text-register">Welcome to Alcoy</h3>
                                    </div>
                                </div>
                                <div class="card-header">{{ __('Register') }}</div>
                                <form method="post" enctype="multipart/form-data" id="add_guest"
                                    action="{{ url('/guest_register') }}">
                                    @csrf
                                    <div class="card-body ">
                                        <div class="row mb-2">
                                            <div class="col d-flex" style="width:500px">
                                                <strong><label><i data-feather="check-square" class="mt-3"></i>
                                                    </label></strong>
                                                </button>
                                                <select class="custom-select mt-2 ml-4" id="inputGroupSelect01"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    name="resort">
                                                    <option selected>Choose resort...</option>
                                                    @foreach ($resorts as $resort)
                                                        <option value="{{ json_encode($resort) }}">
                                                            {{ $resort->resort_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group  mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="user" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="text"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="full_name" placeholder="Full name"
                                                    tabindex="1" required autocomplete="full_name" autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col d-flex" style="width:500px">
                                                <strong><label><i data-feather="users" class="mt-3"></i>
                                                    </label></strong>
                                                </button>
                                                <select class="custom-select mt-2 ml-4" id="inputGroupSelect01"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    name="gender" tabindex="1" required autocomplete="gender"
                                                    autofocus>
                                                    <option selected>Choose gender...</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="navigation" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="text"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="address" placeholder="Address"
                                                    tabindex="1" required autocomplete="address" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="phone" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="number"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="phone_number"
                                                    placeholder="Phone number" tabindex="1" required
                                                    autocomplete="phone_number" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="flag" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="text"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="nationality"
                                                    placeholder="Nationality" tabindex="1" required
                                                    autocomplete="nationality" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="thermometer" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="number"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="temperature"
                                                    placeholder="Temperature" tabindex="1" required
                                                    autocomplete="temperature" autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col d-flex" style="width:500px">
                                                <strong><label><i data-feather="clock" class="mt-3"></i>
                                                    </label></strong>
                                                </button>
                                                <select class="custom-select mt-2 ml-4" id="inputGroupSelect01"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    name="time_use" tabindex="1" required autocomplete="time_use"
                                                    autofocus>
                                                    <option selected>Choose time use...</option>
                                                    <option value="Daytime use">Daytime use</option>
                                                    <option value="Nighttime use">Nighttime use</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <div class="input-group-append">
                                                <strong><label><i data-feather="activity" class="mt-2"></i>
                                                    </label></strong>
                                                </button>
                                                <input type="text"
                                                    style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                                    class="form-control ml-4" name="purpose" placeholder="Purpose"
                                                    tabindex="1" required autocomplete="purpose" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <button type="submit" tabindex="4" class="w-50 login-btn" style="margin-left: 75px">Register
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</html>
