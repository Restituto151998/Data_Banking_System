@extends('sideNav.side_navbar')

@section('content')

    <body style="background-color: #21791A">
        <div class="container ">
            <div class="container mt-5">
                <div class="row">
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
                                        <strong><label><i data-feather="mail" class="mt-3"></i> </label></strong>
                                        </button>
                                        <input id="email" type="email"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            class="form-control ml-2 text-center @error('email') is-invalid @enderror" name="email" placeholder="Email Address"
                                            tabindex="1" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group-append">
                                        <strong><label><i data-feather="key" class="mt-3"></i> </label></strong>
                                        <input id="password"
                                            style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB"
                                            type="password" class="form-control ml-2 text-center @error('email') is-invalid @enderror"
                                            name="password" placeholder="Password" tabindex="2" required autocomplete="current-password">
                                    </div>
                                    @error('email')

                                        <span class="text-danger">
                                            <strong>email and password doesn't match!</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" tabindex="4" class="w-50 login-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                            {{-- @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif --}}
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
