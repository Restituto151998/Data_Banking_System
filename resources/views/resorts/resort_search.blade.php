@extends('sideNav.resort_nav')

@section('resort_search')
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
            @if (session()->has('message_success'))
                <div class="alert alert-success alert-dismissible fade  show" role="alert">
                    {{ session()->get('message_success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            {{-- <button class="btn btn-primary float-right"  href="/add_users">+ Add User</button> --}}
            <div class="row">

                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">

                            <div class="main w-100 mb-5 justify-align-center">
                                                       
                                <div class="input-group">
                                  
                                  <div class="input-group-append">
                                    <form class="form-inline" action="/resort_list/search" method="POST" role="search">
                                        {{ csrf_field() }}
                                        <input type="search" class="border border-success form-control " name='search' placeholder="Search">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa fa-search"></i>
                                          </button>

                                    </form>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                            <table class="table" style="background-color: white; text-align:center;">
                                                <thead class="table" style="font-size:20px;">
                                                    <tr>
                                                        <th scope="col" class="text-black" style="background-color: white">
                                                            Resort Name</th>
                                                        <th scope="col" class="text-black" style="background-color: white">
                                                            Assigned Staff</th>
                                                        <th scope="col" class="text-black" style="background-color: white">
                                                            Status</th>
                                                        <th scope="col" class="text-black" style="background-color: white">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($resort_lists))
                                                    {{$resort_lists}}
                                                    @foreach ($resort_lists as $r)
                                                        <tr>
                                                            <td>{{ $r->resort_name }}</td>
                                                            <td>{{ $r->assigned_staff }}</td>
                                                            {{-- <td>{{ $resort->status }}</td> --}}
                                                            <td>
                                                                @if ($r->status == 'open')
                                                                    <a href="{{ url('resorts_status_update', $r->id) }}"
                                                                        class="btn btn-success btn-sm text-white">Open</a>
                                                                @else
                                                                    <a href="{{ url('resorts_status_update', $r->id) }}"
                                                                        class="btn btn-danger btn-sm text-white">Closed</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.resort_list', $r->id) }}"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModalCenter{{ $r->id }}"><i
                                                                        data-feather="edit"></i> </a> | <a
                                                                    href="{{ route('resorts.resort_guest', $r->resort_id) }}"><i
                                                                        data-feather="eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                        {{-- MODAL --}}
                                                        <div class="modal fade" id="exampleModalCenter{{ $r->id }}"
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
                                                                                Modal title</h5>
                                                                            <a type="button" href="/resort_list"
                                                                                aria-label="Close"><span class="w-25"
                                                                                    aria-hidden="true">&times;</span></a>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input type="text" class="form-control"
                                                                                id="formGroupExampleInput" name="resort_id"
                                                                                value="{{ $r->id }}" hidden>
                                                                            <div class="row mt-5">
                                                                                <div class="col-md-12">
                                                                                    <input type="text" class="form-control"
                                                                                        id="formGroupExampleInput"
                                                                                        name="resort_name"
                                                                                        value="{{ $r->resort_name }}">
                                                                                    <label
                                                                                        for="formGroupExampleInput">Resort
                                                                                        Name</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-5">
                                                                                <div class="col-md-12">
                                                                                    <input type="name" class="form-control"
                                                                                        id="formGroupExampleInput"
                                                                                        name="assigned_staff"
                                                                                        value="{{ $r->assigned_staff }}"
                                                                                        >
                                                                                    <label
                                                                                        for="formGroupExampleInput">Assigned
                                                                                        Staff</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-5">
                                                                                <div class="col-md-12">
                                                                                    <input type="text" class="form-control"
                                                                                        id="formGroupExampleInput"
                                                                                        name="status"
                                                                                        value="{{ $r->status }}">
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
                                            <span class="float-right"> {!! $resort_lists->links() !!}</span>
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
    </div>
@endsection
