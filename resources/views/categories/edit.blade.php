@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard | Edit a Category')
@section('main')
    {{-- <h5 class="card-title fw-semibold mb-4">Welcome ADMIN || 16:22</h5> --}}
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Jobs Categories List</h2>
            <div class="mt-3">
                <form method="POST" enctype="multipart/form-data" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="category" class="form-label">Category Label</label>
                        <input type="text" name="label" value="{{ $category->label }}" class="form-control"
                            placeholder="Category label" id="category" autofocus> <br>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Category Icon</label>
                        <input type="file" name="icon" class="form-control" id="icon">
                        @if ($category->icon)
                            <img src="{{ asset('storage/' . $category->icon) }}" alt="Current Icon" class="mt-2"
                                style="max-height: 100px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-20 py-8 fs-4 mb-5">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
