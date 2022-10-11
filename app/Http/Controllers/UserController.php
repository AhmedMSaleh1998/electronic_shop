<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\delete;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{


    public function register(){
        return view('auth.register');
    }

    public function handleRegister(Request $request){
        $request->validate([
                'name'     => 'string|required|unique:users|regex:/^\S*$/u',
                'password' => ['required','confirmed',Password::min(8)->mixedCase()
                ->letters()->numbers()->symbols()->uncompromised()],
                'phone'    => 'string|required|unique:users|min:11',
                'email'    => 'email |required|unique:users',
                'image'    => 'nullable',
        ],['name.regex'=> 'Name should contains Spaces']
        );
        $user = User::create(
            [
                'name'      => $request->name,
                'password'  => Hash::make($request->password),
                'phone'     => $request->phone,
                'email'     => $request->email,
            ]
            );
            Auth::login($user);
            return redirect (route('index'));
    }

    public function login(){
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        {
            $remember_me = $request->has('remember_me') ? true : false;
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, $remember_me)) {
                $request->session()->regenerate();
                return redirect (route('index'));
            }
            return back()->with(['error' => 'Your data is wrong']);
        }
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
    }

public function profile(){
    return view('auth.myprofile');
}
public function updateprofile(){
    return view('auth.updateprofile');
}

public function editprofile($id,Request $request){
    $request->validate([
        'name'     => 'string|required|regex:/^\S*$/u',
        'phone'    => 'string|required|min:11',
        'email'    => 'email |required',
        'image'    => 'nullable|image|mimes:jpg,png',
    ],['name.regex'=> 'Name should contains Spaces']
);

$user = User::find($id);
$name = $user->image;
if ($request->hasFile('image')) {
    if ($name !== null) {
        unlink(public_path('images/users/') . $name);
    }
    $image = $request->image;
    $ext = $image->getClientOriginalExtension();
    $name = $user->id . ".$ext";
    $image->move(public_path('images/users/'), $name);
}
$user->update(
    [
        'name'      => $request->name,
        'phone'     => $request->phone,
        'email'     => $request->email,
        'image'     => $name,
    ]
    );
    return redirect (route('auth.myprofile'));

}
//delete profile
public function destroy($id)
{
    $user = User::find($id);
    // check if the user has image
    if ($user->image !== null) {
        //to delete the user image from user folder
        unlink(public_path('images/users/' . $user->image));
    }
    $user->delete();
    return redirect(route('index'));
}

public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function Githubcallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password' => bcrypt($githubUser->getId()),
            'image' =>$githubUser->avatar,

        ]);

        Auth::login($user);

        return redirect('/');
    }
}


