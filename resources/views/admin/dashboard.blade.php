@extends('admin.side_navbar')

@section('dashboard')
    <div>
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="m-0">Dashboard</h4>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4>Hi {{ Auth::user()->name }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <p>We are thankful for your subscription in our system. <br>
                                                    To keep updated we will send notification in your email provided @ <br>
                                                    We are looking forward for your participation.
                                                </p>
                                                Best Regards, <br>
                                                PN Developers | Data Banking System
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
