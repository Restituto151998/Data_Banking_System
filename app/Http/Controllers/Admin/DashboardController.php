<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
 {
    public function dashboard() {
        // if ( !Auth::user() ) {
        //     return view( 'admin.forbidden' );
        // }
        return view( 'admin.dashboard' );
    }

}
