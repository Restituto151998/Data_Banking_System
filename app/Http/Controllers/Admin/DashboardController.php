<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VodaKrasna;
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

        $result3 = DB::select( DB::raw( 'select id from guests;' ) );
        $numberOfGuest = count($result3);
   
        $result4 = DB::select( DB::raw( 'select id from users;' ) );
        $numberOfUser = count($result4);

        $result5 = DB::select( DB::raw( 'select id from resorts;' ) );
        $numberOfResort = count($result5);

<<<<<<< HEAD
        $pending = Guest::where('status','pending')->count();
        $accepted = Guest::where('status','accepted')->count();
        $cancelled = Guest::where('status','cancelled')->count();
        $left = Guest::where('status','left')->count();
=======

        $pending = Guest::where('status', 'pending')->count();
        $accepted = Guest::where('status', 'accepted')->count();
        $cancelled = Guest::where('status', 'cancelled')->count();
        $left = Guest::where('status', 'left')->count();
>>>>>>> 299682d392bcae7af5901ff0debbb616cb106eb0

    
        return view( 'admin.dashboard', compact( 'chartData', 'barData', 'numberOfGuest', 'numberOfUser', 'numberOfResort','pending', 'accepted', 'cancelled', 'left' ) );
    }

}
