@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard | Categories List')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Jobs Categories List</h2>
            <div class="mt-3">
                <div class="table-responsive">
                    <a href="{{ route('categories.add') }}" class="btn btn-primary mb-2" style="float: right">Add New
                        Category</a>
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0 text-center">
                                <th scope="col" class="ps-0">#</th>
                                <th scope="col" class="text-center">Category Label</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($categories as $category)
                                <tr class="text-center">
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">{{ $category->id }}</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $category->label }}</a>
                                    </td>
                                    <td>
                                      <form action="{{route('categories.delete', $category->id)}}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                      <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info">Edit</a>
                                      <button type="submit" onclick="return confirm('Are you sure !?')" class="btn btn-warning">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                              <td colspan="3" class="text-center">There isn't any Category</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
