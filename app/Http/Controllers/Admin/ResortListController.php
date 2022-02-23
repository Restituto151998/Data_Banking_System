<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResortList;
use Illuminate\Http\Input;
use Illuminate\Support\Facades\Auth;

class ResortListController extends Controller
 {

    public function show() {
        if ( Auth::user()->status == 'disable' ) {
            return view( 'admin.forbidden' );
        }
        $resortList = DB::table( 'resort_lists' )->select( 'id', 'resort_name', 'assigned_staff', 'status' )->get();
        return view( 'admin.resort_list' )->with( 'resort_lists', $resortList );
    }

    public function edit( $id )
 {
        $resort = ResortList::where( 'id',  '=', $id )->first();

        return view( 'admin.resort_list' )->with( 'resort_lists', $resort );
    }

    public function resortList() {

        $resortList = DB::table( 'voda_krasnas' )->select( 'full_name', 'gender', 'address', 'phone_number', 'nationality', 'tempartaure', 'time_use', 'purpose' )->get();
        return view( 'admin.resorts.voda_krasna' )->with( 'resort_lists', $resortList );

    }

    public function update( Request $request )
 {
        $updateData = $request->validate( [
            'resort_name' => 'required|max:255',
            'assigned_staff' => 'required|max:255',
            'status' => 'required|max:255',
        ] );
        ResortList::whereId( $request->resort_id )->update( $updateData );

        return redirect()->back()->with( 'message', 'Successfully Updated!' );

    }

}
