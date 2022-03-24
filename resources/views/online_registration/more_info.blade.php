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

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="./assets/css/data.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/alcoyLogo.png" />
</head>

<body>
    <div class="container mt-5 mb-5">
        @if (session()->has('status'))
            <div id="overview" class="alert alert-success alert-dismissible fade  show" role="alert">
                {{ session()->get('status') }} ✔️
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row mt-4">
            @foreach ($resorts as $resort)
                <div class="col-sm-12">
                    <div class="card p-5">

                        <div class="row ">
                            <h2 class="text-center mb-4">{{ $resort->resort_name }}</h2>
                            <img src="{{ $resort->imagePath }}" class="text-center" alt="images"
                                style="width:100%; height: 100%;">
                        </div>
                        <div class="row mt-3 ">
                            <p>{{ $resort->resort_description }}</p>

                        </div>
                        <div class="row">
                            <div class="col text-center">
                             <a href="{{ url('resort-alcoy-registration',$resort->id) }}" class="btn w-50 text-white"
                                style="background-color:  #21791A">Register
                                Now</a>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @foreach ($images as $image)
            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="row">
                            <div class="col">
                                <img src="{{ $image->image }}" alt="images" style="width:100%; height: 100%;">
                            </div>
                            <div class="col">
                                <p>{{ $image->image_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#overview").remove();
        }, 3000);
    });

</script>

</html>
