@extends('sideNav.resort_nav')

@section('editUser')
    @include('sweetalert::alert')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
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
                                                    <input type="name" id="name"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="name" value="{{ $user->name }}"
                                                        required>
                                                    <strong><label for="name"
                                                            class="col-form-label mb-1 text-black">Name</label></strong>
                                                </div>
                                                <div class="col text-center">

                                                    <input type="text" id="username"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="username"
                                                        value="{{ $user->username }}" required>
                                                    <strong><label for="username" class="col-form-label mb-1 text-black">
                                                            Username</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col text-center">
                                                    <input type="number" id="phone_number"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="phone_number"
                                                        value="{{ $user->phone_number }}" required>
                                                    <strong><label for="phone" class="col-form-label mb-1 text-black">Phone
                                                            Number</label></strong>
                                                    @error('phone_number')

                                                        <span class="text-danger ml-3">
                                                            <strong>Invalid phone number!</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col text-center">
                                                    <select class="custom-select text-center" id="gender" name="gender"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                        <option selected>{{ $user->gender }}</option>
                                                        @if ($user->gender == 'Male')
                                                            <option value="Female">
                                                                Female
                                                            </option>
                                                        @else
                                                            <option value="Male">
                                                                Male
                                                            </option>
                                                        @endif
                                                    </select>
                                                    <strong><label for="gender" class="col-form-label mb-1 text-black">Gender
                                                        </label></strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center ">
                                                    <input type="address" id="address"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center " name="address"
                                                        value="{{ $user->address }}" required>
                                                    <strong><label for="address"
                                                            class="col-form-label mb-1 text-black">Address</label></strong>
                                                </div>
                                            </div>
                                            <div class="row mb-3" id="change-password" hidden="true">
                                                <div class="col text-center">
                                                    <input type="password"
                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control text-center" name="new_password">
                                                    <strong><label for="password" class="col-form-label mb-1 text-black">New
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
                                                <button type="submit" class="btn w-50 text-white" id="edit"
                                                    style="background-color: #21791A;" disabled>Save
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
