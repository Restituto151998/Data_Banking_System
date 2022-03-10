@extends('sideNav.resort_nav')

@section('voda')
    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            @if (isset($details))
                <a href="{{ route('resorts.resort_guest', $details->resort_id) }}" class="print float-right ">print<i
                        data-feather="printer"></i></a>
                <div class="row">
                    <div class="co-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('admin.resort_list') }}">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                @if (Auth::user()->type == 'STAFF')
                                    <h4 class="m-0">{{ Auth::user()->resortList->resort_name }} </h4>
                                @endif
                                <div class="row mt-4">
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
                                                    <tbody>
                                                        @foreach ($guests as $guest)
                                                            <tr>
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
                                            </div>
                                            <span class="float-right">{!! $guests->links() !!}</span>
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
