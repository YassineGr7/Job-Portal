@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard | Create Account')
@section('main')
    {{-- <h5 class="card-title fw-semibold mb-4">Welcome ADMIN || 16:22</h5> --}}
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Create Account</h2>
            <div class="mt-3">
                <form method="POST" action="{{ route('admin.dashboard.store') }}">
                    @csrf
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <input type="text" placeholder="First Name" name="first_name" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="text" placeholder="Last Name" name="last_name" class="form-control">
                      </div>          
                    </div>
                    <div class="mb-3">
                      <input type="email" placeholder="example@gmail.com" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                      <input type="text" name="phone" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="mb-3">
                      <input type="password" placeholder="************"  name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                      <input type="password" placeholder="confirme the password"  name="password_confirmation" class="form-control">
                    </div>
                    <div class="mb-3">
                      <select name="role" class="form-control" >
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="job_poster">Job Poster</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-20 py-8 fs-4 mb-5">Create Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection
