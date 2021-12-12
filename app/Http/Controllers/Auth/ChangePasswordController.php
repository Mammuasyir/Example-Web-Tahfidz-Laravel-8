<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function updatePass(ChangePasswordRequest $request)
    {
        // return dd($request);
        $old_pass = auth()->user()->password;
        $user_id = auth()->user()->id;


        if(Hash::check($request->input('old_password'),$old_pass)) {

            if(Hash::check($request->input('password'),$old_pass)) {
                return redirect()->back()->with('Failed', 'Password Tidak boleh sama!');
            }else{
                $user = User::find($user_id);
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->back()->with('Success', 'Password Berhasil Diganti!');
            }
        

            // return redirect()->back()->with('Success', 'Hore !');

        }else{
            return redirect()->back()->with('Failed', 'Password Salah !');
        }
    }
}
