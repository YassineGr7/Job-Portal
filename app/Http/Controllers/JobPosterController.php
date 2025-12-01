<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobPosterController extends Controller
{
  public function index(Request $request)
  {

    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    // Check if the company exists for the user
    if (!$company) {
      // Redirect to the company profile form if no company exists
      return redirect()->route('jobposter.company_profile')->with('error', 'Please enter your company information before accessing the dashboard.');
    }

    // Total Jobs Posted
    $totalJobsPosted = Job::where('company_id', $company->id)->count();

    // Number of Applications Received
    $applicationsReceived = Application::whereHas('job', function ($query) use ($company) {
      $query->where('company_id', $company->id);
    })->count();

    // Most Applied Job
    $mostAppliedJob = Job::withCount('applications')
      ->where('company_id', $company->id)
      ->orderBy('applications_count', 'desc')->get();



    // Initialize $category to null in case no popular category is found
    $category = null;

    // Most Popular Job Category
    $mostPopularCategory = Job::where('company_id', $company->id)
      ->select('category_id')
      ->groupBy('category_id')
      ->orderByRaw('COUNT(*) DESC')
      ->first();

    if ($mostPopularCategory) {
      $category = Category::find($mostPopularCategory->category_id);
    }

    // Rejected Applications
    $rejectedApplications = Application::where('status', 'rejected')
      ->whereHas('job', function ($query) use ($company) {
        $query->where('company_id', $company->id);
      })->count();

    // Accepted Applications
    $acceptedApplications = Application::where('status', 'accepted')
      ->whereHas('job', function ($query) use ($company) {
        $query->where('company_id', $company->id);
      })->count();


    return view(
      'jobposter.dashboard',
      compact(
        'company',
        'totalJobsPosted',
        'applicationsReceived',
        'mostAppliedJob',
        'mostPopularCategory',
        'rejectedApplications',
        'acceptedApplications',
        'category'
      )
    );
  }

  public function companyProfile(Request $request)
  {
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    // dd($company);
    return view('jobposter.company_profile', compact('company'));
  }

  public function addCompanyProfile(Request $request)
  {
    // validation of the form data
    $validatedData = $request->validate([
      'company_name' => 'required|string|max:255',
      'company_desc' => 'required',
      'company_email' => 'required|string|email|max:255|unique:companies,email',
      'company_location' => 'required|string',
      'company_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
      'company_url' => 'required'
    ]);

    // handle file upload
    $logo = null;

    if ($request->hasFile('company_logo')) {
      // Generate a clear name for the logo (e.g., company_name-timestamp.extension)
      $filename = $validatedData['company_name'] . '-' . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
      $logo = $request->file('company_logo')->storeAs('logos', $filename, 'public');
    }

    //create a new company
    Company::create([
      'name' => $validatedData['company_name'],
      'user_id' => Auth::user()->id,
      'description' => $validatedData['company_desc'],
      'location' => $validatedData['company_location'],
      'email' => $validatedData['company_email'],
      'website_url' => $validatedData['company_url'],
      'logo_path' => $logo // store the logo path
    ]);


    return redirect()->back();
  }


  public function updateCompanyProfile(Request $request)
  {
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    if (!$company) {
      return redirect()->back()->withErrors(['error' => 'Company not found']);
    }

    // Validate form data including the company logo.
    $validatedData = $request->validate([
      'company_name' => 'required|string|max:255',
      'company_desc' => 'required',
      'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'company_email' => [
        'required',
        'string',
        'email',
        'max:255',
        Rule::unique('companies', 'email')->ignore($company->id),
      ],
      'company_location' => 'required|string',
      'company_url' => 'required'
    ]);

    // Default to the existing logo path.
    $logo = $company->logo_path;

    // If a new file is uploaded, overwrite the existing logo path.
    if ($request->hasFile('company_logo')) {
      // Generate a clear name for the new logo (e.g., company_name-timestamp.extension).
      $filename = $validatedData['company_name'] . '-' . time() . '.' . $request->file('company_logo')->getClientOriginalExtension();
      // Store the new logo and update the path.
      $logo = $request->file('company_logo')->storeAs('logos', $filename, 'public');
    }

    // Update company details.
    $company->update([
      'name' => $validatedData['company_name'],
      'user_id' => $user->id,
      'description' => $validatedData['company_desc'],
      'logo_path' => $logo,  // Update the logo path.
      'location' => $validatedData['company_location'],
      'email' => $validatedData['company_email'],
      'website_url' => $validatedData['company_url']
    ]);

    return redirect()->back()->with('success', 'Company profile updated successfully');
  }
}
