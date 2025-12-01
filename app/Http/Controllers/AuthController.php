<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function loginForm()
  {
    return view('authentification.login');
  }

  public function registerForm()
  {
    return view('authentification.register');
  }

  public function register(Request $request)
  {
    // validation of the form data
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone' => 'required|string|max:10|unique:users',
      'password' => 'required|string|min:8|confirmed'
    ]);

    // create a new user
    $user = User::create([
      'first_name' => $validatedData['first_name'],
      'last_name' => $validatedData['last_name'],
      'email' => $validatedData['email'],
      'phone' => $validatedData['phone'],
      'password' => Hash::make($validatedData['password']),
      'role' => 'user'
    ]);

    // login user
    auth()->login($user);

    return redirect()->route('home');
  }

  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8'
    ]);

    $credentials = $request->only('email', 'password');


    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      
      // redirect the user logged to the his dashboard based on his role 
      switch($user->role) {
        case 'admin' : 
          return redirect()->route('admin.dashboard');
        case 'job_poster' :
          return redirect()->route('job_poster.dashboard');
        case 'user' :
          return redirect()->route('home');  
        default : 
          return redirect()->route('login');  
      }
    } else {
      // authentication failed , redirect back to login page
      return back()->withErrors([
        'email' => 'the credentials were invalid',
      ])->withInput($request->only('email'));
    }
  }

  public function logout()
  {
    Auth::logout();

    return redirect()->route('home');
  }
}
