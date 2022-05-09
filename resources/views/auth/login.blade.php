@extends('sideNav.side_navbar')
@section('content')

    <body style="background-color: #21791A">
    @include('sweetalert::alert')
        <div class="container ">
            <div class="container mt-5">
                <div class="row" id="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"
                        id="login">
                        {{-- <div class="card" id="login"> --}}
                        <div class="inline-block">
                            <!-- <div class="card-header justify-content-center pt-4"> -->
                            <div>
                                <img alt="image" src="assets/img/logo.png" class="login-logo rounded-circle" />
                                <h2 class="text-login">Login</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group-append">
                                        <strong><label><i data-feather="user" class="mt-3"></i> </label></strong>
                                        </button>
                                        <input id="email" type="username"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            class="form-control" name="username" tabindex="1"
                                            value="{{ old('username') }}" required autocomplete="username"
                                            placeholder="Username" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-append">
                                        <strong><label><i data-feather="key" class="mt-3"></i> </label></strong>
                                        <input id="password"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            type="password" class="form-control" name="password" tabindex="2" required
                                            autocomplete="Password" placeholder="Password">
                                        <i class="fa fa-eye-slash mt-3" id="pas" style="font-size:18px;"></i>
                                    </div>
                                    @error('username')

                                        <span class="text-danger">
                                            <p>Username and password doesn't match!</p>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <button type="submit" tabindex="4" class="w-50 login-btn">
                                        {{ __('Login') }}
                                    </button>
                                    <a class="text-danger text-center" style="margin-top: 22%;" href="{{ url('reset_password') }}">
                                        Forgot password?
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
