@extends('sideNav.resort_nav')

@section('editResortlist')
    @include('sweetalert::alert')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('admin.resort_list') }}">
                                <i data-feather="arrow-left"></i>
                            </a>
                            <h4 style="text-align: center; color:black">Edit Resort</h4>
                            <form method="post" action="{{ route('admin.resort_list') }} " enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mt-5">
                                    <input type="id" class="form-control" name="id" value="{{ $resort->resort_id }}" hidden>
                                    <input type="id" class="form-control" name="u_id" value="{{ $resort->user_id }}" hidden>
                                    <input type="id" class="form-control" name="staff" value="{{ $resort->assigned_staff }}"
                                        hidden>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <img id="preview-imageMain" class="rounded mb-1"
                                                        src="{{ $resorts->imagePath ?? asset('/assets/img/no_image.png') }}"
                                                        alt="preview image" style="width:400px; height: 400px;">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <input type="file" name="imageMain" placeholder="Choose image"
                                                                id="imageMain" data-toggle="tooltip" data-placement="bottom"
                                                                title="Choose Image">
                                                            @error('imageMain')
                                                                <div class="alert alert-danger mt-1 mb-1">
                                                                    {{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mb-3">
                                            <div class="col text-center">
                                                <input type="name" id="resort_name"
                                                    style="font-size:20px; background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                    class="form-control text-center" name="resort_name"
                                                    value="{{ $resort->resort_name }}" required>
                                                <strong><label for="name" class="col-form-label mb-1 text-black">Resort
                                                        Name</label></strong>
                                            </div>
                                            <div class="col text-center">
                                                <select class="custom-select text-center" id="inputGroupSelect01" name="user_id"
                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">
                                                    <option selected value="{{ $resort->user_id }}" hidden>
                                                        {{ $resort->assigned_staff }}</option>
                                                    @foreach ($users as $user)
                                                        @if ($user->type == 'STAFF' && $user->status == 'enable')
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach


                                                    <option value="1">
                                                        No assigned staff
                                                    </option>

                                                </select>

                                                <strong><label for="name" class="col-form-label mb-1 text-black">Assigned
                                                        Staff</label></strong>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <textarea name="resort_description" id="resort_description"
                                                    style="min-height:200px;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                    class="change form-control ml-2" placeholder="Enter resort description"
                                                    required>{{ $resorts->resort_description }}</textarea>
                                                <strong><label for="name" class="col-form-label mb-1 text-black">Resort
                                                        Description</label></strong>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col">
                                                <button type="submit" class="btn w-50 text-white " id="btn-edit"
                                                    style="background-color: #21791A;" disabled>Save
                                                    changes</button>
                                            </div>
                                        </div>
                                        <div class="col d-flex mt-3">
                                            <a type="button"
                                                href="{{ route('admin.resort_list_edit.add', ['id' => $resort->id]) }}"
                                                id="btn-edit" class="btn w-50 text-white" style="background-color:  #21791A"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $resort->id }}">
                                                Add Image
                                            </a>
                                            <a type="button" id="btn-edit" class="btn w-50 text-white ml-5"
                                                style=" background-image: linear-gradient(to right, rgba(0, 128, 0), rgba(255,0,0,1));"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-delete{{ $resort->id }}">
                                                Edit & Delete Image
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- addImage --}}
                            <div class="modal fade" id="exampleModal{{ $resort->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('admin.resort_list_edit.add', $resort->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="text" value="{{ $resort->id }}" hidden>
                                                <div class="row text-center p-5">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <img id="preview-image" class="rounded"
                                                                src="{{ asset('/assets/img/resort_no_image.png') }}"
                                                                alt="preview image" style="width:350px; height: 300px;">
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
                                                    <div class="col">
                                                        <input type="text" name="title"
                                                            style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                            class="form-control ml-2 text-center"
                                                            placeholder="Enter image title" required>
                                                        <strong><label for="title"
                                                                class="col-form-label mb-4 text-black">Title</label></strong>
                                                        <textarea name="image_description"
                                                            style="min-height:250px;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                            class="form-control ml-2" placeholder="Enter resort description"
                                                            required></textarea>
                                                        <strong><label for="name" class="col-form-label mb-1 text-black">Image
                                                                Description</label></strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center mb-5">
                                                        <button type="submit" class="btn text-white w-50"
                                                            style="background-color:  #21791A">Add
                                                            Image</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- //edit & delete --}}
                            <div class="modal fade" id="exampleModal-delete{{ $resort->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit & Delete </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body pl-5 pr-5">
                                            @foreach ($images as $image)
                                                <form method="post"
                                                    action="{{ url('resort_list/resort_list_edit/updateSubImage', $image->id) }} "
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($image->resort_id == $resort->id)
                                                        <div class="row mt-5 text-center">
                                                            <div class="col ">
                                                                <div class="form-group">
                                                                    <img id="preview-image"
                                                                        src="{{ $image->image ?? asset('/assets/img/no_image.png') }}"
                                                                        alt="preview image" style="width:90px; height: 60px;">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="title" value="{{ $image->title }}"
                                                                    style="font-size:20px; background-color:transparent;border-left-color:transparent; border-bottom-color:green;border-right-color:transparent;border-top-color:transparent"
                                                                    class="form-control ml-2 text-center" required>
                                                                <strong><label for="title"
                                                                        class="col-form-label mb-1 text-black">Title</label></strong>
                                                            </div>
                                                            <div class="col">
                                                                <textarea name="description"
                                                                    style="min-width:120%;background-color:white;border-left-color:green; border-bottom-color:green;border-right-color:green;border-top-color:green"
                                                                    class="form-control ml-2"
                                                                    placeholder="Enter resort description"
                                                                    required>{{ $image->image_description }}</textarea>
                                                                <strong><label for="name"
                                                                        class="col-form-label mb-1 text-black">Image
                                                                        Description</label></strong>
                                                            </div>
                                                            <div class="col mt-4">
                                                                <button type="submit" class="btn ml-5" style="color:#21791A;"
                                                                    data-toggle="tooltip" data-placement="bottom"
                                                                    title="save changes"><i data-feather="check"></i></button>
                                                                <span class="mr-2">|</span>
                                                                <a
                                                                    href="{{ url('resort_list/resort_list_edit/delete-image', $image->id) }}">
                                                                    <i data-feather="trash" style="color: red;"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="Delete {{ $image->title }}"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </form>
                                            @endforeach
                                            @if ($images->count() == 0)
                                                <div class="text-center" id="no_data">
                                                    <img src="{{ asset('assets/img/no_datas.PNG') }}" alt="" srcset=""><br>
                                                    <p>No Image.</p>
                                                </div>
                                            @endif
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
