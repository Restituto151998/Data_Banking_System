<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function profile() {
        if(Auth::user()->status == 'disable'){
            return redirect('/forbidden');
        } 
        return view( 'admin.profile' );

    }

    public function uploadProfile( Request $request )
 {
        if ( $request->hasFile( 'image' ) ) {
            $filename = $request->image->getClientOriginalName();

            $path = 'data:image/' .  pathinfo($request->image, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($request->image));
            Auth::user()->update(['images'=>$path]);
    

            return back()->with( 'status', 'Image profile successfully changed!' );
        }

    }

    public function editUserInformation( $id )
 {
        $users = User::where( 'id',  '=', $id )->first() ;
        return view( 'admin.profile' );
    }

    public function updateUserInformation( Request $request )
 {
        $updateData = $request->validate( [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'gender' => 'required|max:255',
            
        ] );

        User::whereId( Auth::user()->id )->update( $updateData );
        return back()->with( 'message', 'Profile information updated successfully!!' );
    }
}
