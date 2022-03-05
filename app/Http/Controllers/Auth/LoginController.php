<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;
use App\Models\ResortList;

class LoginController extends Controller
 {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * Where to redirect users after login.
    *
    * @var string
    */

    public function redirectTo() {
        $type = Auth::user()->type;
        
        if ( Auth::user()->status == 'disable' ) {
            Auth::logout();
        } else {
            switch ( $type ) {
                case 'ADMIN':
                return '/admin_dashboard';
                break;
                case 'STAFF':
                return '/staff_dashboard';
                break;

                default:
                return '/login';

                break;
            }

        }

    }

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct()
 {
        $this->middleware( 'guest' )->except( 'logout' );
    }
}
