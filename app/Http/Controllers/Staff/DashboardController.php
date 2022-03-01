<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }
    

    public function index() {
        if ( Auth::check() && Auth::user()->status == 'enable') {
            return view( 'staff.dashboard' );
        }
        Auth::logout();
       
    }
}
