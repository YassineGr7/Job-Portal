@extends('layouts.dashboard.master')
@section('title', 'Dashboard | Company Profile')
@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h5 class="card-title fw-semibold mb-4">Company profile</h5>
    <div class="container-fluid">
        @if ($company)
            <form action="{{ route('jobposter.company_profile.update', $company->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <label for="company_name">Company name</label>
                    <input type="text" name="company_name" value="{{ $company->name }}" class="form-control">
                </div>

                <div class="my-3">
                    <label for="company_desc">Description</label>
                    <textarea class="form-control" name="company_desc">{{ $company->description }}</textarea>
                </div>

                <div class="my-3">
                    <label>Logo</label>
                    <input type="file" class="form-control" name="company_logo"></input>
                    @if ($company && $company->logo_path)
                        <div class="my-3">
                            <img src="{{ asset('storage/' . $company->logo_path) }}" alt="Company Logo"  width="200">
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 my-2">
                        <label for="company_desc">Email</label>
                        <input type="email" name="company_email" value="{{ $company->email }}" class="form-control">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="company_desc">Location</label>
                        <input type="text" name="company_location" value="{{ $company->location }}" class="form-control">
                    </div>
                </div>

                <div class="my-2">
                    <label for="company_desc">Web site URL</label>
                    <input type="url" name="company_url" value="{{ $company->website_url }}" class="form-control">
                </div>


                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @else
            <form action="{{ route('jobposter.company_profile.add') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="my-2">
                    <label for="company_name">Company name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="my-3">
                    <label for="company_desc">Description</label>
                    <textarea class="form-control" name="company_desc"></textarea>
                </div>

                <div class="my-3">
                    <label>Logo</label>
                    <input type="file" class="form-control" name="company_logo"></input>
                </div>

                <div class="row">
                    <div class="col-md-6 my-2">
                        <label for="company_desc">Email</label>
                        <input type="email" name="company_email" class="form-control">
                    </div>
                    <div class="col-md-6 my-2">
                        <label for="company_desc">Location</label>
                        <input type="text" name="company_location" class="form-control">
                    </div>
                </div>

                <div class="my-2">
                    <label for="company_desc">Web site URL</label>
                    <input type="url" name="company_url" class="form-control">
                </div>

                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @endif
    </div>
@endsection
