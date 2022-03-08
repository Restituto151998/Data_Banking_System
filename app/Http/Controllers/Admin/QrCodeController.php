<?php

namespace App\Http\Controllers\Admin;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class QrCodeController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function qrCode(){
        return view('resorts.generate_qrcode');
    }
}
