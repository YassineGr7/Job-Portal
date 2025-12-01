@extends('layouts.master')
@section('title', 'All Jobs')
@section('body')
    @include('layouts.slider')
    <div class="container mt-5">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-4 ">

                <!-- Job Category Listing start -->
                <div class="job-category-listing mb-50">
                    <div class="row">
                        <div class="col-12" style="padding: 10px">
                            <div class="small-section-tittle2 mb-45">
                                <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
                                        <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                            d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                    </svg>
                                </div>
                                <h4>Filter Jobs</h4>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('frontend.jobs.filter') }}" method="GET">
                        {{-- @csrf --}}
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Search by keywords</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <input type="text" name="keyword" value="{{ old('keyword', request()->keyword) }}"
                                    placeholder="Ex: Developper ...." class="form-control">
                            </div>
                        </div>
                        <div style="height: 30px; background-color: #fdfdfd"></div>

                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Company</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <select name="companyId">
                                    <option value="">All Companies</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ old('companyId', request()->companyId) == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="height: 70px; background-color: #fdfdfd"></div>

                        <!-- single one -->
                        <div class="single-listing">
                            <div class="small-section-tittle2">
                                <h4>Job Category</h4>
                            </div>
                            <!-- Select job items start -->
                            <div class="select-job-items2">
                                <select name="category">
                                    <option value="">All Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category', request()->category) == $category->id ? 'selected' : '' }}>
                                            {{ $category->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--  Select job items End-->
                            <!-- select-Categories start -->
                            <div class="select-Categories pt-80 pb-50">
                                <div class="small-section-tittle2">
                                    <h4>Job Type</h4>
                                </div>
                                @foreach ($jobsTypes as $jobType)
                                    <label class="container">{{ $jobType->type }}
                                        <input type="checkbox" name="job_type[]" value="{{ $jobType->type }}"
                                            {{ is_array(old('job_type', request()->job_type)) && in_array($jobType->type, old('job_type', request()->job_type)) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                            <!-- select-Categories End -->

                        </div>


                        <div class="single-listing" style="margin-bottom: 40px">
                            <button type="submit" class="btn btn-outline my-4">Filter</button>
                        </div>
                    </form>


                </div>
                <!-- Job Category Listing End -->
            </div>
            <div class="col-xl-9">
                @if ($jobs->isEmpty())
                    <p>No jobs found based on your search criteria.</p>
                @else
                    {{-- Toast Searche --}}

                    <div class="toast-container d-flex justify-content-between align-items-center">
                        @if (!empty($searchConditions))
                            <div class="mb-3">
                                <h5>Search conditions:</h5>
                                @foreach ($searchConditions as $value)
                                    <span class="badge badge-secondary mx-1">{{ $value }}</span>
                                @endforeach
                            </div>
                            <!-- Button to clear the search and go back to jobs index -->
                            <div class="d-flex justify-content-end">
                              <span class="badge badge-primary mx-1"  style="padding: 16px"> 
                                 <a href="{{ route('frontend.jobs.index') }}">Clear Search</a>
                              </span>
                            </div>
                        @endif
                    </div>

                    @foreach ($jobs as $job)
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30 my-2"
                            style="border: 1px solid rgb(169, 167, 164); border-radius: 10px">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{ route('frontend.jobs.show', $job->id) }}"><img
                                            src="{{ asset('storage/' . $job->company->logo_path) }} " width="120"
                                            alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{ route('frontend.jobs.show', $job->id) }}">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <ul class="mt-3">
                                        <li><i class="fas fa-solid fa-building"></i>{{ $job->company->name }}</li>
                                        <li class="mx-3"><i
                                                class="fas fa-map-marker-alt"></i>{{ $job->company->location }}
                                        </li>
                                        <li class="mx-3"><img src="{{ asset('assets-main/img/icon/save-money.png') }}"
                                                class="mb-2 mx-2" width="20" alt="">{{ $job->salary }} DH</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="javascript:void(0)">{{ $job->type }}</a>
                                <span
                                    style="color: grey; font-style: italic">{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <!-- single-job-content -->
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection

@section('includeCategories', false)
@section('includeFeaturedJobs', false)
@section('includeTestimonial', true)
