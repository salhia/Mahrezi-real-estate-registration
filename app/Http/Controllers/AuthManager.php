<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){                                        //if user is logged in you cannot access login page again
            return redirect(route('home'));

        }
        return view('login');
    }

    function  registration(){

        return view('registration');
    }

    function  loginPost(Request $request){
       $request->validate([
              'email'=>'required|email',
              'password'=>'required|string|min:6'
       ]);

         $credentials = $request->only('email','password');
         if(Auth::attempt($credentials)){
                return redirect()->intended(route('home'));
         }
            return redirect(route('login'))->with("error","invalid credentials");

    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6'
     ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error","Registration failed, try again");
        }

        return redirect(route('login'))->with("success","Registration successful ,Login to access the app");

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }


    // change password part

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    $user->update([
        'password' => bcrypt($request->new_password),
    ]);

    // Log the user out after changing password
    Auth::logout();

    return redirect()->route('login')->with('success', 'Password changed successfully. Please login with your new password.');
}

}
