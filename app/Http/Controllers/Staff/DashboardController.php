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

        return view( 'staff.dashboard', compact( 'chartData', 'numberOfGuest', 'filipino', 'foreigner' ) );
    }
}
