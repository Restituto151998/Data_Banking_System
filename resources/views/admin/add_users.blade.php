@extends('sideNav.side_navbar')

@section('addResort')
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
                                <h4 style="text-align: center; color:black">Add New User</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card-body text-center">
                                            <form action="{{ route('admin.add_user') }}" method="post" id="form_add_user">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="name"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Full Name"
                                                                value="{{ old('name') }}" name="name" required>
                                                        </div>
                                                        <div class="col">
                                                            <input type="username"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Username"
                                                                name="username" value="{{ old('username') }}"
                                                                autocomplete="username" required>
                                                                    @error('username')
                                                                <span class="text-danger">
                                                                    <strong>This username already exist!</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="number"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Phone Number"
                                                                name="phone_number" value="{{ old('phone_number') }}"
                                                                required>
                                                            @error('phone_number')
                                                                <span class="text-danger">
                                                                    <strong>Invalid phone number!</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="gender"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                <option value="{{ old('gender') }}" selected>
                                                                    @if (empty(old('gender')))
                                                                       Select gender...
                                                                    @else
                                                                        {{ old('gender') }}
                                                                    @endif
                                                                </option>
                                                                <option value="Male">
                                                                    Male
                                                                </option>
                                                                <option value="Female">
                                                                    Female
                                                                </option>
                                                            </select>
                                                            @error('gender')
                                                                <span class="text-danger">
                                                                    <strong>Please select gender!</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="password"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Password"
                                                                name="password" value="{{ old('password') }}"
                                                                autocomplete="password" required>
                                                            @error('password')
                                                                <span class="text-danger">
                                                                    <strong>Password minimum 8 characters!</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="col">
                                                            <select class="custom-select text-center" id="inputGroupSelect01"
                                                                name="assigned_staff"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                     <option  name="id" value="{{ old('assigned_staff') }}" selected>
                                                                    @if (empty(old('assigned_staff')))
                                                                       Assign to...
                                                                    @else
                                                                        {{ old('assigned_staff') }}
                                                                    @endif
                                                                </option>
                                                                @foreach ($resorts as $resort)
                                                                    <option value="{{ json_encode($resort) }}">
                                                                        {{ $resort->resort_name }}
                                                                    </option>
                                                                @endforeach
                                                                <option value="Not applicable to assign">
                                                                    Not applicable to assign
                                                                </option>
                                                            </select>
                                                            @error('assigned_staff')
                                                                <span class="text-danger">
                                                                    <strong>Please select a resort!</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <input type="text"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2 text-center" placeholder="Address"
                                                                name="address" value="{{ old('address') }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button type="submit" class="btn text-white w-50"
                                                        style="background-color:  #21791A">Add User</button>
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
    @endauth
@endsection
