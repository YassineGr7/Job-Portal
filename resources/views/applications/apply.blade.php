@extends('layouts.master')
@section('title', 'Home')
@section('body')
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="section-tittle text-center">
                <span style="display: inline">Apply For Job : </span> <span style="font-weight: bolder;color: #28395a;display: inline; margin-left:7px">{{$job->title}}</span>
                <h2 class="mt-4">Filed this Form please</h2>
            </div>
        </div>
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="border: 1px solid grey;border-radius: 15px; padding:20px">
            <form action="{{route('apply.store',$job->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="resume">Upload Resume</label>
                    <input type="file" name="resume" id="resume" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cover_letter">Lettre de motivation (Optional)</label>
                    <textarea name="cover_letter" id="cover_letter" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Apply for job</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>

    </div>

@endsection

@section('includeCategories', false)
@section('includeFeaturedJobs', false)
@section('includeTestimonial', true)
