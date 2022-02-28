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
                                <h4 class="m-0">Edit User</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            </div>
                                            <form method="post" action="{{ route('admin.add_user') }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="id" class="form-control" name="id" value="{{ $user->id }}"
                                                    hidden>

                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="name" class="form-control" name="name"
                                                        value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Old Password</label>
                                                    <input type="text" class="form-control" name="password"
                                                        value="{{ $user->password }}" disabled>
                                                </div>
                                            
                                                  
                                                <div class="form-group">
                                                    <label for="password">New Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Changes</button>
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
    @endsection
