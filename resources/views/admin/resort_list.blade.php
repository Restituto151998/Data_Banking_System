@extends('sideNav.side_navbar')

@section('resortList')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            @if (session()->has('status'))
                <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div id="alert_message" class="alert alert-success alert-dismissible fade  w-25 show sticky" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card-header">
                                    </div>
                                    <h4 style="text-align: center; color:black">Resort List</h4>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="main w-100 mb-5 justify-align-center">
                                                <div class="input-group">
                                                    <input type="search" id="myInput"
                                                        class="border border-success form-control w-75" name='search'
                                                        placeholder="Search">
                                                    <div class="input-group-append">

                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table text-center">
                                                <thead class="table" style="background-color: #21791A; text-align:center">
                                                    <tr>
                                                        <th scope="col" class="text-white">
                                                            Resort Name</th>
                                                        <th scope="col" class="text-white">
                                                            Assigned Staff</th>
                                                        <th scope="col" class="text-white">
                                                            Status</th>
                                                        <th scope="col" class="text-white">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    @foreach ($resort_lists as $resort)
                                                        <tr class="tr">
                                                            <td>{{ $resort->resort_name }}</td>
                                                            <td>{{ $resort->assigned_staff }}</td>
                                                            <td>
                                                                @if ($resort->status == 'open')
                                                                    <a href="{{ url('resorts_status_update', $resort->id) }}"
                                                                        class="btn btn-success btn-sm text-white">Open</a>
                                                                @else
                                                                    <a href="{{ url('resorts_status_update', $resort->id) }}"
                                                                        class="btn btn-danger btn-sm text-white">Closed</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('resorts.resort_guest', $resort->resort_id) }}"><i
                                                                        data-feather="eye"></i> </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                             @if($resort_lists->count() == 0)
                                                    <div class="text-center">
                                                        <img src="{{ asset('assets/img/no_datas.PNG') }}" alt=""
                                                            srcset=""><br>
                                                        <p>No data.</p>
                                                    </div>
                                                    @endif
                                            <div class="p text-center">
                                                <img src="{{ asset('assets/img/no_data.PNG') }}" alt="" srcset=""><br>
                                                <p>No results found.</p>
                                            </div>
                                            <span class="float-right"> {!! $resort_lists->links() !!}</span>
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
