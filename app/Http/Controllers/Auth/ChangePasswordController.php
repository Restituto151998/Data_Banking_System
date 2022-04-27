<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

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
    
                User::find( Auth::user()->id )->update( [ 'password'=> Hash::make( $request->new_password ) ] );
                Alert::success('Congrats', 'Your password successfully changed!');
                return back();
            }
            $validatedData =  $request->validate( [
                'new_password' => [ 'required' ],
                'confirm_password' => [ 'same:new_password' ],
            ] );
            return back();

        }else{
            Alert::error('Failed', 'Current Password not match!');
            return back();
        }
        
    }

}
