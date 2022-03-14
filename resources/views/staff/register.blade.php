@extends('sideNav.side_navbar')

@section('register')

    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            @if (Auth::user()->resortList->status == 'closed')
                <span>This tab is restricted to use. to use it. you may request the admin to open this resort.</span>
            @else
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade  show" role="alert">
                        {{ session()->get('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                                                    class="form-control text-center" name="full_name" required>
                                                <strong><label for="" class="col-form-label mb-1 text-black">Full
                                                        Name</label></strong>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="gender" required>
                                                <strong><label for=""
                                                        class="col-form-label mb-1 text-black">Gender</label></strong>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="address" required>
                                                <strong><label for=""
                                                        class="col-form-label mb-1 text-black">Address</label></strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="number"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="phone_number" required>
                                                <strong><label for="" class="col-form-label mb-1 text-black">Phone
                                                        Number</label></strong>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="nationality" required>
                                                <strong><label for=""
                                                        class="col-form-label mb-1 text-black">Nationality</label></strong>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="temperature" required>
                                                <strong><label for=""
                                                        class="col-form-label mb-1 text-black">Temperature</label></strong>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <select class="custom-select mt-2 text-center" id="inputGroupSelect01"
                                                    style="background-color:#FFFFFF;border-left-color:#FFFFFF; border-bottom-color:green;border-right-color:#FFFFFF;border-top-color:#FFFFFF"
                                                    name="time_use" tabindex="1" required autocomplete="time_use" autofocus>
                                                    <option selected>Choose time use...</option>
                                                    <option value="Daytime use">Daytime use</option>
                                                    <option value="Nighttime use">Nighttime use</option>
                                                </select>
                                                <strong><label for="" class="col-form-label mb-1 text-black">Time
                                                        Use</label></strong>
                                            </div>
                                            <div class="col">
                                                <input type="text"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center mt-2" name="purpose" required>
                                                <strong><label for=""
                                                        class="col-form-label mb-1 text-black">Purpose</label></strong>
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
