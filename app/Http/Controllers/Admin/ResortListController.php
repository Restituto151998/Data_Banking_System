<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResortList;
use App\Models\Guest;
use App\Models\User;
use App\Models\Resort;
use App\Models\Image;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

class ResortListController extends Controller
 {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function show() {
        if ( Auth::user()->status == 'disable' ) {
            return redirect( '/forbidden' );
        }
        if(Auth::user()->type == 'STAFF'){
            return redirect('/not_found');
        }
             
        $resortList = ResortList::paginate( 5 );
        return view( 'admin.resort_list' )->with( 'resort_lists', $resortList );

    }

    public function edit( $id )
 {
    $resort = ResortList::find( $id );
    $resorts = Resort::find( $id );
    $users = User::all();
    $images = Image::where('resort_id', $id )->get();
    return view( 'admin.resort_list_edit', compact( 'resort', 'resorts', 'images','users' ) );
    }

    public function guest(Request $request, $id ) {
     
        $dates = Date::where('resort_id', $id)->get();
        $from_date = '';
        $to_date = '';
        foreach($dates as $date){
            $from_date = $date->from;
            $to_date = $date->to;
        }
        $resort = ResortList::where( 'resort_id',  '=', $id )->first();
    
        $guests = Guest::where('resort_id',$id)
        ->where('created_at', '>=', $from_date)
        ->where('created_at', '<=', $to_date)
        ->get();

  
        return view( 'resorts.resort_guest' )->with( 'guests', $guests )->with('resorts', $resort )->with('dates', $dates );
    }

    public function update( Request $request )
 {          
         if($request->hasFile('imageMain')){
            if($request->user_id == '1'){
                ResortList::where('resort_id',$request->id )->update(['user_id' => $request->user_id,'resort_name' => $request->resort_name]);
            }
            $users = User::where('id',$request->user_id)->get();
            foreach($users as $user){
                
                ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => $user->name]);
            }

            $path = 'data:image/' .  pathinfo($request->imageMain, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($request->imageMain));
            Resort::where('id', $request->id )->update( ['resort_name' => $request->resort_name,'resort_description' => $request->resort_description, 'imagePath' => $path ] );
            Alert::success('Success', 'Successfully Updated!');
            return redirect('/resort_list');
        }else{
      
            if($request->user_id == '1'){
                ResortList::where('resort_id',$request->id )->update(['user_id' => $request->user_id,'resort_name' => $request->resort_name]);
            }
            $users = User::where('id',$request->user_id)->get();
            foreach($users as $user){
                
                ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => $user->name]);
            }

            Resort::where('id', $request->id )->update( ['resort_name' => $request->resort_name,'resort_description' => $request->resort_description] );
            Alert::success('Success', 'Successfully Updated!');
            return redirect('/resort_list');
        }
    }

    public function deleteImage($id){
       $delete_id =  DB::table( 'images' )->select( 'id' )->where( 'id', '=', $id )->first();
       
        if ($delete_id->id == $id) {
            DB::table( 'images' )->where( 'id', $id )->delete();  
            Alert::success('Success', 'Image successfully deleted!');
            return back();  
        }
      
        

    }

    public function addImage(Request $request, $id ){

        if($request->hasFile('image')){
            $image = 'data:image/' .  pathinfo($request->image, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($request->image));    
            $images = new Image;
            $images->resort_id = $id;
            $images->image_description = $request->image_description;
            $images->image = $image;                 
            $images->save();
            Alert::success('Success', 'Image Added Successfully!');
            return back();
           }
    }

    public function changeResortStatus( $id )
 {
        $user = DB::table( 'resort_lists' )->select( 'status' )->where( 'id', '=', $id )->first();

        if ( $user->status == 'closed' ) {
            $status = 'open';
        } else {
            $status = 'closed';
        }

        $updateStatus = array( 'status' => $status );
        DB::table( 'resort_lists' )->where( 'id', $id )->update( $updateStatus );
        Alert::success('Success', 'Resort status has been updated successfully!');
        return redirect( '/resort_list' );
    }
    
}