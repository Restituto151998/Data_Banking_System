@extends('sideNav.resort_nav')

@section('voda')
    @include('sweetalert::alert')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="co-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            @if (Auth::user()->type == 'ADMIN')
                                <a href="{{ route('admin.resort_list') }}" id="back">
                                    <i data-feather="arrow-left"></i>
                                </a>
                            @endif
                            <a href="#" onclick="print()" class="print float-right mb-4 ml-3">print<i
                                    data-feather="printer"></i></a>                    
                                <h4 class="mt-3 text-center">{{ $resorts->resort_name }} </h4>
                                <form method="post" enctype="multipart/form-data" id="date" class="pull-right"
                                    action="{{ url('/resort_list/resort_guest', $resorts->id) }}">
                                    @csrf

                                    <input name="id" value="{{ $resorts->id }}" hidden>
                                    @forelse ($dates as $date)
                                        <label>starting date:</label><input type="date" name="from" class="from ml-2 mr-3"
                                            value="{{ $date->from }}">
                                        <label>date end: </label><input type="date" name="to" class="to ml-2"
                                            value="{{ $date->to }}">
                                    @empty
                                        <label>starting date: </label><input type="date" name="from" class="from ml-2 mr-3">
                                        <label>date end: </label><input type="date" name="to" class="to ml-2">

                                    @endforelse
                                    <button type="submit" id="update-btn" class="btn btn-sm ml-3 text-light"
                                        style="background-color: #21791A;" disabled>
                                        update date
                                    </button>
                                </form>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="card-body cont" id="scroll">
                                    <table class="table" id="table">
                                        <thead class="table" style="background-color: #21791A;">
                                            <tr>
                                                <th scope="col" style="border-top-left-radius:10px 10px;"
                                                    class="text-white">Full Name</th>
                                                <th scope="col" class="text-white">Gender</th>
                                                <th scope="col" class="text-white">Address</th>
                                                <th scope="col" class="text-white">Phone Number</th>
                                                <th scope="col" class="text-white">Nationality</th>
                                                <th scope="col" class="text-white">Temparature</th>
                                                <th scope="col" class="text-white">Time Use</th>
                                                <th scope="col" class="text-white">Purpose</th>
                                                <th scope="col" class="text-white">Date Registered</th>
                                                <th scope="col" style="border-top-right-radius:10px 10px;"
                                                    class="sta text-white">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @foreach ($guests as $guest)
                                                <tr class="tr">
                                                    <td>{{ $guest->full_name }}</td>
                                                    <td>{{ $guest->gender }}</td>
                                                    <td>{{ $guest->address }}</td>
                                                    <td>{{ $guest->phone_number }}</td>
                                                    <td>{{ $guest->nationality }}</td>
                                                    <td>{{ $guest->temperature }}</td>
                                                    <td>{{ $guest->time_use }}</td>
                                                    <td>{{ $guest->purpose }}</td>
                                                    <td>{{date('m-d-Y', strtotime($guest->created_at)) }}</td>
                                                    <td class="sta">
                                                        @if (Auth::user()->type == 'ADMIN')
                                                            @if ($guest->status == 'pending')
                                                                <button class="btn btn-warning  text-white btn-sm"
                                                                    type="button">
                                                                    {{ $guest->status }}
                                                                </button>
                                                            @endif
                                                            @if ($guest->status == 'accepted')
                                                                <button class="btn btn-success text-white btn-sm"
                                                                    type="button">
                                                                    {{ $guest->status }}
                                                                </button>
                                                            @endif
                                                            @if ($guest->status == 'cancelled')
                                                                <button class="btn btn-danger text-white btn-sm"
                                                                    type="button">
                                                                    {{ $guest->status }}
                                                                </button>
                                                            @endif
                                                            @if ($guest->status == 'left')
                                                                <button class="btn btn-secondary text-white btn-sm"
                                                                    type="button">
                                                                    {{ $guest->status }}
                                                                </button>
                                                            @endif
                                                        @endif
                                                        @if (Auth::user()->type == 'STAFF')
                                                            @if ($guest->status == 'left')
                                                                <button class="btn btn-secondary btn-sm" type="button">
                                                                    {{ $guest->status }}
                                                                </button>
                                                            @endif
                                                            <div class="btn-group">
                                                                @if ($guest->status == 'pending')
                                                                    <button
                                                                        class="btn btn-warning btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        {{ $guest->status }}
                                                                    </button>
                                                                @endif
                                                                @if ($guest->status == 'accepted')
                                                                    <button
                                                                        class="btn btn-success btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        {{ $guest->status }}
                                                                    </button>
                                                                @endif
                                                                @if ($guest->status == 'cancelled')
                                                                    <button
                                                                        class="btn btn-danger btn-sm btn-lg dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        {{ $guest->status }}
                                                                    </button>
                                                                @endif
                                                                <div class="dropdown-menu text-center">
                                                                    @if ($guest->status == 'pending')
                                                                        <a href="{{ url('status_accept', $guest->id) }}"
                                                                            class="btn btn-success btn-sm text-white">accept</a>
                                                                        <a href="{{ url('status_cancel', $guest->id) }}"
                                                                            class="btn btn-danger btn-sm text-white">cancel</a>
                                                                    @endif
                                                                    @if ($guest->status == 'accepted')
                                                                        <a href="{{ url('status_leave_delete', $guest->id) }}"
                                                                            class="btn btn-secondary btn-sm text-white">leave</a>
                                                                    @endif
                                                                    @if ($guest->status == 'cancelled')
                                                                        <a href="{{ url('status_leave_delete', $guest->id) }}"
                                                                            class="btn btn-danger btn-sm text-white">delete</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="p text-center">
                                        <img src="{{ asset('assets/img/no_data.PNG') }}" alt="" srcset=""><br>
                                        <p>No results found.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
