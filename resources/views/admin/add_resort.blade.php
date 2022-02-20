@extends('admin.side_navbar')

@section('addResort')
    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="m-0">Add Resort</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card card-primary">

                                            <div class="card-body">
                                                <div class="card-header text-center font-weight-bold">
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
                                                                    <input type="file" name="image"
                                                                        placeholder="Choose image" id="image">
                                                                    @error('image')
                                                                        <div class="alert alert-danger mt-1 mb-1">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row mt-5">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        id="formGroupExampleInput" name="resort_name"
                                                                        placeholder="Resort Name">
                                                                    <label for="formGroupExampleInput">Resort Name</label>
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
                                                                    id="submit">Submit</button>
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
    </div>
@endsection
