<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
  public function index()
  {
    $user = Auth::user(); // Get the authenticated user
    $company = Company::where('user_id', $user->id)->first(); // Get the company associated with the user

    if ($company) {
      // Get only the jobs posted by the authenticated user's company
      $jobs = Job::where('company_id', $company->id)->get()->map(function ($job) {
        $job->formatted_expires_at = Carbon::parse($job->expires_at)->format('d M Y');
        return $job;
      });

      return view('jobposter.jobs.index', compact('jobs', 'company')); // Pass the jobs and company to the view
    }

    // Handle case if no company is found for the user
    return redirect()->back()->with('error', 'Company not found for this user.');
  }

  public function create(Request $request)
  {
    $categories = Category::all();
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    return view('jobposter.jobs.create', compact('categories', 'company'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required',
      'category' => 'required',
      'type' => 'required',
      'salary' => 'required|numeric',
      'exp_date' => 'required|date'
    ]);

    $expDate = Carbon::parse($validatedData['exp_date'])->format('Y-m-d');

    // Get the logged-in user's company
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    Job::create([
      'title' => $validatedData['title'],
      'description' => $validatedData['description'],
      'category_id' => $validatedData['category'],
      'company_id' => $company->id,
      'type' => $validatedData['type'],
      'salary' => $validatedData['salary'],
      'expires_at' => $expDate
    ]);


    return redirect()->back()->with('company', $company);
  }

  public function edit($id)
  {
    $job = Job::findOrFail($id);


    $categories = Category::all();
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    return view('jobposter.jobs.edit', compact('job', 'categories', 'company'));
  }

  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required',
      'category' => 'required',
      'type' => 'required',
      'salary' => 'required|numeric',
      'exp_date' => 'required|date'
    ]);

    $expDate = Carbon::parse($validatedData['exp_date'])->format('Y-m-d');

    $job = Job::findOrFail($id);

    // Get the logged-in user's company
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    $job->update([
      'title' => $validatedData['title'],
      'description' => $validatedData['description'],
      'category_id' => $validatedData['category'],
      'company_id' => $company->id,
      'type' => $validatedData['type'],
      'salary' => $validatedData['salary'],
      'expires_at' => $expDate
    ]);

    return redirect()->route('jobs.index')->with('company', $company);

  }

  public function destroy($id)
  {
    // Find the job by ID
    $job = Job::findOrFail($id);

    // Check if the logged-in user is allowed to delete the job (i.e., belongs to their company)
    $user = Auth::user();
    $company = Company::where('user_id', $user->id)->first();

    $job->delete();

    return redirect()->back();
  }
}
