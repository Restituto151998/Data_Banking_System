<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResortList;
use App\Models\Guest;
use App\Models\Resort;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ResortListController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function show() {
        if ( Auth::user()->status == 'disable' ) {
            return redirect( '/forbidden' );
        }
        if(Auth::user()->type == 'STAFF'){
            return redirect('/not_found');
        } 
        $resortList = ResortList::paginate( 5 );
        return view( 'admin.resort_list' )->with( 'resort_lists', $resortList );

    }

    public function edit( $id )
 {
        $resort = ResortList::where( 'id',  '=', $id )->first();
        return view( 'admin.resort_list' )->with( 'resort_lists', $resort );
    }

    public function guest( $id ) {
        $resort = ResortList::where( 'resort_id',  '=', $id )->first();
        $guests = Guest::where( 'resort_id', $id )->paginate(15);
  
        return view( 'resorts.resort_guest' )->with( 'guests', $guests )->with('resorts', $resort );
    }

    public function update( Request $request )
 {
        $updateData = $request->validate( [
            'resort_name' => 'required|max:255',
            'assigned_staff' => 'required|max:255',
            'status' => 'required|max:255',
        ] );
        $resortName = $request->validate( [
            'resort_name' => 'required|max:255',
        ] );

        ResortList::whereId( $request->resort_id )->update( $updateData );
        Resort::whereId( $request->resort_id )->update( $resortName );

        return redirect()->back()->with( 'message', 'Successfully Updated!' );

    }

    public function changeResortStatus( $id )
 {
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
