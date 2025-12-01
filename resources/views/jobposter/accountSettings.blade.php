@extends('layouts.dashboard.master')
@section('title', 'Dashboard | User Profile')
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

    <h5 class="card-title fw-semibold mb-4">User profile</h5>
    <div class="container-fluid">
        <form action="{{ route('job_poster.accountUpdate') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 my-2">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
                </div>
                <div class="col-md-6 my-2">
                    <label for="first_name">Last Name</label>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                </div>
            </div>

            <div class="my-2">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <!-- Password fields -->
            <div class="my-3">
                <label for="password">New Password (leave empty if you don't want to change it):</label>
                <input type="password" name="password" placeholder="*************" id="password" class="form-control">
            </div>


            <div class="my-3">
                <label for="password_confirmation">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>


            <div class="row">
                <div class="col-md-6 my-2">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                </div>

                <div class="col-md-6 my-2">
                    <label for="role">Role</label>
                    <input type="text" name="role" value="{{ $user->role }}" disabled class="form-control">
                </div>
            </div>





            <div class="my-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
@endsection
