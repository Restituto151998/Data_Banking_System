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
            $result1 = DB::select( DB::raw( 'select count(resorts.id) as guest,resorts.resort_name from guests INNER JOIN resorts ON guests.resort_id = resorts.id GROUP BY resorts.resort_name;' ) );
            $data1 = '';
            foreach ( $result1 as $val1 ) {
                $data1 .= "['".$val1->resort_name."',".$val1->guest.'],';
            }
            $barData = $data1;
    

                $result2 = DB::select( DB::raw( 'select count(nationality) as count,guests.nationality from guests GROUP BY guests.nationality;' ) );
                $data2 = '';
                foreach ( $result2 as $val2 ) {
                    $data2 .= "['".$val2->nationality."',".$val2->count.'],';
                }
                $chartData = $data2;
                return view( 'admin.dashboard', compact( 'chartData', 'barData' ) );

        }

    // public function barChart() {
    //     $result = DB::select( DB::raw( 'select count(resorts.id) as guest,resorts.resort_name from guests INNER JOIN resorts ON guests.resort_id = resorts.id GROUP BY resorts.resort_name;' ) );
    //     $data = '';
    //     foreach ( $result as $val ) {
    //         $data .= "['".$val->resort_name."',".$val->guest.'],';
    //     }
    //     $barData = $data;

    //     return view( 'admin.dashboard', compact( 'barData' ) );

    // }

}
