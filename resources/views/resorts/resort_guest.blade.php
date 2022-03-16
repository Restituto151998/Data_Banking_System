@extends('sideNav.resort_nav')

@section('voda')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            @if ($resorts)
                <a href="{{ route('resorts.resort_guest', $resorts->resort_id) }}" class="print float-right ">print<i
                        data-feather="printer"></i></a>
                <div class="row">
                    <div class="co-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                @if (Auth::user()->type == 'ADMIN')
                                    <a href="{{ route('admin.resort_list') }}">
                                        <i data-feather="arrow-left"></i>
                                    </a>
                                @endif
                                @if (Auth::user()->type == 'ADMIN')
                                    <h4 class="mt-3 text-center">{{ $resorts->resort_name }} </h4>
                                @endif
                                <input type="search" id="myInput" class="form-control mt-4 border border-success"
                                    placeholder="Search" aria-label="Search">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <div>
                                                <table class="table">
                                                    <thead class="table"
                                                        style="background-color: #21791A; text-align:center">
                                                        <tr>
                                                            <th scope="col" class="text-white">Full Name</th>
                                                            <th scope="col" class="text-white">Gender</th>
                                                            <th scope="col" class="text-white">Address</th>
                                                            <th scope="col" class="text-white">Phone Number</th>
                                                            <th scope="col" class="text-white">Nationality</th>
                                                            <th scope="col" class="text-white">Temparature</th>
                                                            <th scope="col" class="text-white">Time Use</th>
                                                            <th scope="col" class="text-white">Purpose</th>
                                                            <th scope="col" class="text-white">Status</th>
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
                                                                <td>
                                                                    @if (Auth::user()->type == 'ADMIN')
                                                                        @if ($guest->status == 'pending')
                                                                            <button
                                                                                class="btn btn-warning  text-white btn-sm"
                                                                                type="button">
                                                                                {{ $guest->status }}
                                                                            </button>
                                                                        @endif
                                                                        @if ($guest->status == 'accepted')
                                                                            <button
                                                                                class="btn btn-success text-white btn-sm"
                                                                                type="button">
                                                                                {{ $guest->status }}
                                                                            </button>
                                                                        @endif
                                                                        @if ($guest->status == 'cancelled')
                                                                            <button class="btn btn-danger text-white btn-sm"
                                                                                type="button" >
                                                                                {{ $guest->status }}
                                                                            </button>
                                                                        @endif
                                                                        @if ($guest->status == 'left')
                                                                            <button
                                                                                class="btn btn-secondary text-white btn-sm"
                                                                                type="button">
                                                                                {{ $guest->status }}
                                                                            </button>
                                                                        @endif
                                                                    @endif
                                                                    @if (Auth::user()->type == 'STAFF')
                                                                        @if ($guest->status == 'left')
                                                                            <button class="btn btn-secondary btn-sm"
                                                                                type="button">
                                                                                {{ $guest->status }}
                                                                            </button>
                                                                        @endif
                                                                        <div class="btn-group">
                                                                            @if ($guest->status == 'pending')
                                                                                <button
                                                                                    class="btn btn-warning btn-sm btn-lg dropdown-toggle"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    {{ $guest->status }}
                                                                                </button>
                                                                            @endif
                                                                            @if ($guest->status == 'accepted')
                                                                                <button
                                                                                    class="btn btn-success btn-sm btn-lg dropdown-toggle"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                    {{ $guest->status }}
                                                                                </button>
                                                                            @endif
                                                                            @if ($guest->status == 'cancelled')
                                                                                <button
                                                                                    class="btn btn-danger btn-sm btn-lg dropdown-toggle"
                                                                                    type="button" data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
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
                                                    <img src="{{ asset('assets/img/no_data.PNG') }}" alt=""
                                                        srcset=""><br>
                                                    <p>No results found.</p>
                                                </div>
                                                @empty($guest)
                                                    <div class="text-center">
                                                        <img src="../../assets/img/no_datas.PNG" alt="" srcset=""><br>
                                                        <p>No Data</p>
                                                    </div>
                                                @endempty
                                            </div>
                                            {{-- <span class="float-right">{!! $guests->links() !!}</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
