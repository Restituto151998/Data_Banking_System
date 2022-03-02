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
                                        <div class="card-body">
                                            {{-- <div class="card-header text-center font-weight-bold">
                                                <h2>Resort List </h2>
                                            </div> --}}
                                            <div class="container">
                                                
                                                <table class="table" style="background-color: white;">
                                                    <thead class="table" style="font-family: 'Righteous'; font-size:24px; text-align:center;">
                                                        <tr>
                                                            <th scope="col" class="text-black" style="background-color: white">Resort Name</th>
                                                            <th scope="col" class="text-black" style="background-color: white">Assigned Staff</th>
                                                            <th scope="col" class="text-black" style="background-color: white">Status</th>
                                                            <th scope="col" class="text-black" style="background-color: white">Action</th>
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
                                                                        href="{{ route('resorts.resort_guest',$resort->resort_id ) }}"><i
                                                                            data-feather="eye"></i> </a>
                                                                </td>
                                                            </tr>
                                                            {{-- MODAL --}}
                                                            <div class="modal fade"
                                                                id="exampleModalCenter{{ $resort->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                                aria-hidden="true">
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
                                                                                    Modal title</h5>
                                                                                <a type="button" href="/resort_list"
                                                                                    aria-label="Close"><span class="w-25"
                                                                                        aria-hidden="true">&times;</span></a>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <input type="text" class="form-control"
                                                                                    id="formGroupExampleInput"
                                                                                    name="resort_id"
                                                                                    value="{{ $resort->id }}" hidden>
                                                                                <div class="row mt-5">
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="formGroupExampleInput"
                                                                                            name="resort_name"
                                                                                            value="{{ $resort->resort_name }}">
                                                                                        <label
                                                                                            for="formGroupExampleInput">Resort
                                                                                            Name</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-5">
                                                                                    <div class="col-md-12">
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="formGroupExampleInput"
                                                                                            name="assigned_staff" 
                                                                                            value="{{ $resort->assigned_staff }}" required>
                                                                                        <label
                                                                                            for="formGroupExampleInput">Assigned
                                                                                            Staff</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mt-5">
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="formGroupExampleInput"
                                                                                            name="status"
                                                                                            value="{{ $resort->status }}">
                                                                                        <label
                                                                                            for="formGroupExampleInput">Status
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
