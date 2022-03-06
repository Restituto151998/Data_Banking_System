@extends('sideNav.side_navbar')

@section('resortList')

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
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    {{ session()->get('message') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12">
                                    {{-- <div class="card card-primary"> --}}
                                    <div class="card-header">
                                    </div>
                                    <h4 style="text-align: center; color:black">Resort List</h4>
                                    <div class="card-body">

                                        {{-- <div class="card-header text-center font-weight-bold">
                                                    <h2>Resort List </h2>
                                                </div> --}}
                                        <!-- Search-->
                                        <div class="container">

                                            <div class="main w-100 justify-align-center">
                                                <form class="d-flex" action="/resort_list/search" method="POST"
                                                    role="search">
                                                    {{ csrf_field() }}
                                                    <div class="input-group ml-4">
                                                        <input type="search" class="border border-success form-control w-75"
                                                            name='search' placeholder="Search">
                                                        <div class="input-group-append mr-4">
                                                            <button class="btn btn-success" type="submit">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                {{-- <div class="input-group">
                                                    <input type="text" class="border border-success form-control"
                                                        placeholder="Search" role="search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="input-group-append">


                                            </div> --}}

                                            {{-- <div class="d-flex justify-content-between">
                                                        <form class="form-inline" action="/resort_list/resort_search" method="POST" role="search">
                                                            {{ csrf_field() }}
                                                            <input class="form-control" style="width: 900px" type="search"
                                                                placeholder="Search" name="search" aria-label="Search">
                                                            &emsp; <button class="btn btn-outline-success my-2 my-sm-0"
                                                                type="submit">Search</button>
                                                        </form>
                                                    </div> --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-header">
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <table class="table">
                                                            <thead class="table" style="background-color: #21791A; text-align:center">
                                                                <tr>
                                                                    <th scope="col" class="text-white">
                                                                        Resort Name</th>
                                                                    <th scope="col" class="text-white">
                                                                        Assigned Staff</th>
                                                                    <th scope="col" class="text-white">
                                                                        Status</th>
                                                                    <th scope="col" class="text-white">
                                                                        Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($resort_lists as $resort)
                                                                    <tr>
                                                                        <td>{{ $resort->resort_name }}</td>
                                                                        <td>{{ $resort->assigned_staff }}</td>
                                                                        {{-- <td>{{ $resort->status }}</td> --}}
                                                                        <td>
                                                                            @if ($resort->status == 'open')
                                                                                <a href="{{ url('resorts_status_update', $resort->id) }}"
                                                                                    class="btn btn-success btn-sm text-white">Open</a>
                                                                            @else
                                                                                <a href="{{ url('resorts_status_update', $resort->id) }}"
                                                                                    class="btn btn-danger btn-sm text-white">Closed</a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{ route('admin.resort_list', $resort->id) }}"
                                                                                data-toggle="modal"
                                                                                data-target="#exampleModalCenter{{ $resort->id }}"><i
                                                                                    data-feather="edit"></i> </a> | <a
                                                                                href="{{ route('resorts.resort_guest', $resort->resort_id) }}"><i
                                                                                    data-feather="eye"></i> </a>
                                                                        </td>
                                                                    </tr>
                                                                    {{-- MODAL --}}
                                                                    <div class="modal fade" id="exampleModalCenter{{ $resort->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <form method="post"
                                                                            action="{{ route('admin.resort_list') }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-dialog modal-dialog-centered"
                                                                                role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalCenterTitle">
                                                                                            Edit Resort</h5>
                                                                                        <a type="button" href="/resort_list"
                                                                                            aria-label="Close"><span class="w-25 h4"
                                                                                                aria-hidden="true">&times;</span></a>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <input type="text" class="form-control" 
                                                                                            id="formGroupExampleInput" name="resort_id"
                                                                                            value="{{ $resort->id }}" hidden>
                                                                                        <div class="row mt-5">
                                                                                            <div class="col text-center">
                                                                                                <input type="text" class="form-control text-center"
                                                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                                                    id="formGroupExampleInput"
                                                                                                    name="resort_name"
                                                                                                    value="{{ $resort->resort_name }}">
                                                                                                <label
                                                                                                    for="formGroupExampleInput">Resort
                                                                                                    Name</label>
                                                                                            </div>
                                                                                            {{-- </div> --}}
                                                                                            {{-- <div class="row mt-5"> --}}
                                                                                            <div class="col text-center">
                                                                                                <input type="text" class="form-control text-center"
                                                                                                    style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                                                    id="formGroupExampleInput"
                                                                                                    name="assigned_staff"
                                                                                                    value="{{ $resort->assigned_staff }}"
                                                                                                    required>
                                                                                                <label
                                                                                                    for="formGroupExampleInput">Assigned
                                                                                                    Staff</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-4">
                                                                                            <div class="col text-center">
                                                                                                <input type="text" class="form-control text-center"
                                                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                                                    id="formGroupExampleInput"
                                                                                                    name="status"
                                                                                                    value="{{ $resort->status }}">
                                                                                                <label
                                                                                                    for="formGroupExampleInput">Status
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer-center mb-5">
                                                                                        <div class="row">
                                                                                            <div class="col text-center">
                                                                                                {{-- <button type="submit"
                                                                                                    class="btn btn-primary">Save
                                                                                                    changes</button> --}}
                                                                                                    <button type="submit" class="btn text-white" style="background-color:  #21791A">Save
                                                                                                        changes</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <span class="float-right"> {!! $resort_lists->links() !!}</span>
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
    </div>
    </div>
@endsection
