<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\ResortList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddResortController extends Controller
 {
    public function addResort() {

        if ( Auth::check() )
 {

            if ( Auth::user()->status == 'disable' ) {
                return view( 'error_code.forbidden' );
            }
            return view( 'admin.add_resort' );
        }
    }

    public function save( Request $request )
 {

        if ( Auth::check() ) {
         

            $validatedData = $request->validate( [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ] );

            $resort_name = $request->input( 'resort_name' );
        

            $resort_description = $request->input( 'resort_description' );

            $imagePath = $request->file( 'image' )->store( 'public/storage' );

            $save = new Resort;

            $save->resort_description = $resort_description;
            $save->resort_name = $resort_name;
            $save->imagePath = $imagePath;

            $save->save();

     
            return redirect( 'add_resort' )->with( 'status', 'Resort Successfully Added!' );
        }
        
    }
}
