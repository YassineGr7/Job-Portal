<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AttachCompany
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // Check if the user is a job poster (not admin)
    $user = Auth::user();

    // Fetch the company if it exists for a non-admin user
    $company = null;

    
    if ($user && $user->role === 'job_poster') {
      $company = Company::where('user_id', $user->id)->first();
    }

    $request->merge(['company' => $company]);
    return $next($request);
  }
}
