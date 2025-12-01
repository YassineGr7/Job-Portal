<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Recent Job</span>
                    <h2>Featured Jobs</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <div class="col-xl-10">
                @foreach ($jobs as $job)
                    <!-- single-job-content -->
                    <div class="single-job-items mb-30 my-4"
                        style="border: 1px solid rgb(169, 167, 164); border-radius: 10px">
                        <div class="job-items">
                            <div class="company-img">
                                <a href="{{ route('frontend.jobs.show', $job->id) }}"><img
                                        src="{{ asset('storage/' . $job->company->logo_path) }} " width="120"
                                        alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="{{ route('frontend.jobs.show', $job->id) }}">
                                    <h4>{{ $job->title }}</h4>
                                </a>
                                <ul class="mt-3">
                                    <li><i class="fas fa-solid fa-building"></i>{{ $job->company->name }}</li>
                                    <li class="mx-3"><i
                                            class="fas fa-map-marker-alt"></i>{{ $job->company->location }}</li>
                                    <li class="mx-3"><img src="{{ asset('assets-main/img/icon/save-money.png') }}"
                                            class="mb-2 mx-2" width="20" alt="">{{ $job->salary }} DH
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="items-link f-right">
                            <a href="javascript:void(0)">{{ $job->type }}</a>
                            <span
                                style="color: grey; font-style: italic">{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <!-- single-job-content -->
                @endforeach

                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="{{ route('frontend.jobs.index') }}" class="border-btn2">Browse All Jobs</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
