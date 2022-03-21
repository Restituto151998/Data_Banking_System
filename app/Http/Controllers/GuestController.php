<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use Carbon\Carbon;
class GuestController extends Controller
{

public function redirectTo(){
    $resort_lists = DB::table( 'resort_lists' )->select( 'id', 'user_id', 'resort_id', 'resort_name', 'assigned_staff', 'status' )->get();
    return view('online_registration.guest_registration')->with( 'resort_lists', $resort_lists );
}

  public function onlineRegister(Request $request){

   
    $status = 'pending';
    $resort = json_decode($request->resort);
   
    if(empty($resort->id)){
      return back()->with('error', 'Please select specific resort');
    }else{
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
    $save->status = $status;
    $save->save();

    return redirect('resorts-overview')->with('status', 'Successfully Registered!');
    }

  }  

  public function overview(){
    $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
    $image = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();
  
    return view('online_registration.resorts_overview')->with( 'resorts', $resorts )->with('resorts', $image);
  }  
}
