@extends('sideNav.resort_nav')

@section('editUser')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                @if (session()->has('error'))
                    <div id="alert_message" class="alert alert-danger alert-dismissible fade  w-25 show sticky" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('admin.add_user') }}">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                <h4 style="text-align: center; color:black">Edit User</h4>
                                <div class="row mt-4">
                                    <div class="col-12 mb-3">
                                        <form method="post" action="{{ route('admin.add_user') }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="id" class="form-control" name="id" value="{{ $user->id }}" hidden>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="name"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="name"
                                                        value="{{ $user->name }}">
                                                    <strong><label for="name"
                                                            class="col-form-label mb-1 text-black">Name</label></strong>
                                                </div>
                                                <div class="col text-center">

                                                    <input type="address"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="email"
                                                        value="{{ $user->email }}">
                                                    <strong><label for="email" class="col-form-label mb-1 text-black">
                                                            Email Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="phone_number"
                                                        value="{{ $user->phone_number }}">
                                                    <strong><label for="phone" class="col-form-label mb-1 text-black">Phone
                                                            Number</label></strong>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="gender"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="gender"
                                                        value="{{ $user->gender }}">
                                                    <strong><label for="gender" class="col-form-label mb-1 text-black">Gender
                                                        </label></strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center ">
                                                    <input type="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center " name="address"
                                                        value="{{ $user->address }}">
                                                    <strong><label for="address"
                                                            class="col-form-label mb-1 text-black">Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3" id="change-password" hidden="true">
                                                <div class="col text-center">
                                                    <input type="password"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="new_password">
                                                    <strong><label for="email" class="col-form-label mb-1 text-black">New
                                                            Password</label></strong>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="password"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="confirm_password">
                                                    <strong><label for="password" class="col-form-label mb-1 text-black">Confirm
                                                            Password</label></strong>
                                                </div>
                                            </div>
                                            <div class="col text-center mt-3">
                                                <button type="submit" class="btn text-white w-50"
                                                    style="background-color:  #21791A">Save
                                                    changes</button>
                                            </div>
                                            <div class="text-center mt-2"> <a href="#" id="btn-password">Change
                                                    password?</a></div>
                                        </form>
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
