@extends('layouts.master')
@section('title', 'Home')
@section('body')
    @include('layouts.slider')

    <div class="container mt-5">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Job Details</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="single-job-items mb-30" style="border: 1px solid rgb(169, 167, 164); border-radius: 10px">
                    <div class="job-items">
                        <div class="company-img">
                            <div>
                                <img
                                      src="{{ asset('storage/' . $job->company->logo_path) }} " width="220"
                                      alt="">
                            </div>
                        </div>
                        <div class="job-tittle">
                            <div>
                                <h4>{{ $job->title }}</h4>
                            </div>
                            <ul class="mt-3" style="border-bottom: 1px solid grey ; padding-bottom:20px">
                                <li><i class="fas fa-solid fa-building"></i>{{ $job->company->name }}</li>
                                <li class="mx-3"><i class="fas fa-map-marker-alt"></i>{{ $job->company->location }}
                                </li>
                                <li class="mx-3"><img src="{{ asset('assets-main/img/icon/save-money.png') }}"
                                        class="mb-2 mx-2" width="20" alt="">{{ $job->salary }} DH</li>
                                <li class="mx-4 items-link">
                                    <a href="javascript:void(0)">{{ $job->type }}</a>
                                </li>
                            </ul>
                        </div>

                        {{-- Seperator --}}
                        <hr style="border-top: 1px solid rgb(0, 0, 0); margin: 20px 0;">

                        <div style="margin-left: 30px; border-bottom: 1px solid grey; padding-bottom: 10px">
                            <p>{!! $job->description !!}</p>
                        </div>
                        <div class="my-4 mx-3">
                          <a href="{{ route('apply.create', $job->id) }}" class="btn btn-primary">Apply for Job</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('includeCategories', false)
@section('includeFeaturedJobs', false)
@section('includeTestimonial', true)
