@extends('layouts.dashboard.master')
@section('title', 'Dashboard')
@section('main')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h5 class="card-title fw-semibold mb-4">Welcome {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} || 16:22
    </h5>
    <div class="row">
        <span class="my-3"
            style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px; margin-left:20px;font-size:15px">Statistics</span>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #212121; color: white;border-radius:20px">
                    <h5 class="card-title text-light">Jobs Posted</h5>
                    <p class="card-text" style="font-size: 2rem;">+ {{ $totalJobsPosted }} <br> <span
                            style="font-size: 1.2rem">Jobs</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #2196f3 ;color: white;border-radius:20px">
                    <h5 class="card-title text-light">Applications</h5>
                    <p class="card-text" style="font-size: 2rem;">+ {{ $applicationsReceived }} <br> <span
                            style="font-size: 1.2rem">Applications</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body" style="background-color: #d81b60; color: white;border-radius:20px">
                    <h5 class="card-title text-light">Rejected Apps</h5>
                    <p class="card-text" style="font-size: 2rem;"> +{{ $rejectedApplications }} <br> <span
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
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center mt-2">
                <span class="my-3"
                    style="border-left: 2px solid rgb(15, 126, 230);color:#212121; font-weight: 600 ; padding:10px 10px">Most
                    Popular Category</span>
                @if ($category)
                    <div class="card-body mt-5" style="background-color: #eeeeee; color: white;border-radius:20px">
                        <img src="{{ asset('storage/' . $category->icon) }}" width="80" alt="category-icon"
                            srcset="">
                        <h5 class="card-title ">{{ $category->label }}</h5>
                    </div>
                @else
                    <div class="card text-center mt-2">
                        <span>
                            <p>No popular category found.</p>
                        </span>
                    </div>
                @endif
            </div>

        </div>

        {{-- Vertical Separator --}}
        <div class="col-md-1 d-flex justify-content-center align-items-center">
            <div style="border-left: 2px solid #ccc; height: 100%;"></div>
        </div>

        {{-- Job Table --}}
        <div class="col-md-8">
            <div class="table-responsive mt-2">
                <table class="table text-nowrap align-middle mb-0">
                    <caption
                        style="caption-side: top; text-align: left; font-weight: 600; padding-left: 20px; border-left: 2px solid rgb(15, 126, 230); color: #212121;">
                        Most Applied Jobs
                    </caption>
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col">Job Title</th>
                            <th scope="col" class="text-center">Job Category</th>
                            <th scope="col" class="text-center">Salary</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($mostAppliedJob as $job)
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <a href="javascript:void(0)"
                                        class="link-primary text-dark fw-medium d-block">{{ $job->title }}</a>
                                </th>
                                <td class="text-center">{{ $job->category->label }}</td>
                                <td class="text-center">{{ $job->salary }} DH</td>
                                <td>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info">Edit</a>
                                        <button type="submit" onclick="return confirm('Are you sure !?')"
                                            class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">There isn't any Job Of your company</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
