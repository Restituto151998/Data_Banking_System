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
        $result = DB::table('guests')
                 ->select('nationality', DB::raw('count(*) as count'))
                 ->where('resort_id', Auth::user()->resortList->resort_id)
                 ->groupBy('nationality')
                 ->get();
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

        $result1 = DB::table('guests')
        ->select('status', DB::raw('count(*) as count'))
        ->where('resort_id', Auth::user()->resortList->resort_id)
        ->where('status', 'pending')
        ->groupBy('status')
        ->get();
        $status = '';
        foreach ( $result1 as $val ) {
            $status .= "$val->count";
        }
        if($status == ""){
            $pending = "0";
        }else{
            $pending = $status;
        }

        $result2 = DB::table('guests')
        ->select('status', DB::raw('count(*) as count'))
        ->where('resort_id', Auth::user()->resortList->resort_id)
        ->where('status', 'accepted')
        ->groupBy('status')
        ->get();
        $status2 = '';
        foreach ( $result2 as $val ) {
            $status2 .= "$val->count";
        }
        if($status2 == ""){
            $accepted = "0";
        }else{
            $accepted = $status2;
        }

        $result3 = DB::table('guests')
        ->select('status', DB::raw('count(*) as count'))
        ->where('resort_id', Auth::user()->resortList->resort_id)
        ->where('status', 'cancelled')
        ->groupBy('status')
        ->get();
        $status3 = '';
        foreach ( $result3 as $val ) {
            $status3 .= "$val->count";
        }
        if($status3 == ""){
            $cancelled = "0";
        }else{
            $cancelled = $status3;
        }
       
        $result4 = DB::table('guests')
        ->select('status', DB::raw('count(*) as count'))
        ->where('resort_id', Auth::user()->resortList->resort_id)
        ->where('status', 'left')
        ->groupBy('status')
        ->get();
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
