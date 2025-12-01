<?php

namespace App\Http\Controllers\frontOffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function index()
  {
    $jobs = Job::orderBy('created_at', 'desc')->get();
    $categories = Category::all();
    $jobsTypes = Job::select('type')->distinct()->get();
    $companies = Company::select('id', 'name')->distinct()->get();


    return view('pages.jobs.index', compact('jobs', 'categories', 'jobsTypes', 'companies'));
  }

  public function show($id)
  {
    $job = Job::with('company')->findOrFail($id);
    return view('pages.jobs.show', compact('job'));
  }


  public function filterJobs(Request $request)
  {
    // start with a base query for job model
    $query = Job::query();

    // Collect search conditions to pass them to the view
    $searchConditions = [];


    // filter by keyword 
    if ($request->filled('keyword')) {
      $keyword = $request->input('keyword');
      $query->where(function ($q) use ($keyword) {
        $q->where('title', 'like', '%' . $keyword . '%')
          ->orWhere('description', 'like', '%' . $keyword . '%');
      });
      $searchConditions['keyword'] = $keyword;
    }

    // filter by company name 
    if ($request->filled('companyId')) {
      $companyId = $request->input('companyId');
      $query->where('company_id', $companyId);
      $company = Company::find($companyId);
      $searchConditions['company'] = $company->name;

    }

    // filter by category 
    if ($request->filled('category')) {
      $categoryId = $request->input('category');
      $query->where('category_id', $categoryId);
      $category = Category::find($categoryId);
      $searchConditions['category'] = $category->label;
    }

    // filter by job type (multiple choices can be selected) 
    if ($request->filled('job_type')) {
      $jobTypes = $request->input('job_type');
      $query->whereIn('type', $jobTypes);
      $searchConditions['job_type'] = implode(', ', $jobTypes);
    }


    // execute the query and get the filtred results
    $jobs = $query->get();
    $categories = Category::all();
    $jobsTypes = Job::select('type')->distinct()->get();
    $companies = Company::select('id', 'name')->distinct()->get();


    // Pass the filtered jobs to the view
    return view('pages.jobs.index', compact('jobs', 'categories', 'jobsTypes', 'companies', 'searchConditions'));
  }
}
