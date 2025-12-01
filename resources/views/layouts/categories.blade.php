<div class="our-services section-pad-t20">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="section-tittle text-center">
                    <span>FEATURED TOURS Packages</span>
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
            @foreach ($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-ion mb-3">
                            <img src="{{asset('storage/'. $category->icon)}}" width="80" alt="category-icon" srcset="">
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">{{$category->label}}</a></h5>
                            <span>({{$category->jobs_count}})</span>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
        <!-- More Btn -->
        <!-- Section Button -->
        <div class="row">
            <div class="col-lg-12">
                <div class="browse-btn2 text-center mt-50">
                    <a href="{{ route('frontend.jobs.index') }}" class="border-btn2">Browse All Sectors</a>
                </div>
            </div>
        </div>
    </div>
</div>
