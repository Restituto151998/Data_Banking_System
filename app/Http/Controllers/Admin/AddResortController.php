<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resort;
use App\Models\ResortList;
use App\Models\User;


class AddResortController extends Controller
{
    public function addResort() {
        return view('admin.add_resort');
      }

      public function save(Request $request)
      {

        $assigned_staff = "no assigned staff!";
        $status = "closed";
           
          $validatedData = $request->validate([
           'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
   
          ]);
   
        

          $resort_name = $request->input('resort_name');
          $id = $request->user()->id;
          

          $resort_description = $request->input('resort_description');
   
          $imagePath = $request->file('image')->store('public/storage');
   
          $save = new Resort;

      
          
          $save->resort_description = $resort_description;
          $save->resort_name = $resort_name;
          $save->imagePath = $imagePath;
   
          $save->save();

          ResortList::create([
            'user_id' => $id,
            'resort_id' => $save->id,
            'resort_name' =>$resort_name,
            'assigned_staff' => $assigned_staff,
            'status' => $status,

          ]);

          return redirect('add_resort')->with('status', 'Image Has been uploaded');
          
      }
}
