@extends('layouts.dashboard.master')
@section('title', 'ADMIN Dashboard | Companies List')
@section('main')
    <div class="container">
        <div class="row">
            <h2 class="card-title fw-semibold mb-2">Companies List</h2>
            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0 text-center">
                                <th scope="col" class="ps-0">Company Logo</th>
                                <th scope="col" class="ps-0">Company Name</th>
                                <th scope="col" class="ps-0">Company Representer</th>
                                <th scope="col" class="ps-0">Company Email</th>
                                <th scope="col" class="ps-0">Company Location</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($companies as $company)
                                <tr class="text-center">
                                    <td scope="row" class="ps-0 fw-medium">
                                      <img src="{{ asset('storage/' . $company->logo_path) }}" width="100" alt="">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                            class="link-primary text-dark fw-medium d-block">{{ $company->name }}</a>
                                    </td>
                                    <td>
                                      {{ $company->user->first_name . ' ' . $company->user->last_name}}
                                    </td>

                                    <td>
                                      {{ $company->email}}
                                    </td>

                                    <td>
                                      {{ $company->location }}
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
