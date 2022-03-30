
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

    <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/data.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/logo.png') }}" />
</head>
<style>
 @media screen and (min-width: 414px) {
        #flip {
            max-width: 400px;
            max-height: 400px;
            /* New width for default modal */
        }
    }

</style>
<body>
    <div class="container mt-5">
        <div id="app"></div>
        @if (session()->has('status'))
            <div id="overview" class="alert alert-success alert-dismissible fade  show" role="alert">
                {{ session()->get('status') }} ✔️
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="card text-center">
                <div class="card-title text-center">
                    <h1 class="mt-3">Alcoy Resorts Overview</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($resorts as $image)
                @foreach ($resort_lists as $res)
                    @if ($image->id == $res->resort_id && $res->status == 'open')
                        <div class="col-sm-4 mt-4">
                            <div class="card card-flip" id="flip"
                                style="width:100%; height: 100%;">
                                <div class="card-front text-white bg-primary">
                                    <div class="card-body">
                                        <i class="fa fa-arrow-circle-right fa-2x float-right"></i>
                                        <h5 class="card-title">{{ $image->resort_name }}</h5>
                                        <img src="{{ $image->imagePath }}" class="rounded" alt="images"
                                            style="width:100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="card-back bg-white">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">{{ $image->resort_name }}</h5>
                                        <a href="{{ route('online_registration.more_info', $image->id) }}"
                                            class="btn w-100 text-white" style="background-color:  #21791A; ">More
                                            Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

    </div>
</body>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#overview").remove();
        }, 3000);
    });
</script>

</html>
