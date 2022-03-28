<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;

class ChangePasswordController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function redirectTo() {

        return view( 'auth.passwords.changePassword' );
    }

    public function updatePassword( Request $request ) {
        if(Hash::check($request->current_password, Auth::user()->password)){
            if ( $request->new_password == $request->confirm_password ) {
                $request->validate( [
                    'current_password' => [ 'required' ],
                    'new_password' => [ 'required' ],
                    'confirm_password' => [ 'same:new_password' ],
                ] );
    
                User::find( Auth::user()->id )->update( [ 'password'=> Hash::make( $request->new_password ) ] );
    
                return back()->with( 'status', 'password successfully changed!.' );
            }
            return back()->with( 'error', 'password doesnt match!' );

        }else{
            return back()->with( 'error', 'Current Password not match!' );
        }
        
    }

}
