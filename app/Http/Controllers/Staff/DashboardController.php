<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;



class DashboardController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function dashboard() {  
        if(Auth::user()->status == 'disable'){
            return redirect('/forbidden');
        }  
        $result = DB::select( DB::raw( 'select count(nationality) as count ,guests.nationality from guests WHERE guests.resort_id = "'.Auth::user()->resortList->resort_id.'" GROUP BY guests.nationality;' ) );
        $data = '';
        foreach ( $result as $val ) {
            $data .= "['".$val->nationality."',".$val->count.'],';
        }
        $chartData = $data;

        $numberOfFilipino = Guest::where( 'resort_id', Auth::user()->resortList->resort_id )->get();
        $fili = 0;
        $fore = 0;
        foreach ( $numberOfFilipino as $fil ) {
            if ( $fil->nationality == 'Filipino' ) {
                $fili += 1;
            } else {
                $fore += 1;
            }

        }
        $filipino = $fili;
        $foreigner = $fore;
        $numberOfGuest = Guest::where( 'resort_id', Auth::user()->resortList->resort_id )->get()->count();

        $result1 = DB::select( DB::raw( 'select count(status) as count ,guests.status from guests WHERE guests.resort_id = "'.Auth::user()->resortList->resort_id.'" AND guests.status = "pending" GROUP BY guests.status;' ) );
        $status = '';
        foreach ( $result1 as $val ) {
            $status .= "$val->count";
        }
        if($status == ""){
            $pending = "0";
        }else{
            $pending = $status;
        }

        $result2 = DB::select( DB::raw( 'select count(status) as count ,guests.status from guests WHERE guests.resort_id = "'.Auth::user()->resortList->resort_id.'" AND guests.status = "accepted" GROUP BY guests.status;' ) );
        $status2 = '';
        foreach ( $result2 as $val ) {
            $status2 .= "$val->count";
        }
        if($status2 == ""){
            $accepted = "0";
        }else{
            $accepted = $status2;
        }

        $result3 = DB::select( DB::raw( 'select count(status) as count ,guests.status from guests WHERE guests.resort_id = "'.Auth::user()->resortList->resort_id.'" AND guests.status = "cancelled" GROUP BY guests.status;' ) );
        $status3 = '';
        foreach ( $result3 as $val ) {
            $status3 .= "$val->count";
        }
        if($status3 == ""){
            $cancelled = "0";
        }else{
            $cancelled = $status3;
        }
       
        $result4 = DB::select( DB::raw( 'select count(status) as count ,guests.status from guests WHERE guests.resort_id = "'.Auth::user()->resortList->resort_id.'" AND guests.status = "left" GROUP BY guests.status;' ) );
        $status4 = '';
        foreach ( $result4 as $val ) {
            $status4 .= "$val->count";
        }
        if($status4 == ""){
            $left = "0";
        }else{
            $left = $status4;
        }

        return view( 'staff.dashboard', compact( 'chartData', 'numberOfGuest', 'filipino', 'foreigner', 'pending', 'accepted', 'cancelled', 'left') );
    }
}
