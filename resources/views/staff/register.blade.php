@extends('sideNav.side_navbar')

@section('register')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            @if (Auth::user()->resortList->status == 'closed')
                <span>This tab is restricted to use. to use it. you may request the admin to open this resort.</span>
            @else
                @if (session()->has('status'))
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky"
                        role="alert">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Register') }}</div>
                                <form method="post" enctype="multipart/form-data" id="add_guest"
                                    action="{{ url('/register') }}">
                                    @csrf
                                    <div class="card-body text-center ml-5 mr-5">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Full Name"
                                                    name="full_name" required>
                                            </div>
                                            <div class="col">
                                                <select class="custom-select text-center" id="inputGroupSelect01"
                                                    style="background-color:#FFFFFF;border-left-color:#FFFFFF; border-bottom-color:green;border-right-color:#FFFFFF;border-top-color:#FFFFFF"
                                                    name="gender" tabindex="1" required autocomplete="gender" autofocus>
                                                    <option selected>Select gender...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Address" name="address"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <input type="number"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Phone Number"
                                                    name="phone_number" required>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Nationality"
                                                    name="nationality" required>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" placeholder="Temperature"
                                                    name="temperature" required>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col">
                                                <select class="custom-select mt-2 text-center" id="inputGroupSelect01"
                                                    style="background-color:#FFFFFF;border-left-color:#FFFFFF; border-bottom-color:green;border-right-color:#FFFFFF;border-top-color:#FFFFFF"
                                                    name="time_use" tabindex="1" required autocomplete="time_use" autofocus>
                                                    <option selected>Select time...</option>
                                                    <option value="Daytime use">Daytime use</option>
                                                    <option value="Nighttime use">Nighttime use</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center mt-2" placeholder="Purpose"
                                                    name="purpose" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn text-white w-50 mt-5"
                                                style="background-color:  #21791A">Register</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
