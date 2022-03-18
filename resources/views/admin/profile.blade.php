@extends('sideNav.side_navbar')

@section('profile')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                @if (session()->has('status'))
                    <div id="alert_message" class="alert alert-success alert-dismissible fade w-25 show sticky" role="alert">
                        {{ session()->get('status') }}
                    </div>
                @endif
                @if (session()->has('message'))
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        {{ session()->get('message') }}
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
                                                    <div class="form-group mt-5 float-right">
                                                        @if (Auth::user()->image)
                                                            <img id="preview-profile-image"
                                                                src="{{ asset('storage/images/' . Auth::user()->image) }}"
                                                                alt="preview image" style="width:200px; height: 200px;"
                                                                class="rounded-circle">
                                                        @endif
                                                        <div class="row mb-0">
                                                            <div class="col">
                                                                <label for="profile">
                                                                    <i data-feather="camera"
                                                                        style="position:unset; margin-right: -292px;margin-top: -10px;"></i>
                                                                </label>
                                                            </div>
                                                            <div class="col">
                                                                <input type="file" name="image" placeholder="Choose image" id="profile" hidden>
                                                        @error('image')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                {{ $message }}</div>
                                                        @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col text-center">
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn  text-center text-white"
                                                                        style="background-color:  #21791A" id="change_profile"
                                                                        disabled>Change Profile</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h4 style="text-align: center; color:black">Profile Information</h4>
                                        <div class="card-body">
                                            <div class="row mt-2 ">
                                                <div class="col text-center">
                                                    <input type="text" value="{{ Auth::user()->name }}"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Name</label>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="text" value="{{ Auth::user()->email }} "
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Email Address</label>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-center">
                                                    <input type="number" value="{{ Auth::user()->phone_number }}"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Phone Number</label>
                                                </div>
                                                <div class="col text-center">
                                                    <input type="text" value="{{ Auth::user()->gender }}"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Gender</label>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col text-center">
                                                    <input type="text" value="{{ Auth::user()->address }}"
                                                        style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                        class="form-control ml-2 text-center" disabled>
                                                    <label class="col-form-label mb-1 text-black">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2 ">
                                            <div class="col text-center mt-3">
                                                <a type="button"
                                                    href="{{ route('admin.profile.test', ['id' => Auth::user()->id]) }}"
                                                    id="btn-edit"
                                                    class="btn w-50"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ Auth::user()->id }}">
                                                    Edit Informations
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center mt-2 mb-5">
                                                <a class="text-danger" href="{{ route('auth.passwords.changePassword') }}">
                                                    Change password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal{{ Auth::user()->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="{{ route('admin.profile') }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <input type="text" value="{{ Auth::user()->id }}" hidden>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="text" value="{{ Auth::user()->name }}"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="name"
                                                                        placeholder="Profile name" required>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Name</small></label>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <input type="value" value="{{ Auth::user()->email }}"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="email"
                                                                        placeholder="Email address" required>
                                                                    <label class="col-form-label mb-1 text-black"><small>Email
                                                                            Adress</small></label>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="number"
                                                                        value="{{ Auth::user()->phone_number }}"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center"
                                                                        name="phone_number" placeholder="Phone number" required>
                                                                    <label class="col-form-label mb-1 text-black"><small>Phone
                                                                            Number</small> </label>
                                                                </div>
                                                                <div class="col text-center">
                                                                    <select class="custom-select text-center"
                                                                        id="inputGroupSelect01" name="gender"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                                        <option selected>{{ Auth::user()->gender }}</option>
                                                                        @if (Auth::user()->gender == 'Male')
                                                                            <option value="Female">
                                                                                Female
                                                                            </option>
                                                                        @else
                                                                            <option value="Male">
                                                                                Male
                                                                            </option>
                                                                        @endif
                                                                    </select>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Gender</small>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col text-center">
                                                                    <input type="text" value="{{ Auth::user()->address }}"
                                                                        style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                        class="form-control ml-2 text-center" name="address"
                                                                        placeholder="Address" required>
                                                                    <label
                                                                        class="col-form-label mb-1 text-black"><small>Address</small></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col text-center mb-5">
                                                                <button type="submit" class="btn text-white w-50"
                                                                    style="background-color:  #21791A">Save
                                                                    changes</button>
                                                            </div>
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
        </div>
    @endauth
@endsection
