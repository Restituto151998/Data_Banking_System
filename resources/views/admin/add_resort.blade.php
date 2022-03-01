@extends('sideNav.side_navbar')

@section('addResort')
    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-10">
                                            <div class="card-body">
                                                <div class="add-resort-header">
                                                    <h2>Add Resort</h2>
                                                </div>
                                                @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <form method="post" enctype="multipart/form-data" id="add_resort"
                                                        action="{{ url('add_resort') }}">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                           
                                                            <img id="preview-image-before-upload" src="/assets/img/no_image.png"
                                                            alt="preview image" style="max-height: 250px;">
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="file" name="image"
                                                                        placeholder="Choose image" id="image">
                                                                    @error('image')
                                                                        <div class="alert alert-danger mt-1 mb-1">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mt-5">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Resort Name</label>
                                                                    <input name="resort_name" class="form-control">
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="row mt-5">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Description</label>
                                                                    <textarea name="resort_description" class="form-control"
                                                                        id="exampleFormControlTextarea1"
                                                                        rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-5">
                                                                <button type="submit" class="btn btn-primary"
                                                                    >Submit</button>
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
@endsection
