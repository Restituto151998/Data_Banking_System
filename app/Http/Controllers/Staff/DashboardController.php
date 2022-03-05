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
            $nationality = Guest::where('resort_id', Auth::user()->resortList->resort_id)->get()->count();
            $resortName = Guest::where('resort_id', Auth::user()->resortList->resort_id)->get();
            $data = '';
            foreach ( $resortName as $resort ) {
                $data .= "['".$resort->nationality."',".$nationality.'],';
            }
            $chartData = $data;

            $numberOfFilipino = Guest::where('resort_id', Auth::user()->resortList->resort_id)->get();
            $fili = 0;
            $fore = 0;
            foreach ( $numberOfFilipino as $fil ) {
                if($fil->nationality == 'Filipino'){
                    $fili+=1;
                }else{
                    $fore+=1;
                }
              
            }
            $filipino = $fili;           
            $foreigner = $fore;
         
            $numberOfGuest = Guest::where('resort_id', Auth::user()->resortList->resort_id)->get()->count();
           
            return view( 'staff.dashboard', compact( 'chartData', 'numberOfGuest', 'filipino', 'foreigner' ) );
        }
}
