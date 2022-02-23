<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
 {
    public function profile() {
        if ( Auth::user()->status == 'disable' ) {
            return view( 'admin.forbidden' );
        }
        return view( 'admin.profile' );
    }
}
