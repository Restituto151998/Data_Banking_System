@extends('sideNav.side_navbar')

@section('addResort')
    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                {{-- <div class="pull-right">
                    <a class="btn btn-danger text-white" href="{{ route('admin.add_user') }}"> Back</a>
                </div> --}}
                @if (session()->has('message_fail'))
                    <div class="alert alert-danger alert-dismissible fade  show" role="alert">
                        {{ session()->get('message_fail') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="pull-right">
                                    <a class="btn btn-danger text-white" href="{{ route('admin.add_user') }}"> Back</a>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                            <div class="card-body">
                                                <h4 style="text-align: center; color:black">Add User</h4>
                                                @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <form action="{{ route('admin.add_user') }}" method="post"
                                                        id="form_add_user">
                                                        @csrf

                                                        <div class="row">

                                                            <div class="mb-3 row">
                                                                <label for="" class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="name" class="form-control" name="name"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="inputPassword"
                                                                    class="col-sm-2 col-form-label">Email:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control" name="email"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="to_assigned"
                                                                    class="col-sm-2 col-form-label">Assign To:</label>
                                                                <div class="col-sm-10">

                                                                    <select class="custom-select" id="inputGroupSelect01"
                                                                    name="assigned_staff" >
                                                               

                                                                        <option name="id"  selected>Choose resort...</option>
                                                                        @foreach ($resorts as $resort)
                                                                       
                                                                            <option value="{{ json_encode($resort) }}">
                                                                              
                                                                                {{ $resort->resort_name }}

                                                                            </option>
                                              
                                                                        @endforeach

                                                                    </select>


                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="inputPassword"
                                                                    class="col-sm-2 col-form-label">Password:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" class="form-control"
                                                                        name="password" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-5">
                                                                <button type="submit"
                                                                    class="btn text-white" style="background-color: green">Add User</button>
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
