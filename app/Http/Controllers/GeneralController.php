<?php

namespace App\Http\Controllers;

use App\Mail\CredentialsUpdated;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class GeneralController extends Controller
{
  public function index()
  {
    $categories = Category::withCount('jobs')->take(8)->get();
    $jobs = Job::with('company:id,name,logo_path,location')->orderBy('created_at', 'desc')->take(3)->get();
    return view('pages.home', compact('categories', 'jobs'));
  }

  public function about()
  {
     return view('layouts.about');
  }


  public function accountSettings()
  {
    // Fetch the company if it exists for a non-admin user
    $company = null;
    $user = Auth::user();


    if ($user->role === 'job_poster') {
      $company = Company::where('user_id', $user->id)->first();
    }
    return view('jobposter.accountSettings', compact('company', 'user'));
  }

  public function accountUpdate(Request $request)
  {
    $user = Auth::user();

    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|max:10',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    // Update user data with separate first and last name fields
    $user->first_name = $validatedData['first_name'];
    $user->last_name = $validatedData['last_name'];
    $user->email = $validatedData['email'];
    $user->phone = $validatedData['phone'];

    // Update password only if provided
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }

    // Save the updated user data
    $user->save();

    // Send email notification
    Mail::to($user->email)->send(new CredentialsUpdated($user));

    return redirect()->back()->with('success', 'Your profile has been updated successfully.');
  }
}
