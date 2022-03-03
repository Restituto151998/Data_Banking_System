<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;


class DirectRegisterController extends Controller
{
    public function index(){
        return view('staff.register');
    }

    public function register(Request $request){


        $resort_id = $request->user()->resortList->resort_id;
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
        $save->resort_id = $resort_id;
        $save->gender = $gender;
        $save->address = $address;
        $save->phone_number = $phone_number;
        $save->nationality = $nationality;
        $save->temperature = $temperature;
        $save->time_use = $time_use;
        $save->purpose = $purpose;

        $save->save();

        
return back()->with('status', 'Guest Successfully Registered!');

    }
}
