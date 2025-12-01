@extends('layouts.dashboard.master')
@section('title', 'Dashboard | Jobs List')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Jobs List</h2>
            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0 ">
                                <th scope="col">Job Title</th>
                                <th scope="col" class="text-center">Company Name</th>
                                <th scope="col" class="text-center">Job Category</th>
                                <th scope="col" class="text-center">Work Type</th>
                                <th scope="col" class="text-center">Salary</th>
                                <th scope="col" class="text-center">Expired Date</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($jobs as $job)
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium ">
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $job->title }}</a>
                                    </th>
                                    @if($company)
                                    <td class="text-center">
                                      {{ $company->name }}
                                    </td>
                                    @endif
                                    <td class="text-center">
                                      {{ $job->category->label }}
                                    </td>
                                    <td class="text-center">
                                      {{ $job->type }}
                                    </td>
                                    <td class="text-center">
                                      {{ $job->salary }} DH
                                    </td>
                                    <td class="text-center">
                                      {{ $job->formatted_expires_at }}
                                    </td>
                                    <td>
                                        <form action="{{ route('jobs.delete', $job->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('jobs.edit', $job->id)}}"
                                                class="btn btn-info">Edit</a>
                                            <button type="submit" onclick="return confirm('Are you sure !?')"
                                                class="btn btn-warning">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">There isn't any Job Of your company</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
