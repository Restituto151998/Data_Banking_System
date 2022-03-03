<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
 {
    public function profile() {
        if ( Auth::check() ) {
            if ( Auth::user()->status == 'disable' ) {
                return view( 'error_code.forbidden' );
            }
            return view( 'admin.profile' );
        }
    }

    public function uploadImage(){
        // $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
        //    ]);
    
        //    $name = $request->file('image')->getClientOriginalName();
    
        //    $path = $request->file('image')->store('public/images');
    
    
        //    $save = new Photo;
    
        //    $save->name = $name;
        //    $save->path = $path;
    
        //    return redirect('image-upload-preview')->with('status', 'Image Has been uploaded successfully in laravel 8');
    }
    public function uploadProfile(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
  
            $request->image->storeAs('images',$filename,'public');
         
            Auth()->user()->update(['image'=>$filename]);
        }
        return back()->with('status', 'Successfully uploaded!');
    }
}
