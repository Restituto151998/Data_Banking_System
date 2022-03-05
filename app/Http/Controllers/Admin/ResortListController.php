<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResortList;
use App\Models\Guest;
// use Illuminate\Http\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
         dd($resort);

            return view( 'admin.resort_list' )->with( 'resort_lists', $resort );
        }
    }

    public function guest($id) {
        $resort = ResortList::where( 'id',  '=', $id )->first();
            $guests = Guest::where('resort_id', $id)->get();
            return view( 'resorts.resort_guest' )->with('guests', $guests )->withDetails( $resort );
    }


    // public function printPreview($id) {
       
    //         $resortList = Guest::where('resort_id')->get();
    //         return view( 'resorts.resort_guest' )->with( 'guests', $guests );   
    // }

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


    public function changeResortStatus( $id )
 {

        if ( Auth::check() ) {
            $user = DB::table( 'resort_lists' )->select( 'status' )->where( 'id', '=', $id )->first();

            if ( $user->status == 'closed' ) {
                $status = 'open';
            } else {
                $status = 'closed';
            }

            $updateStatus = array( 'status' => $status );
            DB::table( 'resort_lists' )->where( 'id', $id )->update( $updateStatus );

            return redirect( '/resort_list' )->with( 'status', 'Resort status has been updated successfully.' );
        }
    }



    public function searchResortList() {
       
        $search = Input::get ( 'search' );
        $resort_lists = ResortList::where( 'resort_name', 'LIKE', '%'.$search.'%' )->orWhere( 'assigned_staff', 'LIKE', '%'.$search.'%' )->paginate( 5 );
        return view( 'resorts.resort_search' )->with( 'resort_lists',  $resort_lists  )->withQuery ( $search );

    }

}
