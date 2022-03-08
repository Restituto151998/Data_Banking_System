@extends('sideNav.side_navbar')

@section('addUser')
    @auth
        <div class="main-wrapper main-wrapper-1">
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
                                <div class="row">
                                    <h4 style="text-align: center; color:black">Data Banking System Users</h4>
                                    <div class="container">
                                        <div class="main justify-align-center">
                                            <form class="d-flex mt-4" action="/add_user/search" method="POST" role="search">
                                                {{ csrf_field() }}
                                                <div class="input-group w-100 ml-4">
                                                    <input type="search" class="form-control border border-success"
                                                        name='search' placeholder="Search" aria-label="Search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success mr-5" type="submit">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                    <div class="row mr-3">
                                                        <div class="col">
                                                            <span class="float-right"> {!! $users->links() !!}</span>
                                                            <a class="btn p-2" style="background-color:#21791A; color:white"
                                                                href="{{ route('admin.add_users') }}">+ Add New User</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body text-center">
                                                    <table class="table">
                                                        <thead class="table"
                                                            style="background-color: #21791A; text-align:center">
                                                            <tr>
                                                                <th scope="col" class="text-white">Name</th>
                                                                <th scope="col" class="text-white">Email Address</th>
                                                                <th scope="col" class="text-white">Phone Number</th>
                                                                <th scope="col" class="text-white">Gender</th>
                                                                <th scope="col" class="text-white">Address</th>
                                                                <th scope="col" class="text-white">Role</th>
                                                                <th scope="col" class="text-white">Status</th>
                                                                <th scope="col" class="text-white">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($users))
                                                                @forelse ($users as $user)
                                                                    @if (Auth::user()->type != $user->type)
                                                                        <tr>
                                                                            <td>{{ $user->name }}</td>
                                                                            <td>{{ $user->email }}</td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td>{{ $user->gender }}</td>
                                                                            <td>{{ $user->address }}</td>
                                                                            <td>{{ $user->type }}</td>
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
                                                                                        data-feather="edit"></i>
                                                                                </a>
                                                                            </td>
                                                                    @endif
                                                                @empty
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><img
                                                                            src="../../assets/img/no_data.PNG" alt=""
                                                                            srcset=""><br>
                                                                        <p>No results found.</p>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    </tr>
                                                                @endforelse
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    <span class="float-right"> {!! $users->links() !!}</span>
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
    @endauth
@endsection
