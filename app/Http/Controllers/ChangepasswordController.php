<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ChangepasswordController extends Controller
{

    public function changepassword(Request $request){
        $newPassword = $request->newpassword;
        $this->validator($request);
        $this->updatepassword($newPassword);
        Session::flash('message_success','Se ha guardado correctamente');
        return view('changepassword');
    }

    protected function updatepassword($newPassword){
        $id = auth()->user()->id;
        $passwordHash = Hash::make($newPassword);
        User::where('id',$id)->update(['password' => $passwordHash]);
    }


    protected function validator(Request $request){
        return Validator::make($request->all(),[
            'oldpassword' => [
                function($attribute,$value,$fail){
                    $password = auth()->user()->getAuthPassword();
                    if(Hash::check($value,$password) != 1){
                        $fail("Contraseña Incorrecta");
                    }

                },
            'required'],
            'newpassword' => ['required','min:8']
            ])->validate();
    }
}
