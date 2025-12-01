@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard')
@section('main')
<h5 class="card-title fw-semibold mb-4">Welcome {{Auth::user()->first_name . ' ' .Auth::user()->last_name}} || 16:22</h5>
@endsection