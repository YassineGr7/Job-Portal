<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationStatusUpdate;
use App\Mail\InterviewInvitation;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{

  protected $guarded = [];

  public function index()
  {
    // Get the authenticated user (job poster)
    $jobPosterId = Auth::id();
    $company = Company::where('user_id', $jobPosterId)->first();


    $jobs = Job::whereHas('company', function ($query) use ($jobPosterId) {
      $query->where('user_id', $jobPosterId);  // Check for the job poster's user id in the company table
    })->withCount('applications')  // Count the number of applications for each job
      ->get();

    // Pass the data to the view
    return view('applications.index', compact('jobs', 'company'));
  }




  public function show($id)
  {
    $userId = Auth::id();

    $company = Company::where('user_id', operator: $userId)->first();

    $job = Job::with('applications.user')->findOrFail($id);

    $statuses = ['Pending', 'invited to interview', 'Accepted', 'Rejected'];

    return view('applications.show', compact('job', 'company', 'statuses'));
  }




  public function updateStatus(Request $request, $applicationId)
  {
    // Validate incoming status
    $request->validate([
      'status' => 'required|string|in:Pending,invited to interview,Accepted,Rejected',
    ]);

    // Find the application
    $application = Application::findOrFail($applicationId);

    // Update the status
    $application->status = $request->status;

    // dd($request->status);

    $application->save();

    // Get job title and company name for the email
    $jobTitle = $application->job->title;
    $companyName = $application->job->company->name;

    // Check if the status is 'Accepted' or 'Rejected' to send an email
    if ($request->status === 'Accepted' || $request->status === 'Rejected') {
      // Send email to the candidate about the status update
      Mail::to($application->user->email)->send(new ApplicationStatusUpdate($application, $jobTitle, $companyName, $request->status));
  }


    // Redirect back with a success message
    return redirect()->back()->with('success', 'Status updated successfully!');
  }



  public function updateInterviewDate(Request $request, $applicationId)
  {
    // Validate the request
    $request->validate([
      'interview_date' => 'required|date_format:Y-m-d\TH:i', // Use the correct date format for datetime-local input
    ]);

    // Find the application by ID
    $application = Application::findOrFail($applicationId);

    // Ensure the status is "invited to interview" before allowing the interview date to be set
    if ($application->status !== 'invited to interview') {
      return back()->with('error', 'Cannot set interview date unless the candidate is invited to interview.');
    }

     // Get job title and company name for the email
     $jobTitle = $application->job->title;
     $companyName = $application->job->company->name;

    // Update the interview date
    $application->interview_date = $request->input('interview_date');
    $application->save();

     // Format the interview date for the email
     $formattedInterviewDate = Carbon::parse($application->interview_date)->format('F j, Y \a\t g:i A');

    // Send an email to the candidate with interview details
    Mail::to($application->user->email)->send(new InterviewInvitation($application, $jobTitle, $companyName, $formattedInterviewDate));

    // Redirect back with success message
    return back()->with('success', 'Interview date updated successfully.');
  }


  public function applyForm($id)
  {
    $job = Job::find($id);
    return view('applications.apply', compact('job'));
  }



  public function storeApply(Request $request, $id)
  {
    $request->validate([
      'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // Resume validation (PDF, DOC, DOCX)
      'cover_letter' => 'nullable|string',
    ]);

    $user = Auth::user();  // get the user authentified
    $job = Job::findOrFail($id); // get the job 

    // Store resume file in storage (public disk)
    $resumePath = $request->file('resume')->store('resumes', 'public');

    // Save resume to resumes table
    $resume = new Resume();
    $resume->path = $resumePath;
    $resume->save();

    // Register the job application in applications table
    $application = new Application();
    $application->user_id = $user->id;
    $application->job_id = $job->id;
    $application->resume_id = $resume->id;
    $application->lettre_motivation = $request->input('cover_letter');
    $application->save();

    return redirect()->back()->with('success', 'Application submitted successfully!');
  }

  public function getShortListedCandidates()
  {
    $userId = Auth::id();

    $company = Company::where('user_id', operator: $userId)->first();

    // Ensure the company exists
    if (!$company) {
      return redirect()->back()->with('error', 'No company found for the user.');
    }

    // Fetch all shortlisted (accepted) candidates along with the job they applied for
    $shortListedCandidates = Application::with('user', 'job') // Load related user and job models
      ->where('status', 'accepted')->whereHas('job', function ($query) use ($company) {
        // Only select applications for jobs posted by the user's company
        $query->where('company_id', $company->id);
      })
      ->get();

    return view('jobposter.shortlisted.index', compact('shortListedCandidates', 'company'));
  }
}
