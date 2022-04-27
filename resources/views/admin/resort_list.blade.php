@extends('sideNav.side_navbar')

@section('resortList')
    @include('sweetalert::alert')
    <div class="main-wrapper main-wrapper-1">
        <div class="main-content">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="main justify-align-center">
                                        <h4 style="text-align: center; color:black">Resort List</h4>
                                        <div class="card-body">
                                            @if (isset($resort_lists))
                                                <div class="container">
                                                    <div class="main w-100 mb-1 justify-align-center">
                                                        <div class="input-group">
                                                            <input type="search" id="myInput"
                                                                class="border border-success form-control w-75"
                                                                name='search' placeholder="Search">
                                                            <div class="input-group-append">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center cont">
                                                    <table class="table">
                                                        <thead class="table"
                                                            style="background-color: #21791A; text-align:center">
                                                            <tr>
                                                                <th scope="col" style="border-top-left-radius:10px 10px;"
                                                                    class="text-white">
                                                                    Resort Name</th>
                                                                <th scope="col" class="text-white">
                                                                    Assigned Staff</th>
                                                                <th scope="col" class="text-white">
                                                                    Status</th>
                                                                <th scope="col" style="border-top-right-radius:10px 10px;"
                                                                    class="text-white">
                                                                    Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            @if (isset($resort_lists))
                                                                @foreach ($resort_lists as $resort)
                                                                    <tr class="tr">
                                                                        <td>{{ $resort->resort_name }}</td>
                                                                        @if($resort->user_id == 1)
                                                                         <td>No assigned staff</td>
                                                                         @else
                                                                         <td>{{ $resort->assigned_staff }}</td>
                                                                        @endif
                                                                        
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
                                                                            <a href="{{ route('resorts.resort_guest', $resort->resort_id) }}"
                                                                                data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="View all guest in {{ $resort->resort_name }}"><i
                                                                                    data-feather="eye"></i> </a>
                                                                            |
                                                                            <a href="{{ route('admin.resort_list_edit', $resort->resort_id) }}"
                                                                                data-toggle="tooltip"
                                                                                data-placement="bottom"
                                                                                title="Edit {{ $resort->resort_name }}" ><i
                                                                                    data-feather="edit" ></i> </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    @if ($resort_lists->count() == 0)
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
                                            @endif
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <span class="float-right"> {!! $resort_lists->links() !!}</span>
        </div>
    </div>
@endsection
