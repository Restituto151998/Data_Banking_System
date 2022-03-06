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
                                                        <input type="name" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control" name="name"
                                                        value="{{ $user->name }}">
                                                        <label for="name" class="col-form-label mb-1">Name</label>
                                                    </div>
                                                    <div class="col text-center">

                                                        <input type="email" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control" name="email"
                                                        value="{{ $user->email }}">
                                                        <label for="email" class="col-form-label mb-1">Email Address</label>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">

                                                    <div class="col text-center">
                                                        <input type="text" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control" name="password"
                                                        value="{{ $user->password }}" disabled>
                                                        <label for="password" class="col-form-label mb-1">Old Password</label>
                                                    </div>
                                                    <div class="col text-center">

                                                        <input type="password" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control" name="password">
                                                        <label for="password" class="col-form-label mb-1">New Password</label>
                                                    </div>
                                                </div>

                                                
                                                {{-- <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="name" class="form-control" name="name"
                                                        value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $user->email }}">
                                                </div> --}}
                                                {{-- <div class="form-group">
                                                    <label for="password">Old Password</label>
                                                    <input type="text" class="form-control" name="password"
                                                        value="{{ $user->password }}" disabled>
                                                </div>
                                            
                                                  
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div> --}}
                                                <div class="col text-center mt-3">
                                                    <button type="submit" class="btn btn-info w-25">Update Changes</button>
                                                </div>
                                            </form>
                                            
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
