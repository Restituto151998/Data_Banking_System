<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        {{-- <div>
            @foreach ($resorts as $image)
            {{ $image->imagePath}}
                <img src="{{ asset('storage/'.$image->imagePath)}}" alt="images" srcset="">
            @endforeach
        </div> --}}

        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade  show" role="alert">
                {{ session()->get('status') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <form method="post" enctype="multipart/form-data" id="add_guest"
                        action="{{ url('/guest_register') }}">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="to_assigned" class="col-sm-2 col-form-label">Please Select A Resort:</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" id="inputGroupSelect01" name="resort">
                                        <option selected>Choose resort...</option>
                                        @foreach ($resorts as $resort)

                                            <option value="{{ json_encode($resort) }}">

                                                {{ $resort->resort_name }}

                                            </option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <input type="text" name="gender">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" name="nationality">
                            </div>
                            <div class="form-group">
                                <label for="">Temperature</label>
                                <input type="text" name="temperature">
                            </div>
                            <div class="form-group">
                                <label for="">Time Use</label>
                                <input type="text" name="time_use">
                            </div>
                            <div class="form-group">
                                <label for="">Purpose</label>
                                <input type="text" name="purpose">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">register</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
