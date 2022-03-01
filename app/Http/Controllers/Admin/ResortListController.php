<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResortList;
use App\Models\Guest;
use Illuminate\Http\Input;
use Illuminate\Support\Facades\Auth;

class ResortListController extends Controller
 {

    public function show() {
        if ( Auth::check() ) {
            if ( Auth::user()->status == 'disable' ) {
                return view( 'error_code.forbidden' );
            }
            $resortList = ResortList::paginate(5);
            return view( 'admin.resort_list' )->with( 'resort_lists', $resortList );
        }
    }

    public function edit( $id )
 {
        if ( Auth::check() ) {
            $resort = ResortList::where( 'id',  '=', $id )->first();

            return view( 'admin.resort_list' )->with( 'resort_lists', $resort );
        }
    }

    public function guest($id) {
  
            $guests = Guest::where('resort_id', $id)->get();
            return view( 'resorts.resort_guest' )->with('guests', $guests );

        

    }
    public function printPreview() {
       
            $resortList = Guest::all();
            return view( 'resorts.resort_guest' )->with( 'resort_lists', $resortList );

        
    }

    public function update( Request $request )
 {
        if ( Auth::check() ) {
            $updateData = $request->validate( [
                'resort_name' => 'required|max:255',
                'assigned_staff' => 'required|max:255',
                'status' => 'required|max:255',
            ] );
            ResortList::whereId( $request->resort_id )->update( $updateData );

            return redirect()->back()->with( 'message', 'Successfully Updated!' );
        }
    }

}
