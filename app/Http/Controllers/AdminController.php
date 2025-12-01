<?php

namespace App\Http\Controllers;

use App\Mail\JobPosterCredentialsMail;
use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
  public function index()
  {
    // Check if the user is a job poster (not admin)
    $user = Auth::user();

    // Fetch the company if it exists for a non-admin user
    $company = null;

    if ($user->role === 'job_poster') {
      $company = Company::where('user_id', $user->id)->first();
    }

    // Number of jobs 
    $jobsTotal = Job::all()->count();

    // Total of Applications Received
    $applicationsTotal = Application::all()->count();

    // Companies Count  
    $companyCount = Company::all()->count();

    // Accepted Applications
    $acceptedApplications = Application::where('status', 'accepted')->count();

    // Most Popular Job Category
    $mostPopularCategoryId = Job::select('category_id')
      ->groupBy('category_id')
      ->orderByRaw('COUNT(*) DESC')
      ->value('category_id'); // Use value() to get the category_id directly

    // get the category details (label and icon)
    $mostPopularCategory = Category::find($mostPopularCategoryId);

    // Most Job Applied for 
    $mostAppliedJobId = Application::select('job_id')
      ->groupBy('job_id')
      ->orderByRaw('COUNT(*) DESC')
      ->value('job_id');

    $mostAppliedJob = Job::find($mostAppliedJobId);

    $applicationsCount = Application::where('job_id', $mostAppliedJobId)->count();

    // Most Company Post Jobs 
    $mostPopularCompanyId = Job::select('company_id')
      ->groupBy('company_id')
      ->orderByRaw('COUNT(*) DESC')
      ->value('company_id');

    $mostPopularCompany = Company::find($mostPopularCompanyId);

    $user = User::find($mostPopularCompany->user_id);


    // Now you can access the company logo and user's full name
    $companyLogo = $mostPopularCompany->logo_path; // Assuming the logo field exists in the Company model


    return view(
      'admin.dashboard',
      compact(
        'company',
        'jobsTotal',
        'applicationsTotal',
        'companyCount',
        'applicationsCount',
        'mostPopularCategory',
        'mostAppliedJob',
        'companyLogo',
        'user',
        'acceptedApplications'
      )
    );
  }


  public function create_account_form()
  {
    // Check if the user is a job poster (not admin)
    $user = Auth::user();

    // Fetch the company if it exists for a non-admin user
    $company = null;

    if ($user->role === 'job_poster') {
      $company = Company::where('user_id', $user->id)->first();
    }
    return view('admin.create_account', compact('company'));
  }


  public function create_account(Request $request)
  {
    $company = $request->company;
    // validation of the form data
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone' => 'required|string|max:10|unique:users',
      'password' => 'required|string|min:8|confirmed',
      'role' => 'required'
    ]);

    // Test by printing user data and password
    // create a new user
    $user = User::create([
      'first_name' => $validatedData['first_name'],
      'last_name' => $validatedData['last_name'],
      'email' => $validatedData['email'],
      'phone' => $validatedData['phone'],
      'password' => Hash::make($validatedData['password']),
      'role' => $validatedData['role']
    ]);


    // Send credentials email
    Mail::to($user->email)->send(new JobPosterCredentialsMail($user, $validatedData['password']));


    return redirect()->back();
  }


  public function getAllCompanies()
  {
    $companies = Company::with('user')->get();
    return view('admin.companies', compact('companies'));
  }

  public function getAllJobs()
  {
    // Fetch the company if it exists for a non-admin user
    $company = null;
    $user = Auth::user();


    if ($user->role === 'job_poster') {
      $company = Company::where('user_id', $user->id)->first();
    }

    $jobs = Job::with('company', 'category')->get();
    return view('admin.jobs', compact('jobs','company'));
  }
}
