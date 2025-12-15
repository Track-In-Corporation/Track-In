<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function getLogin(){

      return Auth::check() ? redirect('/inventory') : view('pages.Login.index');
    }

    public function getRegister(){
      return view('pages.Register.index');
    }

    public function register(Request $request){
      // dd($request);

      $request->validate([
          'fullName' => 'required|min:3|max:40',
          'email' => ['required', 'unique:users,email', 'email'],
          'pass' => 'required|min:6|max:12',
      ], [
          'fullName.required' => 'Please enter your full name!',
          'email.required' => 'Please enter your email!',
          'email.unique' => 'Email already exists!',
          'pass.required' => 'Please enter your password!',
      ]);

      $user = User::create([
          'name' => $request->fullName,
          'email' => $request->email,
          'profile_picture_path' => '',
          'password' => Hash::make($request->pass),
          'phone' => '',
          'role' => 'user'
      ]);

      Auth::login($user);

      return redirect('/inventory')->with('success', 'Registration successful and you are logged in.');
    }

    function login(Request $request){
      $request->validate([
          'email' => ['required', 'email'],
          'pass' => 'required|min:6|max:12',
      ], [
          'email.required' => 'Please enter your email!',
          'pass.required' => 'Please enter your password!',
      ]);

        $remember = $request->has('rememberMe');
        $credentials = ['email' => $request->email, 'password' => $request->pass];

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/inventory')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['pass' => 'Email or password is incorrect.']);
    }

    function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have logged out successfully.');
    }
}
