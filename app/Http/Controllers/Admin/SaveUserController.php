<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveUserController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function saveUser( Request $request ) {
        if(Auth::user()->status == 'disable'){
            return redirect('/forbidden');
        }
        $validatedData = $request->validate( [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ] );

        $username = $request->input( 'username' );

        $validator = Validator::make(
            array(
                'username' => $username
            ),
            array(
                'username' => 'required|username|unique:users'
            )
        );

        if ( $validator->fails() ) {
            return redirect()->back()->with( 'message_fail', 'Duplicate username please try again.' );
        }

        $save = new User;
        $status = 'enable';
        $name = $request->input( 'name' );
        $username = $request->input( 'username' );
        $type = 'STAFF';
        $password = Hash::make( $request->input( 'password' ) );

        $save->name = $name;
        $save->type = $type;
        $save->username = $username;
        $save->status = $status;
        $save->password = $password;

        $save->save();

        return redirect( '/add_user' )->with( 'message_success', 'Added Successfully' );
    }
}
