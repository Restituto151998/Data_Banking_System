<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function reset(){
        return view('auth.passwords.reset');
    }

    public function updatePass(Request $request){

        $validatedData = $request->validate( [
            'new_password' => 'required|min:8',
        ] );

        $users = User::all();
        foreach($users as $user){
            if($user->username == $request->username){
                if($request->new_password == $request->confirm_password){
                    User::where('id', $user->id)->update(['password' => Hash::make($request->new_password)]);
                    Alert::success('Success', 'Password reset successfully!');
                    return redirect('/login');
                }else{
                    Alert::error('Failed', 'Password not match!');
                    return back(); 
                }          
            }else{
                Alert::error('Failed', 'Incorrect Username!');
                return back();
            }
        }
    }
}
