<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
 {
    public function profile() {
        return view( 'admin.profile' );

    }

    public function uploadProfile( Request $request )
 {
        if ( $request->hasFile( 'image' ) ) {
            $filename = $request->image->getClientOriginalName();

            $request->image->storeAs( 'images', $filename, 'public' );

            Auth()->user()->update( [ 'image'=>$filename ] );

            return back()->with( 'status', 'Successfully uploaded!' );
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
            'password' => 'required|max:255',
        ] );

        User::whereId( Auth::user()->id )->update( $updateData );

        return back()->with( 'message', 'Successfully Updated!' );

    }
}
