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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
    $resort = ResortList::where('resort_id','=', $id);
    $resorts = Resort::where('id','=', $id);
    $images = Image::where('resort_id','=', $id );
    return view( 'admin.resort_list_edit', compact( 'resort', 'resorts', 'images' ) );
    }

    public function guest( $id ) {
        $resort = ResortList::where( 'resort_id',  '=', $id )->first();
        $guests = Guest::where( 'resort_id', $id )->paginate(15);
  
        return view( 'resorts.resort_guest' )->with( 'guests', $guests )->with('resorts', $resort );
    }

    public function update( Request $request )
 {          
         if($request->hasFile('imageMain')){
                $updateData = $request->validate( [
                    'resort_name' => 'required|max:255',
                    'assigned_staff' => 'required|max:255',
                ] );

            $path = 'data:image/' .  pathinfo($request->imageMain, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($request->imageMain));
            ResortList::where('resort_id',$request->id )->update( $updateData );
            Resort::where('id', $request->id )->update( ['resort_name' => $request->resort_name,'resort_description' => $request->resort_description, 'imagePath' => $path ] );
            return redirect('/resort_list')->with( 'message', 'Successfully Updated!' );
        }else{
            $updateData = $request->validate( [
                'resort_name' => 'required|max:255',
                'assigned_staff' => 'required|max:255',
            ] );
            ResortList::where('resort_id',$request->id )->update( $updateData );
            return redirect('/resort_list')->with( 'message', 'Successfully Updated!' );
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
            return back()->with( 'message', 'Image Added Successfully!' );
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

        return redirect( '/resort_list' )->with( 'status', 'Resort status has been updated successfully.' );
    }
    
}