<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DateController extends Controller
{

    public function updateDate(Request $request, $id)
    {
        if(empty($request->from))
        {
            Alert::error('failed', 'Please select a date for "from: date"'); 
            return back();
        }
        if(empty($request->to))
        {
            Alert::error('failed', 'Please select a date for "to: date"'); 
            return back();
        }
        Date::where('resort_id', $id)->delete();
        $date = new Date;
        $date->resort_id = $request->id;
        $date->from = date('Y-m-d', strtotime($request->from));
        $date->to = date('Y-m-d', strtotime($request->to));
        $date->save();       
        Alert::success('Success', 'Setting date successfully');  
        return back();
    }
}
