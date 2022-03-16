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
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function show() {       
        $users = User::paginate( 5 );
        return view( 'admin.add_user' )->with( 'users', $users );
    }

    public function redirectToAddUser() {
        $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name' )->get();
        return view( 'admin.add_users' )->with( 'resorts', $resorts );
    }

    public function saveUser( Request $request ) {
        $resort_status = 'closed';
        $resort = json_decode( $request->assigned_staff );

        if ( empty( $resort->resort_name ) ) {
            return redirect()->back()->with( 'message_fail', 'Please choose a resort.' );
        }

        $validatedData = $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ] );

        $email = $request->input( 'email' );

        $emailValidator = Validator::make(
            array(
                'email' => $email
            ),
            array(
                'email' => 'required|email|unique:users'
            )
        );

        if ( $emailValidator->fails() )
 {
            return redirect()->back()->with( 'message_fail', 'Duplicate email please try another.' );
        }

        $save = new User;
        $status = 'enable';
        $name = $request->input( 'name' );
        $address = $request->input( 'address' );
        $phone_number = $request->input( 'phone_number' );
        $gender = $request->input( 'gender' );
        $email = $request->input( 'email' );
        $assigned_staff = $resort->resort_name;
        $type = 'STAFF';
        $password = Hash::make( $request->input( 'password' ) );

        $save->name = $name;
        $save->address = $address;
        $save->phone_number = $phone_number;
        $save->gender = $gender;
        $save->type = $type;
        $save->email = $email;
        $save->status = $status;
        $save->password = $password;

        if ( ResortList::where( 'resort_name', '=', $assigned_staff )->exists() ) {
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

    public function editUser( $id )
 {
        $user = User::find( $id );
        return view( 'admin.add_user_edit', compact( 'user' ) );

    }

    public function updateUser( Request $request )
 {
        if ( !empty( $request->new_password ) ) {
            if ( $request->new_password == $request->confirm_password ) {
                $updateData = $request->validate( [
                    'name' => [ 'required' ],
                    'address' => [ 'required' ],
                    'phone_number' => [ 'required' ],
                    'gender' => [ 'required' ],
                    'email' => [ 'required' ],
                    'new_password' => [ 'required' ],
                    'confirm_password' => [ 'same:new_password' ],
                ] );

                $user = User::find( $request->id );

                $name = $request->input( 'name' );
                $address = $request->input( 'address' );
                $phone_number = $request->input( 'phone_number' );
                $gender = $request->input( 'gender' );
                $email = $request->input( 'email' );
                $password = Hash::make( $request->input('new_password') );

                $user->name = $name;
                $user->address = $address;
                $user->phone_number = $phone_number;
                $user->gender = $gender;
                $user->email = $email;
                $user->password = $password;

                $user->save();
           
            }else{
                return back()->with( 'error', 'password doesnt match!' );
            }
        }

        $updateData = $request->validate( [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' =>'required|max:255',
            'phone_number' =>'required|max:255',
            'gender' =>'required|max:255',
        ] );
        $user = User::find( $request->id );

        $name = $request->input( 'name' );
        $email = $request->input( 'email' );
        $address = $request->input( 'address' );
        $phone_number = $request->input( 'phone_number' );
        $gender = $request->input( 'gender' );

        $user->name = $name;
        $user->email = $email;
        $user->address = $address;
        $user->phone_number = $phone_number;
        $user->gender = $gender;

        $user->save();
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

        return back()->with( 'status', 'User status has been updated successfully.' );
    }

}
