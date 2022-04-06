<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $status = 'accepted';

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

        Alert::success('Congrats', 'Guest Successfully Registered!');   
        return back();

    }


    public function accept( $id )
    {
        $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
        if ( $guest->status == 'pending' ) {
            $status = 'accepted';   
            $updateStatus = array( 'status' => $status );
            DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus );

            Alert::success('Success', 'Guest registration accepted!');   
            return back();    
        } 
        
    }
    
    public function cancel( $id )
    {
        $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
        if ( $guest->status == 'pending' ) {
            $status = 'cancelled'; 
            $updateStatus = array( 'status' => $status );
            DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus );
       
            Alert::success('Success', 'Guest registration cancelled!');   
            return back();      
        }            
    }

    public function leave( $id )
    {
        $guest = DB::table( 'guests' )->select( 'status' )->where( 'id', '=', $id )->first();
        if ( $guest->status == 'accepted' ) {
            $status = 'left';   
            $updateStatus = array( 'status' => $status );
            DB::table( 'guests' )->where( 'id', $id )->update( $updateStatus ); 
            
            Alert::success('Success', 'Guest Left!'); 
            return back();  
        }

        if($guest->status == 'cancelled'){
            DB::table( 'guests' )->where( 'id', $id )->delete();  

            Alert::success('Success', 'Guest successfully deleted!'); 
            return back();  
        }              
    }

}
