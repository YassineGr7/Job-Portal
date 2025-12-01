@extends('layouts.dashboard.master')
@section('title', 'Dashboard | Post New Job')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Create a New Job</h2>
            <div class="mt-3">
                <form method="POST" action="{{route('jobs.update', $job->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" value="{{$job->title}}" name="title" class="form-control" id="jobTitle"
                            autofocus> 
                    </div>
                    <div class="mb-3">
                        <label for="jobDesc" class="form-label">Job Description</label>
                        <textarea  id="jobDesc"   name="description" class="form-control"   >
                        {!! $job->description !!}
                        </textarea>
                    </div>
                    <div class="mb-3">
                              <label for="jobCategory" class="form-label">Job Category</label>
                              <select name="category" class="form-control" id="jobCategory"> 
                                <option>select a Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{$job->category_id == $category->id ? 'selected' : ''}}>{{ $category->label }}</option>
                                @endforeach
                              <select>
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Work type</label>
                      <select name="type" class="form-control"  >
                        <option value="">Select the Work Type</option>
                        <option value="full-time" {{$job->type == 'full-time' ? 'selected' : ''}}>Full Time</option>
                        <option value="part-time" {{$job->type == 'part-time' ? 'selected' : ''}}>Part Time</option>
                        <option value="from-home" {{$job->type == 'from-home' ? 'selected' : ''}}>From Home</option>  
                      </select> 
                   </div>
                  <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" value="{{$job->salary}}"  name="salary" class="form-control" id="salary" /> 
                  </div>
                  <div class="mb-3">
                    <label for="date" class="form-label">Expiration Date</label>
                    <input type="date" value="{{ $job->expires_at ? \Carbon\Carbon::parse($job->expires_at)->format('Y-m-d') : '' }}" name="exp_date" class="form-control" id="date" />
                  </div>
                  <button type="submit" class="btn btn-primary w-20 mt-3 py-8 fs-4 mb-5">Update Job</button>
                </form>
              </div>
        </div>
    </div>
@endsection
