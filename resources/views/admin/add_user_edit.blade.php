@extends('sideNav.resort_nav')

@section('editUser')

    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
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
                                                <input type="id" class="form-control" name="id" value="{{ $user->id }}"
                                                    hidden>
                                                <div class="row mb-3">
                                                    <div class="col text-center">
                                                        <input type="name" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control text-center" name="name"
                                                        value="{{ $user->name }}">
                                                        <strong><label for="name" class="col-form-label mb-1 text-black">Name:</label></strong>
                                                    </div>
                                                    <div class="col text-center">

                                                        <input type="email" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control text-center" name="email"
                                                        value="{{ $user->email }}">
                                                        <strong><label for="email" class="col-form-label mb-1 text-black">Email Address:</label></strong>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">

                                                    <div class="col text-center">
                                                        <input type="text" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control text-center" name="password"
                                                        value="{{ $user->password }}" disabled>
                                                        <strong><label for="password" class="col-form-label mb-1 text-black">Old Password:</label></strong>
                                                    </div>
                                                    <div class="col text-center">

                                                        <input type="password" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control text-center" name="password">
                                                        <strong><label for="password" class="col-form-label mb-1 text-black">New Password</label></strong>
                                                    </div>
                                                </div>
                                                <div class="col text-center mt-3">
                                                    <button type="submit" class="btn text-white" style="background-color:  #21791A">Save
                                                        changes</button>
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
    @endsection
