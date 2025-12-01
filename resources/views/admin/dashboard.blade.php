@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard')
@section('main')
    <h5 class="card-title fw-semibold mb-4">Welcome {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} || 16:22
    </h5>
    <div class="row">
        <span class="my-3"
            style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px; margin-left:20px;font-size:15px">Statistics</span>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #212121; color: white;border-radius:20px">
                    <h5 class="card-title text-light">Jobs Total</h5>
                    <p class="card-text" style="font-size: 2rem;">+ {{ $jobsTotal }} <br> <span
                            style="font-size: 1.2rem">Jobs</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #2196f3 ;color: white;border-radius:20px">
                    <h5 class="card-title text-light">Applications</h5>
                    <p class="card-text" style="font-size: 2rem;">+ {{ $applicationsTotal }} <br> <span
                            style="font-size: 1.2rem">Applications</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #388e3c; color: white;border-radius:20px">
                    <h5 class="card-title text-light" style="text-wrap: nowrap">Accepted Apps</h5>
                    <p class="card-text" style="font-size: 2rem;">+{{ $acceptedApplications }} <br> <span
                            style="font-size: 1.2rem">Applications</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #d81b60; color: white;border-radius:20px">
                    <h5 class="card-title text-light">Companies</h5>
                    <p class="card-text" style="font-size: 2rem;"> +{{ $companyCount }} <br> <span
                            style="font-size: 1.2rem">Company</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center mt-4">
                <span class="my-2"
                    style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px">Most
                    Popular Category</span>
                <div class="card-body mt-2" style="background-color: #eeeeee; color: white;border-radius:20px">
                    <img src="{{ asset('storage/' . $mostPopularCategory->icon) }}" width="80" alt="category-icon"
                        srcset="">
                    <h5 class="card-title ">{{ $mostPopularCategory->label }}</h5>
                </div>
            </div>
        </div>

        {{-- Vertical Separator --}}
        <div class="col-md-1 d-flex justify-content-center align-items-center">
            <div style="border-left: 2px solid #ccc; height: 100%;"></div>
        </div>

        <div class="col-md-3">
            <div class="card text-center mt-4">
                <span class="my-2"
                    style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px">Most
                    Applied Job</span>
                <div class="card-body mt-5" style="background-color: #eeeeee; color: white;border-radius:20px">
                    <h5> {{ $mostAppliedJob->title }} </h5>
                    <span style="color: #212121">
                      with {{ $applicationsCount }} applications
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-1 d-flex justify-content-center align-items-center">
            <div style="border-left: 2px solid #ccc; height: 100%;"></div>
        </div>
        <div class="col-md-4">
          <div class="card text-center mt-4">
              <span class="my-2"
                  style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px">Most
                  Popular Company</span>
              <div class="card-body mt-2" style="background-color: #eeeeee; color: white;border-radius:20px">
                  <img src="{{ asset('storage/' . $companyLogo) }}" width="150" alt="category-icon" srcset="">
                  <span style="color: #212121">Represented By
                      <b>{{ $user->first_name . ' ' . $user->last_name }}</b></span>
              </div>
          </div>
      </div>

    </div>


@endsection
