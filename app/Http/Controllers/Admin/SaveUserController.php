<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveUserController extends Controller
{
    public function saveUser( Request $request ) {
     
        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ] );

        $email = $request->input( 'email' );

        $validator = Validator::make(
            array(
                'email' => $email
            ),
            array(
                'email' => 'required|email|unique:users'
            )
        );

        if ( $validator->fails() )
 {
            return redirect()->back()->with( 'message_fail', 'Duplicate email please try again.' );
        }

        $save = new User;
        $status = 'enable';
        $name = $request->input( 'name' );
        $email = $request->input( 'email' );
        $type = 'STAFF';
        $password = Hash::make( $request->input( 'password' ) );

        $save->name = $name;

        $save->type = $type;
        $save->email = $email;
        $save->status = $status;
        $save->password = $password;

        $save->save();


return redirect('/add_user')->with( 'message_success', 'Added Successfully' );
    }
}
