<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use App\Models\ResortList;
use App\Models\Resort;

class AddUserController extends Controller
 {
    //display users

    public function show() {
        if ( Auth::check() ) {
            if ( Auth::user()->status == 'disable' ) {
                return view( 'error_code.forbidden' );
            }

            $users = User::paginate( 5 );

            return view( 'admin.add_user' )->with( 'users', $users );
        }
    }

    public function search() {
        $search = Input::get ( 'search' );
        $users = User::where( 'name', 'LIKE', '%'.$search.'%' )->orWhere( 'email', 'LIKE', '%'.$search.'%' )->paginate( 5 );

        return view( 'resorts.search' )->with( 'users', $users )->withQuery ( $search );

    }

    //redirect add_users

    public function redirectToAddUser() {
        //functionalities of dropdown resort
        $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name' )->get();
        return view( 'admin.add_users' )->with( 'resorts', $resorts );
    }

    //saving the user

    public function saveUser( Request $request ) {
        $resort_status = 'closed';
        $resort = json_decode( $request->assigned_staff );

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
            return redirect()->back()->with( 'message_fail', 'Duplicate email please try another.' );
        }

        $save = new User;
        $status = 'enable';
        $name = $request->input( 'name' );
        $email = $request->input( 'email' );
        $assigned_staff = $resort->resort_name;
        $type = 'STAFF';
        $password = Hash::make( $request->input( 'password' ) );

        $save->name = $name;

        $save->type = $type;
        $save->email = $email;
        $save->status = $status;
        $save->password = $password;

        if ( ResortList::where( 'resort_name', '=',$assigned_staff  )->exists() ) {
            return redirect()->back()->with( 'message_fail', 'Resort has already staff.' );
        }
       
        $save->save();
        
        ResortList::create( [
            'user_id' => $save->id,
            'resort_id' => $resort->id,
            'resort_name' =>$resort->resort_name,
            'assigned_staff' => $save->name,
            'status' => $resort_status,

        ] );

        return redirect( '/add_user' )->with( 'message_success', 'Added Successfully' );
    }

    //edit user

    public function editUser( $id )
 {
        $user = User::find( $id );
        return view( 'admin.add_user_edit', compact( 'user' ) );

    }

    //update user

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
        return redirect( '/add_user' )->with( 'message', 'Successfully Updated!' );
    }

    //change status of the user

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

        return back()->with( 'status', 'User status has been updated successfully.' );

    }

}
