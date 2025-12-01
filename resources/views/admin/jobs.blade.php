@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard | Jobs List')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Jobs List</h2>
            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0 text-center">
                                <th scope="col" class="ps-0">Job Title</th>
                                <th scope="col" class="ps-0">Job Posted By</th>
                                <th scope="col" class="ps-0">Job Category</th>
                                <th scope="col" class="ps-0">Job Work Type</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach ($jobs as $job)
                                <tr class="text-center">
                                    <td>
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $job->title }}</a>
                                    </td>
                                    <td>
                                      {{ $job->company->name }}
                                    </td>

                                    <td>
                                      {{ $job->category->label }}
                                    </td>

                                    <td>
                                      {{ $job->type }}
                                    </td>
                                </tr>
        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
