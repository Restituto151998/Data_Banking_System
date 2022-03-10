<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\ResortList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AddResortController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function addResort() {
        return view( 'admin.add_resort' );

    }

    public function save( Request $request )
 {

        $validatedData = $request->validate( [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'resort_name' => 'required',

        ] );

        $resort_name = $request->input( 'resort_name' );



        // $resortValidator = Validator::make(
        //     array(
        //         'resort_name' => $resort_name

        // ),
        //     array(
        //         'resort_name' => 'required|resort_name|unique:resorts'

        // )
        // );

        // if ( $resortValidator->fails() )
        // {

        //     return redirect()->back()->with( 'message_fail', 'Duplicate resort name please try another.' );
        // }

        $resorts = Resort::where( 'resort_name', '=', $resort_name )->first();


    if ( $resorts->resort_name == $resort_name) {
        return redirect()->back()->with( 'message_fail', 'Duplicate resort name please try another.' );
    }

    
        

        $resort_description = $request->input( 'resort_description' );

        $filename = $request->image->getClientOriginalName();

        $imagePath = $request->file( 'image' )->storeAs( 'resorts', $filename, 'public' );

        $save = new Resort;

        $save->resort_description = $resort_description;
        $save->resort_name = $resort_name;
        $save->imagePath = $imagePath;

        $save->save();

        return redirect( 'add_resort' )->with( 'status', 'Resort Successfully Added!' );

        }
    }
