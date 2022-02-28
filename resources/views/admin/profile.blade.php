@extends('sideNav.side_navbar')

@section('profile')
    <<div>
        <div class="main-wrapper main-wrapper-1"> -->
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="form-group">

                                                    <img id="preview-profile-image" src="/assets/img/default_profile.jpg"
                                                        alt="preview image" style="width:200px; height: 200px;"
                                                        class="rounded-circle">

                                                    <label for="profile">
                                                        <i data-feather="camera"
                                                            style="margin-left:-50px; margin-top:90px; position: absolute"></i>
                                                    </label>
                                                    <input type="file" name="image" placeholder="Choose image" id="profile"
                                                        hidden>
                                                    @error('image')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                    @enderror


                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-primary text-center" id="change_profile" disabled>Change Profile</button>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4>Profile Info</h4>
                                            </div>
                                            <div class="card-body">
                                                <center>
                                                <div class="row ">
                                                    <div class="form-group col-6 text-center">
                                                   
                                                    <span style="font-size: 30px">{{ Auth::user()->name }}</span><hr>
                                                            <label for="name">Name</label>

                                                    </div>
                                                    <div class="form-group col-6 ">
                                                  
                                                        <span style="font-size: 30px">{{ Auth::user()->email }}</span><hr>
                                                    
                                                            <label for="name">Email Address</label>

                                                    </div>
                                                </div>
                                                <div class="row ">
                                          
                                                    <div class="form-group">
                                                      
                                                        <span style="font-size: 15px">{{ Auth::user()->password }}</span><hr>
                                                          
                                                            <label for="password">Password</label>
                                                    </div>
                                               
                                                </div>
                                                <div class="row ">
                                          
                                                    <div class="form-group">
                                                      
                                                        <button class="btn btn-primary w-50">Edit Info</button>
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
        </div> 
    @endsection
