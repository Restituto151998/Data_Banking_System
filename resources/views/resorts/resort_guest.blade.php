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
                                @if (Auth::user()->type == 'STAFF')
                                    <h4 class="m-0">{{ Auth::user()->resortList->resort_name }} </h4>
                                @endif
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-body">
                                                <div>
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Full Name</th>
                                                                <th scope="col">Gender</th>
                                                                <th scope="col">Address</th>
                                                                <th scope="col">Phone Number</th>
                                                                <th scope="col">Nationality</th>
                                                                <th scope="col">Temparature</th>
                                                                <th scope="col">Time Use</th>
                                                                <th scope="col">Purpose</th>
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
                </div>
            @endif
        </div>
    </div>
@endsection
