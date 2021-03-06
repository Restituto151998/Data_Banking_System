<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\ResortList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class AddResortController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function addResort() {
        if(Auth::user()->type == 'STAFF'){
            return redirect('/not_found');
        } 
        return view( 'admin.add_resort' );
    }

    public function save( Request $request )
 {

        $validatedData = $request->validate( [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'resort_name' => 'required',
            'resort_description' => 'required',

        ] );
        $resort_name = $request->input( 'resort_name' );   

        $resorts = Resort::where( 'resort_name', '=', $resort_name )->first();
        if(empty($resorts->resort_name)){
        
            $resort_description = $request->input( 'resort_description' );

            $path = 'data:image/' .  pathinfo($request->image, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($request->image));

            $save = new Resort;
    
            $save->resort_description = $resort_description;
            $save->resort_name = $resort_name;
            $save->imagePath = $path;

            $save->save();
            Alert::success( $resort_name, 'Successfully Added!');
            return redirect( 'add_resort' );
            
        }
        if ( $resorts->resort_name == $resort_name) {
            Alert::error( $resort_name, 'Duplicate resort name!');
            return back();
        }

        }
    }