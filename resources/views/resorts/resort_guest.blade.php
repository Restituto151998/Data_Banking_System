@extends('sideNav.resort_nav')

@section('voda')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            @if ($details)
                <a href="{{ route('resorts.resort_guest', $details->resort_id ) }}" class="print float-right ">print<i
                        data-feather="printer"></i></a>
                <div class="row">
                    <div class="co-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <input type="search" id="myInput" class="form-control border border-success"
                                    placeholder="Search" aria-label="Search">
                                <div class="input-group-append">

                                </div>
                                @if (Auth::user()->type == 'ADMIN')
                                    <a href="{{ route('admin.resort_list') }}">
                                        <i data-feather="arrow-left"></i>
                                    </a>
                                @endif

                                <div class="row mt-2">
                                    @if (Auth::user()->type == 'ADMIN')
                                        <h4 class="mt-3 text-center">{{ $details->resort_name }} </h4>
                                    @endif
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
