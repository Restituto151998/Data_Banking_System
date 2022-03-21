@extends('sideNav.side_navbar')

@section('addUser')
    @auth
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                @if (session()->has('status'))
                    <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                        {{ session()->get('status') }} ✔️
                    </div>
                @endif
                @if (session()->has('message_success'))
                    <div id="alert_message" class="alert alert-success  alert-dismissible fade w-25 show sticky" role="alert">
                        {{ session()->get('message_success') }} ✔️
                    </div>
                @endif
                @if (session()->has('message'))
                    <div id="alert_message" class="alert alert-success  alert-dismissible fade w-25 show sticky" role="alert">
                        {{ session()->get('message') }} ✔️
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="container">
                                        <div class="main justify-align-center">
                                            <h4 style="text-align: center; color:black">Users List</h4>
                                            <br>
                                            <div class="input-group mt-2 w-100 ml-4">
                                                <input type="search" id="myInput" class="form-control border border-success"
                                                    placeholder="Search" aria-label="Search">
                                                <div class="input-group-append">
                                                </div>
                                                <div class="row mr-3">
                                                    <div class="col">
                                                      
                                                        <a class="btn p-2 text-white" id="btn_add"
                                                            style="background-color:  #21791A"
                                                            href="{{ route('admin.add_users') }}">+ Add New User</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body text-center cont">
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
                                                        <tbody id="myTable">
                                                            @if (isset($users))
                                                                @foreach ($users as $user)
                                                                    @if (Auth::user()->type != $user->type)
                                                                        <tr class="tr">
                                                                            <td>{{ $user->name }}</td>
                                                                            <td>{{ $user->email }}</td>
                                                                            <td>{{ $user->phone_number }}</td>
                                                                            <td>{{ $user->gender }}</td>
                                                                            <td>{{ $user->address }}</td>
                                                                            <td>{{ $user->type }}</td>
                                                                            <td>
                                                                                @if ($user->status == 'enable')
                                                                                    <a href="{{ url('status_update', $user->id) }}"
                                                                                        class="btn btn-success btn-sm text-white">{{ $user->status }}</a>
                                                                                @else
                                                                                    <a href="{{ url('status_update', $user->id) }}"
                                                                                        class="btn btn-danger btn-sm text-white">{{ $user->status }}</a>
                                                                                @endif
                                                                            <td>
                                                                                <a
                                                                                    href="{{ route('admin.add_user_edit', $user->id) }}"><i
                                                                                        data-feather="edit"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    @if ($user->count() == 1)
                                                        <div class="text-center" id="no_data">
                                                            <img src="{{ asset('assets/img/no_datas.PNG') }}" alt=""
                                                                srcset=""><br>
                                                            <p>No data.</p>
                                                        </div>
                                                    @endif
                                                    <div class="p text-center">
                                                        <img src="{{ asset('assets/img/no_data.PNG') }}" alt=""
                                                            srcset=""><br>
                                                        <p>No results found.</p>
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
                 <span class="float-right"> {!! $users->links() !!}</span>
            </div>
        </div>
    @endauth
@endsection
