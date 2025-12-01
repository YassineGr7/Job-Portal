<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\frontOffice\JobController;
use App\Http\Controllers\frontOffice\ContactController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\JobPosterController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public Routes
Route::get('/', [GeneralController::class, 'index'])->name('home');
Route::get('/about-us', [GeneralController::class, 'about'])->name('about');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.send')->middleware('auth');

Route::get('/jobs', [JobController::class, 'index'])->name('frontend.jobs.index');
Route::get('/jobs/filter', [JobController::class, 'filterJobs'])->name('frontend.jobs.filter');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('frontend.jobs.show');


// Authentication Routes
Route::prefix('auth')->group(function () {
  Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
  Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
  Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
  Route::post('/register', [AuthController::class, 'register'])->name('registerUser');
  Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});



// User Routes (Protected)
Route::middleware(['auth'])->group(function () {
  Route::get('/apply/{id}', [ApplicationController::class, 'applyForm'])->name('apply.create');
  Route::post('/apply/{id}', [ApplicationController::class, 'storeApply'])->name('apply.store');
});




// Admin Routes (Protected)
Route::prefix('admin/dashboard')->middleware(['auth'])->group(function () {

  // Dashboard
  Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

  // Account Management
  Route::get('/create_account', [AdminController::class, 'create_account_form'])->name('admin.dashboard.create');
  Route::post('/create_account', [AdminController::class, 'create_account'])->name('admin.dashboard.store');

  // Company Management
  Route::get('/companies', [AdminController::class, 'getAllCompanies'])->name('admin.dashboard.companies');

  // Job Management
  Route::get('/jobs', [AdminController::class, 'getAllJobs'])->name('admin.dashboard.jobs');

  // Admin Account Settings
  Route::get('/account/settings', [GeneralController::class, 'accountSettings'])->name('admin.accountSettings');
  Route::put('/account/settings', [GeneralController::class, 'accountUpdate'])->name('admin.accountUpdate');

  // Categories
  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/add', [CategoryController::class, 'addForm'])->name('categories.add');
    Route::post('/add', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
  });
});



// Job Poster Routes (Protected)
Route::prefix('jobposter/dashboard')->middleware(['auth'])->group(function () {

  // Dashboard
  Route::get('/', [JobPosterController::class, 'index'])->name('job_poster.dashboard');

  // Company Management
  Route::get('/company', [JobPosterController::class, 'companyProfile'])->name('jobposter.company_profile');
  Route::post('/company/add', [JobPosterController::class, 'addCompanyProfile'])->name('jobposter.company_profile.add');
  Route::put('/company/update/{company}', [JobPosterController::class, 'updateCompanyProfile'])->name('jobposter.company_profile.update');

  // Jobs Management
  Route::prefix('jobs')->group(function () {
    Route::get('/', [JobsController::class, 'index'])->name('jobs.index');
    Route::get('/create', [JobsController::class, 'create'])->name('jobs.create');
    Route::post('/create', [JobsController::class, 'store'])->name('jobs.store');
    Route::get('/edit/{id}', [JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('/edit/{id}', [JobsController::class, 'update'])->name('jobs.update');
    Route::delete('/delete/{id}', [JobsController::class, 'destroy'])->name('jobs.delete');

    // Applications
    Route::get('/shortlisted', [ApplicationController::class, 'getShortListedCandidates'])->name('jobs.shortlisted');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('apply.index');
    Route::get('/applications/details/{id}', [ApplicationController::class, 'show'])->name('apply.show');
    Route::post('/applications/{application}/update-status', [ApplicationController::class, 'updateStatus'])->name('apply.updateStatus');
    Route::post('/applications/{application}/interview-date', [ApplicationController::class, 'updateInterviewDate'])->name('apply.updateInterviewDate');
  });

  // Job Poster Account Settings
  Route::get('/account/settings', [GeneralController::class, 'accountSettings'])->name('job_poster.accountSettings');
  Route::put('/account/settings', [GeneralController::class, 'accountUpdate'])->name('job_poster.accountUpdate');
});
