@extends('sideNav.side_navbar')

@section('addResort')
    @include('sweetalert::alert')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
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
                                                        <img id="preview-image-before-upload" src="/assets/img/resort_no_image.png"
                                                            alt="preview image" class="rounded" style="height: 400px; width:450px;">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="file" name="image" placeholder="Choose image"
                                                                    id="image" data-toggle="tooltip" data-placement="bottom"
                                                                    title="Choose Image">
                                                                @error('image')
                                                                    <div class="alert alert-danger mt-4">
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
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <input type="text"
                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                            class="form-control ml-2 text-center" name="resort_name"
                                                            placeholder="Enter resort name" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center mt-5">
                                                        <textarea name="resort_description"
                                                            style="min-height:200px;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                            class="form-control ml-2" placeholder="Enter resort description"
                                                            required></textarea>
                                                    </div>
                                                    <div>
                                                        <div class="row mt-3">
                                                            <div class="col text-center">
                                                                <div class="form-group">
                                                                    <button class="btn w-50 text-white" id="btn_add"
                                                                        style="background-color:  #21791A">Add Resort</button>
                                                                </div>
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
            </div>
        </div>
    @endauth
@endsection
