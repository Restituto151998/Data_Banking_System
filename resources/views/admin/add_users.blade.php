@extends('sideNav.side_navbar')

@section('addResort')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                @if (session()->has('message_fail'))
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade w-25 show sticky" role="alert">
                        {{ session()->get('message_fail') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('admin.add_user') }}">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                <h4 style="text-align: center; color:black">Add New User</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card-body text-center">
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <form action="{{ route('admin.add_user') }}" method="post" id="form_add_user">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="name"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" name="name" required>
                                                            <strong><label for=""
                                                                    class="col-form-label mb-1 text-black">Name</label></strong>
                                                        </div>
                                                        <div class="col">
                                                            <input type="email"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" name="email" required>
                                                            <strong><label for="inputPassword"
                                                                    class="col-form-label mb-1 text-black">Email
                                                                    Address</label></strong>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="number"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" name="phone_number"
                                                                required>
                                                            <strong><label for="" class="col-form-label mb-1 text-black">Phone
                                                                    Number</label></strong>
                                                        </div>
                                                        <div class="col">
                                                           <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="gender"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option selected>Choose gender...</option>
                                                              
                                                                    <option value="Male">
                                                                        Male
                                                                    </option>
                                                                    <option value="Female">
                                                                        Female
                                                                    </option>
                                                                    
                                                            </select>
                                                            <strong><label for="inputPassword"
                                                                    class="col-form-label mb-1 text-black">Gender</label></strong>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="password"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" name="password" required>
                                                            <strong><label for="inputPassword"
                                                                    class="col-form-label mb-1 text-black">Password</label></strong>
                                                        </div>
                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="assigned_staff"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option name="id" selected>Choose resort...</option>
                                                                @foreach ($resorts as $resort)
                                                                    <option value="{{ json_encode($resort) }}">
                                                                        {{ $resort->resort_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <strong><label for="to_assigned"
                                                                    class="col-form-label mb-1 text-black">Assign
                                                                    To</label></strong>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" name="address" required>
                                                            <strong><label for="inputPassword"
                                                                    class="col-form-label mb-1 text-black">Address</label></strong>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <button type="submit" class="btn w-50" id="btn_add">Add User</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endauth
@endsection
