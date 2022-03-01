@extends('sideNav.side_navbar')

@section('register')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <form method="post" enctype="multipart/form-data" id="add_guest" action="{{ url('/register') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" name="gender">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" name="nationality">
                            </div>
                            <div class="form-group">
                                <label for="">Temperature</label>
                                <input type="text" name="temperature">
                            </div>
                            <div class="form-group">
                                <label for="">Time Use</label>
                                <input type="text" name="time_use">
                            </div>
                            <div class="form-group">
                                <label for="">Purpose</label>
                                <input type="text" name="purpose">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">register</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
