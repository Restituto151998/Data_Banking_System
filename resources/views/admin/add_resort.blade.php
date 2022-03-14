@extends('sideNav.side_navbar')

@section('addResort')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                @if (session()->has('message_fail'))
                <div class="alert alert-danger alert-dismissible fade  show" role="alert">
                    {{ session()->get('message_fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div class="row">
                    @if (session('status'))
                        <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                                                        <img id="preview-image-before-upload" src="/assets/img/no_image.png"
                                                            alt="preview image" style="max-height: 250px;">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <input type="file" name="image" placeholder="Choose image"
                                                                    id="image">
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
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <input type="text"
                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                            class="form-control ml-2 text-center" name="resort_name"
                                                            placeholder="Enter resort name" required>
                                                        <strong><label class="col-form-label mb-1 text-black">Resort
                                                                Name</label></strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <textarea name="resort_description"
                                                            style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                            class="form-control ml-2 text-center"
                                                            placeholder="Enter resort description" required></textarea>
                                                        <strong><label class="col-form-label mb-1 text-black">Resort
                                                                Description</label></strong>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col text-center">
                                                                <div class="form-group">
                                                                    <button class="btn w-50" id="btn_add">Add</button>
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
