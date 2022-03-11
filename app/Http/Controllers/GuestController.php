<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use Carbon\Carbon;
class GuestController extends Controller
{


public function redirectTo(){
    $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
    $image = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
    return view('online_registration.guest_registration')->with( 'resorts', $resorts )->with('resorts', $image);
}

  public function onlineRegister(Request $request){
    $resort = json_decode($request->resort);
   
    $full_name = $request->input('full_name');
    $gender = $request->input('gender');
    $address = $request->input('address');
    $phone_number = $request->input('phone_number');
    $nationality = $request->input('nationality');
    $temperature = $request->input('temperature');
    $time_use = $request->input('time_use');
    $purpose = $request->input('purpose');

    $save = new Guest;

    $save->full_name = $full_name;
    $save->resort_id =  $resort->id;
    $save->gender = $gender;
    $save->address = $address;
    $save->phone_number = $phone_number;
    $save->nationality = $nationality;
    $save->temperature = $temperature;
    $save->time_use = $time_use;
    $save->purpose = $purpose;
    $save->save();

    
return back()->with('status', 'You are Successfully Registered in'.$resort->resort_name);

  }  

  public function overview(){
    $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
    $image = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
    return view('online_registration.resorts_overview')->with( 'resorts', $resorts )->with('resorts', $image);
  }  
}
