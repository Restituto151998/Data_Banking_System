<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VodaKrasna;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
 {
    public function dashboard() {
     
        if ( Auth::check() && Auth::user()->status == 'enable' ) {
            $result = DB::select(DB::raw("select count(nationality) as count,guests.nationality from guests GROUP BY guests.nationality;"));
            $data = "";
            foreach($result as $val){
                $data.= "['".$val->nationality."',".$val->count."],";
            }
            $chartData = $data;
            return view( 'admin.dashboard', compact('chartData'));
        }
        return view( 'error_code.forbidden' );

    }

  

}
