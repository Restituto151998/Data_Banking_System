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
use RealRashid\SweetAlert\Facades\Alert;

class AddUserController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function show() {    
        if(Auth::user()->type == 'STAFF'){
            return redirect('/not_found');
        }   
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
        
        $validatedData = $request->validate( [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required',
            'phone_number' => 'required|min:11|max:11',
            'assigned_staff' => 'required',
            'address' => 'required',
        ] );

        if ($request->assigned_staff == 'Not applicable to assign') {
            $save = new User;
            $status = 'enable';
            $name = $request->input( 'name' );
            $address = $request->input( 'address' );
            $phone_number = $request->input( 'phone_number' );
            $gender = $request->input( 'gender' );
            $username = $request->input( 'username' );
            $assigned_staff = 'No resort';
            $type = 'STAFF';
            $password = Hash::make( $request->input( 'password' ) );
    
            $save->name = $name;
            $save->address = $address;
            $save->phone_number = $phone_number;
            $save->gender = $gender;
            $save->type = $type;
            $save->username = $username;
            $save->status = $status;
            $save->password = $password;  
            $save->save();

            Alert::success('Success', 'User addedsuccessfully!');
            return redirect( '/add_user' );
        }

        $save = new User;
        $status = 'disable';
        $name = $request->input( 'name' );
        $address = $request->input( 'address' );
        $phone_number = $request->input( 'phone_number' );
        $gender = $request->input( 'gender' );
        $username = $request->input( 'username' );
        $assigned_staff = $resort->resort_name;
        $type = 'STAFF';
        $password = Hash::make( $request->input( 'password' ) );

        $save->name = $name;
        $save->address = $address;
        $save->phone_number = $phone_number;
        $save->gender = $gender;
        $save->type = $type;
        $save->username = $username;
        $save->status = $status;
        $save->password = $password;

        if ( ResortList::where( 'resort_name', '=', $assigned_staff )->exists()) {
            Alert::error('Failed', 'Resort has already staff!');
            return back();
        }

        $save->save();

        ResortList::create( [
            'user_id' => $save->id,
            'resort_id' => $resort->id,
            'resort_name' =>$resort->resort_name,
            'assigned_staff' => $save->name,
            'status' => $resort_status,

        ] );
        Alert::success('Success', 'User added/assigned successfully!');
        return redirect( '/add_user' );
    }

    public function editUser( $id )
 {
        $user = User::find( $id );
        return view( 'admin.add_user_edit', compact( 'user' ) );

    }

    public function changePass(Request $request, $id){
       if ($request->new_password == $request->confirm_password) {
           User::where('id', $request->id_pass)->update(['password' => Hash::make($request->new_password)]);
           Alert::success('Success', 'Password changed successfully!');
           return back();
       }else{
        Alert::error('Failed', 'Password not match!');
        return back();
       }
    }

    public function updateUser( Request $request )
 {
        $updateData = $request->validate( [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'address' =>'required|max:255',
            'phone_number' =>'required|min:11|max:11',
            'gender' =>'required|max:255',
        ] );
        $user = User::find( $request->id );

        $name = $request->input( 'name' );
        $username = $request->input( 'username' );
        $address = $request->input( 'address' );
        $phone_number = $request->input( 'phone_number' );
        $gender = $request->input( 'gender' );

        $user->name = $name;
        $user->username = $username;
        $user->address = $address;
        $user->phone_number = $phone_number;
        $user->gender = $gender;
        $resortlist = ResortList::where('user_id', $request->id)->first();
        if(empty($resortlist->assigned_staff)){
            $user->save();
            Alert::success('Success', 'User successfully updated!');
            return redirect( '/add_user' );
        }
        $resortlist->assigned_staff = $name;
        $resortlist->save();
        $user->save();
        Alert::success('Success', 'User successfully updated!');
        return redirect( '/add_user' );
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
        $no_staff = array( 'user_id' => '1','assigned_staff' => 'No assigned staff' );
        if($status == 'disable'){
            ResortList::where('user_id',$id)->update($no_staff);
        }
        DB::table( 'users' )->where( 'id', $id )->update( $updateStatus );
        Alert::success('Success','User status has been updated successfully!');
        return back();
    }

}