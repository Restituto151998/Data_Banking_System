@extends('sideNav.side_navbar')

@section('content')
<body class="bg">
    <div class="container ">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" id = "login">
                    <div class="card" id="login">
                        <div class="inline-block">
                        <!-- <div class="card-header justify-content-center pt-4"> -->
                            <div>
                        <img alt="image" src="assets/img/logo.png" class="login-logo rounded-circle"/>
                            <!-- <span class="text-success h3 pt-2">Login</span> -->
                            <!-- <img src="{{ asset('/img/logo.png') }}"> -->
                            <h2 class="text-login">Login</h2>
                         </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group d-flex">
                                    <strong><label for="email" class="text-dark text-username mt-3">Username:</label></strong>
                                     
                                        <input id="email" type="email" style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB" class="form-control @error('email') is-invalid @enderror"
                                            name="email" tabindex="1" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group d-flex">
                                <strong><label for="email" class="text-dark text-password mt-3">Password:</label></strong>
                                    <input id="password" style="background-color:#F4EBEB;border-left-color:#F4EBEB; border-bottom-color:green;border-right-color:#F4EBEB;border-top-color:#F4EBEB" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" tabindex="4" class="btn-block login-btn">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
