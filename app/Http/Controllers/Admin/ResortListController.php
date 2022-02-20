<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ResortListController extends Controller
{
  
    public function resortList() {
        $resortList = DB::table('resort_lists')->select('resort_name', 'assigned_staff', 'status')->get();
        return view('admin.resort_list')->with('resort_lists', $resortList);
    } 
}
