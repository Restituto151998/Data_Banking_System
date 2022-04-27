<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Guest;
use App\Models\Image;
use App\Models\Resort;
use App\Models\ResortList;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
{

public function redirectTo($id){
    $resort_lists = ResortList::where('resort_id', $id)->get();
   
    $resorts = Resort::where('id', $id)->get();
    return view('online_registration.guest_registration')->with( 'resort_lists', $resort_lists )->with( 'resorts', $resorts );
}

  public function onlineRegister(Request $request){
    $status = 'pending';

    $save = new Guest;

    $save->full_name = $request->full_name;
    $save->resort_id =  $request->resort_id;
    $save->gender = $request->gender;
    $save->address = $request->address;
    $save->phone_number = $request->phone_number;
    $save->nationality = strtoupper($request->nationality);
    $save->temperature = $request->temperature;
    $save->time_use = $request->time_use;
    $save->purpose = $request->purpose;
    $save->status = $status;
    $save->save();
    Alert::success('Congrats', 'Successfully Registered!');
    return redirect('resorts-overview');
  }  

  public function overview(){
    $resort_lists = ResortList::all();  
    $resorts = DB::table( 'resorts' )->select( 'id', 'resort_name', 'resort_description', 'imagePath' )->get();

    return view('online_registration.resorts_overview')->with( 'resorts', $resorts )->with('resort_lists', $resort_lists);
  }  

  public function info($id){
    
    $resorts = Resort::where('id', $id)->get();
    $images = Image::where('resort_id', $id)->get();
    return view('online_registration.more_info')->with('images', $images)->with('resorts', $resorts);
  }  
}