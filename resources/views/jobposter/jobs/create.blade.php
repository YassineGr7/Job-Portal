@extends('layouts.dashboard.master')
@section('title', 'Dashboard | Post New Job')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Create a New Job</h2>
            <div class="mt-3">
                <form method="POST" action="{{ route('jobs.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" name="title" class="form-control" id="jobTitle"
                            autofocus> 
                    </div>
                    <div class="mb-3">
                        <label for="jobDesc" class="form-label">Job Description</label>
                        <textarea  id="jobDesc"  name="description" class="form-control"   >
                        </textarea>
                    </div>
                    <div class="mb-3">
                              <label for="jobCategory" class="form-label">Job Category</label>
                              <select name="category" class="form-control" id="jobCategory"> 
                                <option>select a Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->label }}</option>
                                @endforeach
                              <select>
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Work type</label>
                      <select  name="type" class="form-control"  >
                        <option value="">Select the Work Type</option>
                        <option value="full-time">Full Time</option>
                        <option value="part-time">Part Time</option>
                        <option value="from-home">From Home</option>  
                      </select> 
                   </div>
                  <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number"  name="salary" class="form-control" id="salary" /> 
                  </div>

                  <div class="mb-3">
                    <label for="date" class="form-label">Expiration Date</label>
                    <input type="date"  name="exp_date" class="form-control" id="date" /> 
                  </div>
                  <button type="submit" class="btn btn-primary w-20 mt-3 py-8 fs-4 mb-5">Create Job</button>
                </form>
              </div>
        </div>
    </div>
@endsection
