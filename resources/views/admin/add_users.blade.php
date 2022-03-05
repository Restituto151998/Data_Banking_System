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
                                {{-- <div class="pull-right"> --}}
                                    <a href="{{ route('admin.add_user') }}"> 
                                        <i data-feather="arrow-left"></i>
                                </a>
                                {{-- </div> --}}
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card-body text-center">
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

                                                        <div class="col text-center">

                                                            {{-- <div class="col-sm-10"> --}}
                                                            <input type="name"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2" name="name" required>

                                                            <label for="" class="col-form-label mb-1">Name:</label>
                                                            {{-- </div> --}}
                                                        </div>
                                                        <div class="col text-center">

                                                            <input type="email"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2" name="email" required>

                                                            <label for="inputPassword"
                                                                class="col-form-label mb-1">Email:</label>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="mb-3 row">
                                                                <label for="inputPassword"
                                                                    class="col-sm-2 col-form-label">Email:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control" name="email"
                                                                        required>
                                                                </div>
                                                            </div> --}}
                                                    <div class="row">
                                                        <div class="col text-center">

                                                            <select class="custom-select" id="inputGroupSelect01"
                                                                name="assigned_staff"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white">


                                                                <option name="id" selected>Choose resort...</option>
                                                                @foreach ($resorts as $resort)
                                                                    <option value="{{ json_encode($resort) }}">

                                                                        {{ $resort->resort_name }}

                                                                    </option>
                                                                @endforeach

                                                            </select>

                                                            <label for="to_assigned" class="col-form-label mb-1">Assign
                                                                To:</label>
                                                        </div>
                                                        <div class="col text-center">
                                                            <input type="password"
                                                                style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white"
                                                                class="form-control ml-2" name="password" required>
                                                            <label for="inputPassword"
                                                                class="col-form-label mb-1">Password:</label>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-3 row">
                                                                <label for="to_assigned"
                                                                    class="col-sm-2 col-form-label">Assign To:</label>
                                                                <div class="col-sm-10">

                                                                    <select class="custom-select" id="inputGroupSelect01"

                                                                    name="assigned_staff" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" >
                                                               


                                                                        <option name="id"  selected>Choose resort...</option>
                                                                     
                                                                        @foreach ($resorts as $resort)
                                                                       
                                                                            <option value="{{ json_encode($resort) }}">
                                                                              
                                                                                {{ $resort->resort_name }}

                                                                            </option>
                                              
                                                                        @endforeach

                                                                    </select>


                                                                </div>
                                                            </div> --}}
                                                    {{-- <div class="mb-3 row">
                                                                <label for="inputPassword"
                                                                    class="col-sm-2 col-form-label">Password:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" style="background-color:white;border-left-color:white; border-bottom-color:green;border-right-color:white;border-top-color:white" class="form-control"
                                                                        name="password" required>
                                                                </div>
                                                            </div> --}}

                                                    <div class="col-md-12 mt-4">
                                                        <button type="submit"
                                                            class="btn btn-outline-primary text-primary w-25">Add User</button>
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
