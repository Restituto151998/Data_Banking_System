<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VodaKrasna;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function dashboard() {
        if(Auth::user()->status == 'disable'){
            return redirect('/forbidden');
        }

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

        $result3 = DB::select( DB::raw( 'select count(id) as guest from guests;' ) );
        $data3 = '';
        foreach ( $result3 as $val3 ) {
            $data3 .= "".$val3->guest.'';
        }
        $numberOfGuest = $data3;

        
        $result4 = DB::select( DB::raw( 'select count(id) as staff from users;' ) );
        $data4 = '';
        foreach ( $result4 as $val4 ) {
            $data4 .= "".$val4->staff.'';
        }
        $numberOfUser = $data4;

        $result5 = DB::select( DB::raw( 'select count(id) as resort from resorts;' ) );
        $data5 = '';
        foreach ( $result5 as $val5 ) {
            $data5 .= "".$val5->resort.'';
        }
        $numberOfResort = $data5;



        return view( 'admin.dashboard', compact( 'chartData', 'barData', 'numberOfGuest', 'numberOfUser', 'numberOfResort' ) );

    }

}
