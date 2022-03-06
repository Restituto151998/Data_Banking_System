@extends('sideNav.side_navbar')

@section('qr-code')

    <div class="main-wrapper main-wrapper-1">
        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Qr-code') }}</div>
                            <div class="card-body text-center mb-3">
                                <img style="width: 50%" src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('http://127.0.0.1:8000/resort-alcoy-registration'),
) !!} ">
<p>Please scan the QR-Code to register.</p>
                            </div>
                            <a href="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->merge('assets/img/logo.png', 0.3, true)->size(200)->errorCorrection('H')->generate('http://127.0.0.1:8000/resort-alcoy-registration'),
) !!} " class="btn" download>
                            <i class="fa fa-download"></i> Download Qr-Code
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
