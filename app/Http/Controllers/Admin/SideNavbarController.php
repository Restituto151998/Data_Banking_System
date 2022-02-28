<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SideNavbarController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function sideNavbar() {
        if ( Auth::check() && Auth::user()->status == 'enable' ) {
            return view( 'admin.side_navbar' );

        }
        return view( 'admin.forbidden' );

    }
}