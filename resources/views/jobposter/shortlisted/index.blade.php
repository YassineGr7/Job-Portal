@extends('layouts.dashboard.master')
@section('title', 'Dashboard | Applications List')

@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-5" style="height: 100vh">
        <!-- Section Title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <h2>Shortlisted Candidates</h2>
                </div>
            </div>
        </div>

        <!-- Applications List -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="mt-3">
                    <div>
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-primary border-0">
                                    <th scope="col">Candidate Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Phone</th>
                                    <th scope="col" class="text-center">Accepted for poste of</th>
                                    {{-- <th scope="col" class="text-center">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($shortListedCandidates as $candidat)
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium ">
                                            <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">
                                                {{ $candidat->user->first_name . ' ' . $candidat->user->last_name }}
                                            </a>
                                        </th>
                                        <td class="text-center">{{ $candidat->user->email }}</td>
                                        <td class="text-center">{{ $candidat->user->phone }}</td>
                                        <td class="text-center">{{ $candidat->job->title }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
