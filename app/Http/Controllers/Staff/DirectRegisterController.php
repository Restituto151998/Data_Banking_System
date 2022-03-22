<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DirectRegisterController extends Controller
{
    public function __construct() {
        $this->middleware( 'auth' );
    }
    public function index(){
        if(Auth::user()->type == 'ADMIN'){
            return redirect('/not_found');
        }
        return view('staff.register');
    }

    public function register(Request $request){
        $status = 'pending';

        $resort_id = $request->user()->resortList->resort_id;
        $full_name = $request->input('full_name');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $phone_number = $request->input('phone_number');
        $uppercase = $request->input('nationality');
        $nationality = strtoupper($uppercase);
        $temperature = $request->input('temperature');
        $time_use = $request->input('time_use');
        $purpose = $request->input('purpose');

        $save = new Guest;

        $save->full_name = $full_name;
        $save->resort_id = $resort_id;
        $save->gender = $gender;
        $save->address = $address;
        $save->phone_number = $phone_number;
        $save->nationality = $nationality;
        $save->temperature = $temperature;
        $save->time_use = $time_use;
        $save->purpose = $purpose;
        $save->status = $status;

        $save->save();

        
return back()->with('status', 'Guest Successfully Registered!');

    }


    public function accept( $id )
    {
           $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
           if ( $guest->status == 'pending' ) {
               $status = 'accepted';   
               $updateStatus = array( 'status' => $status );
               DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus );
               return back()->with( 'status', 'Guest registration accepted' );    
           } 
        
       }
    
    public function cancel( $id )
    {
           $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
           if ( $guest->status == 'pending' ) {
               $status = 'cancelled'; 
               $updateStatus = array( 'status' => $status );
               DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus );
       
               return back()->with( 'status', 'Guest registration cancelled' );      
           } 
         
   
       }

       public function leave( $id )
       {
              $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
              if ( $guest->status == 'accepted' ) {
                  $status = 'left';   
                  $updateStatus = array( 'status' => $status );
                  DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus );  
                  return back()->with( 'status', 'Guest registration cancelled' );  
              }

              if($guest->status == 'cancelled'){
                 DB::table( 'guests' )->where( 'id', $id )->delete();  
                  return back()->with( 'status', 'Guest successfully deleted' );  
              }              
          }
}
