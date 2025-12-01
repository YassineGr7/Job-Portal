@extends('layouts.master')
@section('title', 'Home')
@section('body')
  @include('layouts.slider')
  
@endsection

@section('includeCategories', true)
@section('includeFeaturedJobs', true)
@section('includeTestimonial', true)