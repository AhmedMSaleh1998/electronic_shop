<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'     => 'string|required|unique:users|regex:/^\S*$/u',
            'password' => ['required','confirmed',Password::min(8)->mixedCase()
            ->letters()->numbers()->symbols()->uncompromised()],
            'phone'    => 'string|required|unique:users|min:11',
            'email'    => 'email |required|unique:users',
            ]);
            $user = User::create([
                'name'     => $request->name,
                'phone'    => $request->phone,
                'email'    => $request->email,
                'password' => Hash::make( $request->password),
            ]
            );
            return ResponseJson("success" , "Reqisterd Successfully" , );
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

        // if(Auth::attempt($credentials)){
            $token = Str::random(80);
            $user = User::where("email",$request->email)->first();
           $user->update([
            'api_token' => $token,
            ]);
            return ResponseJson("successfuly" , "Login Successfully" , ['token'=> $token ]);
        }else{
            return ResponseJson("error" , "Data Not Valid " , );
        }


}
}
