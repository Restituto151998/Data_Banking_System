@extends('sideNav.side_navbar')

@section('profile')
    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    {{ session()->get('status') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col text-center">

                                                <form action="{{ url('/profile') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">

                                                        <img id="preview-profile-image"
                                                            src="{{ asset('storage/images/' . Auth::user()->image) }}"
                                                            alt="preview image" style="width:200px; height: 200px;"
                                                            class="rounded-circle">

                                                        <label for="profile">
                                                            <i data-feather="camera"
                                                                style="margin-left:-50px; margin-top:90px; position: absolute"></i>
                                                        </label>
                                                        <input type="file" name="image" placeholder="Choose image"
                                                            id="profile" hidden>
                                                        @error('image')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror


                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn  text-center text-white" style="background-color:  #21791A"
                                                            id="change_profile" disabled>Change Profile</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-9">
                                        <h4 style="text-align: center; color:black">Profile Information</h4>
                                        <div class="card-body">
                                            <center>
                                                <div class="row ">
                                                    <div class="form-group col-6 text-center">
                                                        <span
                                                            style="font-size: 20px;color:black">{{ Auth::user()->name }}</span>
                                                        <hr style="color: #21791A">
                                                        <label for="name">Name</label>
                                                    </div>
                                                    <div class="form-group col-6 ">
                                                        <span
                                                            style="font-size: 20px; color:black">{{ Auth::user()->email }}</span>
                                                        <hr style="color: #21791A">
                                                        <label class="small mb-1" for="name">Email Address</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <span
                                                            style="font-size: 15px; color:black">{{ Auth::user()->password }}</span>
                                                        <hr style="color: #21791A">
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group">
                                                        <button class="btn w-50"
                                                            style="background-color:#21791A; color:white">Edit
                                                            Information</button>
                                                    </div>
                                                </div>
                                            </center>
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
