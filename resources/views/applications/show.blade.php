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
                    <h2>Applications for {{ $job->title }}</h2>
                </div>
            </div>
        </div>

        <!-- Applications List -->
        <div class="row justify-content-center">
            <div class="col-xl-12">
                @if ($job->applications->isEmpty())
                    <p>No applications found for this job.</p>
                @else
                    <div class="mt-3">
                        <div>
                            @php
                                $hasInterviewStatus = $job->applications->contains('status', 'invited to interview');
                            @endphp
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="text-center">Candidate Name</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Phone</th>
                                        <th scope="col" class="text-center">Status</th>
                                        @if ($hasInterviewStatus)
                                            <th scope="col" class="text-center">Interview Date</th>
                                        @endif
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($job->applications as $application)
                                        <tr>
                                            <th scope="row" class="ps-0 fw-medium ">
                                                <a href="javascript:void(0)"
                                                    class="link-primary text-dark fw-medium d-block">
                                                    {{ $application->user->first_name . ' ' . $application->user->last_name }}
                                                </a>
                                            </th>
                                            <td class="text-center">{{ $application->user->email }}</td>
                                            <td class="text-center">{{ $application->user->phone }}</td>
                                            <td class="text-center">
                                                @if ($application->status === 'pending')
                                                    <span class="badge rounded-pill text-bg-secondary">
                                                        {{ $application->status }}
                                                    </span>
                                                @elseif ($application->status === 'invited to interview')
                                                    <span class="badge rounded-pill text-bg-primary">
                                                        {{ $application->status }}
                                                    </span>
                                                @elseif ($application->status === 'accepted')
                                                    <span class="badge rounded-pill text-bg-success">
                                                        {{ $application->status }}
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill text-bg-danger">
                                                        {{ $application->status }}
                                                    </span>
                                                @endif

                                            </td>
                                            @if ($application->status === 'invited to interview' && !$application->interview_date)
                                                <!-- Interview Date Input Form -->
                                                <td class="text-center">
                                                    <form
                                                        action="{{ route('apply.updateInterviewDate', $application->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="datetime-local" name="interview_date"
                                                            class="form-control mt-2" value="{{ old('interview_date') }}">
                                                        <button type="submit" class="btn btn-primary mt-2"><i
                                                                class="fa-solid fa-calendar-days"></i> Set Interview
                                                            Date</button>
                                                    </form>
                                                </td>
                                              @elseif ($application->interview_date)  
                                              <td class="text-center">
                                                {{ $application->interview_date }}
                                              </td>
                                            @endif
                                            <td class="text-center">
                                                <div
                                                    class="d-flex justify-content-center align-items-center gap-2 flex-wrap">

                                                    <!-- Preview CV Button -->
                                                    <a href="{{ asset('storage/' . $application->resume->path) }}"
                                                        class="btn btn-warning" target="_blank">
                                                        <i class="fa-solid fa-file-pdf" style="font-size: 20px"></i>
                                                    </a>

                                                    <!-- Update Status Dropdown -->
                                                    <form action="{{ route('apply.updateStatus', $application->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="status"
                                                            id="status-input-{{ $application->id }}">

                                                        <div class="dropdown me-2">
                                                            @if ($application->status === 'accepted' || $application->status === 'rejected')
                                                                <button class="btn btn-info dropdown-toggle" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                                    disabled>
                                                                    <i class="fa-light fa-pen-nib"
                                                                        style="font-size: 20px"></i>
                                                                </button>
                                                            @else
                                                                <button class="btn btn-info dropdown-toggle" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-solid fa-pen-nib"
                                                                        style="font-size: 15px"></i>
                                                                </button>
                                                            @endif

                                                            <ul class="dropdown-menu">
                                                                @foreach ($statuses as $status)
                                                                    @if ($status !== $application->status)
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)"
                                                                                onclick="updateStatus('{{ $application->id }}', '{{ $status }}')">
                                                                                {{ $status }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <script>
        function updateStatus(applicationId, status) {
            // Get the hidden input field by application ID and set its value
            document.getElementById('status-input-' + applicationId).value = status;

            // Submit the form for the corresponding application
            document.getElementById('status-input-' + applicationId).closest('form').submit();
        }
    </script>
@endsection
