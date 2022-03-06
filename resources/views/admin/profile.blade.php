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

                                                        @if (Auth::user()->image)
                                                            <img id="preview-profile-image"
                                                                src="{{ asset('storage/images/' . Auth::user()->image) }}"
                                                                alt="preview image" style="width:200px; height: 200px;"
                                                                class="rounded-circle">
                                                        @endif

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
                                                        <button type="submit" class="btn  text-center text-white"
                                                            style="background-color:  #21791A" id="change_profile"
                                                            disabled>Change Profile</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-9">
                                        <h4 style="text-align: center; color:black">Profile Information</h4>
                                        <div class="card-body">
                                            {{-- <center> --}}
                                                <div class="row ">
                                                    <div class="form-group col-6 text-center text-black">
                                                        <span
                                                            style="font-size: 20px;color:black">{{ Auth::user()->name }}</span>
                                                        <hr style="color: #21791A">
                                                        <strong><label for="name">Name</label></strong>
                                                    </div>
                                                    <div class="form-group col-6 text-center text-black">
                                                        <span
                                                            style="font-size: 20px; color:black">{{ Auth::user()->email }}</span>
                                                        <hr style="color: #21791A">
                                                        <strong><label for="name">Email Address</label></strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group text-center text-black">
                                                        <span
                                                            style="font-size: 15px; color:black">{{ Auth::user()->password }}</span>
                                                        <hr style="color: #21791A">
                                                        <strong><label for="password">Password</label><strong>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <a type="button"
                                                        href="{{ route('admin.profile.test', ['id' => Auth::user()->id]) }}"
                                                        class="btn w-5 text-center text-white"
                                                        style="background-color:  #21791A" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ Auth::user()->id }}">
                                                        Edit Informations
                                                    </a>
                                                    </div>
                                                </div>
                                        
                                                {{-- MODAL --}}
                                                <div class="modal fade" id="exampleModal{{ Auth::user()->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Information</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post"
                                                                    action="{{ route('admin.profile') }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                    <input type="text" value="{{ Auth::user()->id }}"
                                                                    hidden>
                                                                    <div class="col text-center">
                                                                        <input type="text" value="{{ Auth::user()->name }}"
                                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                            class="form-control ml-2 text-center" name="name" required>
                                                                        <label class="col-form-label mb-1">Name:</label>
                                                                    </div>
                                                                    <div class="col text-center">
                                                                        <input type="text" value="{{ Auth::user()->email}}"
                                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                            class="form-control ml-2 text-center" name="email" required>
                                                                        <label class="col-form-label mb-1">Email:</label>
                                                                    </div>
                                                                    <div calss="row">
                                                                        <div class="col text-center">
                                                                            <input type="password" value="{{ Auth::user()->password}}"
                                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                                class="form-control ml-2 text-center" name="password" required>
                                                                            <label class="col-form-label mb-1">Password:</label>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col text-center">
                                                                    <div class="modal-footer-center">
                                                                        <button type="submit" class="btn text-white" style="background-color:  #21791A">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- </center> --}}
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
