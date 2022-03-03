<?php

namespace App\Http\Controllers\Admin;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QrCodeController extends Controller
{
    public function qrCode(){
//         $image = QrCode::format('png')->merge('http://w3adda.com/wp-content/uploads/2019/07/laravel.png', 0.3, true)
//             ->size(200)->errorCorrection('H')
//             ->generate('W3Adda Laravel Tutorial');
// return response($image)->header('Content-type','image/png');
        return view('resorts.generate_qrcode');
    }
}
