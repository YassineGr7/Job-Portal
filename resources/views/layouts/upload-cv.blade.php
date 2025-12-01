    <div class="online-cv cv-bg section-overly pt-90 pb-120"
        data-background="{{ asset('assets-main/img/gallery/cv_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="cv-caption text-center">
                        <p class="pera1">Welcome to JobFinder</p>
                        <span class="pera2"> Where you can start your professional career</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @auth

        @if (Auth::user()->role == 'user')
            <div class="online-cv cv-bg section-overly pt-90 pb-120"
                data-background="{{ asset('assets-main/img/gallery/cv_bg.jpg') }}">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="cv-caption text-center">
                                <p class="pera1">FEATURED TOURS Packages</p>
                                <p class="pera2"> Make a Difference with Your Online Resume!</p>
                                <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
