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
use Carbon\Carbon;

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
        $resort = ResortList::where( 'resort_id',  '=', $id )->first();
        $dates = Date::where('resort_id', $id)->get();
        $from_date = '';
        $to_date = '';
        foreach($dates as $date){
            $from_date = $date->from;
            $to_date = $date->to;
        }
        $start_date = $from_date;
        $date_end = $to_date;

        if(empty($start_date) && empty($date_end)){
            $guests = Guest::where('resort_id',$id)->get();
            return view( 'resorts.resort_guest' )->with( 'guests', $guests )->with('resorts', $resort )->with('dates', $dates );
        }  
    
        $guests = Guest::where('resort_id',$id)
        ->whereBetween('created_at', [$start_date, $date_end])
        ->get();

        return view( 'resorts.resort_guest' )->with( 'guests', $guests )->with('resorts', $resort )->with('dates', $dates );
    }

    public function update( Request $request )
 {          
         if($request->hasFile('imageMain')){
            $users = User::where('id',$request->user_id)->get();
            foreach($users as $user){
                if($request->user_id == '1'){
                    ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => 'No assigned staff']);
                }else{
                    if ( ResortList::where( 'user_id', '=', $request->user_id )->exists()) {
                        Alert::error('Failed', 'Staff has already resort!');
                        return back();
                    }
                    ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => $user->name]);
                }
               
            }
            ResortList::where('resort_id',$request->id )->update(['resort_name' => $request->resort_name]);
            Resort::where('id', $request->id )->update( ['resort_name' => $request->resort_name,'resort_description' => $request->resort_description] );
            Alert::success('Success', 'Successfully Updated!');
            return redirect('/resort_list');
        }else{         
           
            $users = User::where('id',$request->user_id)->get();
            foreach($users as $user){
                if($request->user_id == '1'){
                    ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => 'No assigned staff']);
                }else{
                    if ( ResortList::where( 'user_id', '=', $request->user_id )->exists()) {
                        Alert::error('Failed', 'Staff has already resort!');
                        return back();
                    }
                    ResortList::where('resort_id',$request->id )->update(['user_id' => $user->id,'resort_name' => $request->resort_name, 'assigned_staff' => $user->name]);
                }
               
            }
            ResortList::where('resort_id',$request->id )->update(['resort_name' => $request->resort_name]);
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