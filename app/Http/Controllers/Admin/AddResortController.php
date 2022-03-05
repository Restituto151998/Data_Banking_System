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
    public function addResort() {
        return view( 'admin.add_resort' );

    }

    public function save( Request $request )
 {

        $validatedData = $request->validate( [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ] );

        $resort_name = $request->input( 'resort_name' );

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
