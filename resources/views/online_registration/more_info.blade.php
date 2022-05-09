<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/logo.png') }}" />
</head>

<body style="background-color:#6b6b6b;">
    @include('sweetalert::alert')
    <div id="app"></div>
    <div class="container mt-5 mb-5">
        <div class="row mt-4">
            @foreach ($resorts as $resort)
                <div class="col-sm-12">
                    <div class="card p-5">
                        <div class="row ">
                            <h2 class="text-center mb-4">{{ $resort->resort_name }}</h2>
                            <img src="{{ $resort->imagePath }}" class="rounded" alt="images"
                                style="width:100%; height: 100%;">
                        </div>
                        <div class="row mt-3 ">
                            <p>{{ $resort->resort_description }}</p>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <a href="{{ url('resort-alcoy-registration', $resort->id) }}"
                                    class="btn w-50 text-white" style="background-color:  #21791A">Register
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @foreach ($images as $image)
            <div class="main-wrapper main-wrapper-1 mt-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="{{ $image->image }}" alt="images" id="image-info"
                                            style="width:100%; height: 100%;">
                                    </div>
                                    <div class="col-sm-8 mt-3">
                                    <strong><h2>{{ $image->title }}</h2></strong>
                                        <p>{{ $image->image_description }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</html>
