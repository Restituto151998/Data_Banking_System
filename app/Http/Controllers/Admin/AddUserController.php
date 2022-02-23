<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AddUserController extends Controller
 {
    public function show() {
        if ( Auth::user()->status == 'disable' ) {
            return view( 'admin.forbidden' );
        }

        $users = DB::table( 'users' )->select( 'id', 'name', 'email', 'status',  'password', 'type', )->get();
        return view( 'admin.add_user' )->with( 'users', $users );

    }

    public function addUser( Request $request ) {

        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'type' => 'required',
            'password' => 'required|',
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

        return back()->with( 'message_success', 'user successfully added!' );

    }

    public function editUser( $id )
 {
        $user = User::find( $id );

        return view( 'admin.add_user_edit', compact( 'user' ) );
    }

    public function updateUser( Request $request )
 {
        $updateData = $request->validate( [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ] );
        $user = User::find( $request->id );

        $name = $request->input( 'name' );
        $email = $request->input( 'email' );
        $password = Hash::make( $request->input( 'password' ) );

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        //  User::whereId( $request->id )->update( $updateData );

        return redirect( '/add_user' )->with( 'message', 'Successfully Updated!' );

    }

    public function changeUserStatus( $id )
 {
        $user = DB::table( 'users' )->select( 'status' )->where( 'id', '=', $id )->first();

        if ( $user->status == 'enable' ) {
            $status = 'disable';
        } else {
            $status = 'enable';
        }

        $updateStatus = array( 'status' => $status );
        DB::table( 'users' )->where( 'id', $id )->update( $updateStatus );

        return redirect( '/add_user' )->with( 'status', 'User status has been updated successfully.' );
    }

}
