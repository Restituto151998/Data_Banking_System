@extends('sideNav.side_navbar')

@section('addResort')
        <div>
            <div class="main-wrapper main-wrapper-1">
                <!-- Main Content -->
                <div class="main-content" >
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" id="add_resort"
                                    action="{{ url('add_resort') }}">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-5">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <div class="form-group">
                                                        <img id="preview-image-before-upload"
                                                        src="/assets/img/no_image.png" alt="preview image"
                                                        style="max-height: 250px;">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="file" name="image" placeholder="Choose image" 
                                                                    id="image" >
                                                                @error('image')
                                                                    <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                                    <h4 style="text-align: center; color:black">Add Resort</h4>
                                                    <div class="card-body">
                                                    </div>
                                                    @if (session('status'))
                                                        <div class="alert alert-success">
                                                            {{ session('status') }}
                                                        </div>
                                                        @endif
                                                <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="resortName">Resort Name:</label>
                                                            <input type="name" class="form-control" name="resort_name" placeholder="Enter resort name" required>
                                                           
                                                          </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Description:</label>
                                                                <textarea name="resort_description" class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="3" placeholder="Enter resort description" required></textarea>
                                                                   
                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div class="form-group">
                                                                <button class="btn w-25"
                                                                style="background-color:#21791A; color:white">Add</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                        {{-- dfgfdgdfgfd --}}
@endsection
