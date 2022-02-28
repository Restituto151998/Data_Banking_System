@extends('sideNav.side_navbar')

@section('addUser')

    <div>
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
                                <div class="d-flex justify-content-between">
                            <a class="btn btn-primary " href="{{ route('admin.add_users') }}">+ Add User</a>
                                    <form class="form-inline" action="/add_user/search" method="POST" role="search">
                                        {{ csrf_field() }}
                                        <input class="form-control " type="search" placeholder="Search" name="search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                    
                                </div>
                               
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-body">
                                                <table class="table">

                                                    <thead class="table bg-primary ">
                                                        <tr>
                                                            <th scope="col" class="text-white">Name</th>
                                                            <th scope="col" class="text-white">Email Address</th>
                                                            <th scope="col" class="text-white">Role</th>
                                                            <th scope="col" class="text-white">Password</th>
                                                            <th scope="col" class="text-white">Status</th>
                                                            <th scope="col" class="text-white">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                              
                                        

                                                            @foreach ($users as $user)
                                                                <tr>
                                                                    <td>{{ $user->name }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>{{ $user->type }}</td>
                                                                    <td><input type="text" class="w-100"
                                                                            value="{{ $user->password }}" disabled> </td>
                                                                    <td>
                                                                        @if ($user->status == 'enable')
                                                                            <a href="{{ url('status_update', $user->id) }}"
                                                                                class="btn btn-success btn-sm text-white">enable</a>
                                                                        @else
                                                                            <a href="{{ url('status_update', $user->id) }}"
                                                                                class="btn btn-danger btn-sm text-white">disable</a>
                                                                        @endif
                                                                    <td>
                                                                        <a
                                                                            href="{{ route('admin.add_user_edit', $user->id) }}"><i
                                                                                data-feather="edit"></i> </a>
                                                                    </td>
                                                                </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                        <span class="float-right"> {!! $users->links() !!}</span>
                               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
