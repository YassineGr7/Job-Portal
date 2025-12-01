<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-main/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets-main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/price_rangs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-main/css/style.css') }}">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('assets-main/img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    {{-- header --}}
    @include('layouts.header')

    {{-- main content --}}
    <main>
        @yield('body')

        {{-- Conditionally include categories if the section exists --}}
        @hasSection('includeCategories')
            @include('layouts.categories')
        @endif

        {{-- Conditionally include upload CV section if needed --}}
        @hasSection('includeUploadCv')
            @include('layouts.upload-cv')
        @endif

        {{-- Conditionally include featured jobs --}}
        @hasSection('includeFeaturedJobs')
            @include('layouts.featured-jobs')
        @endif

        {{-- Conditionally include apply process --}}
        @hasSection('includeApplyProcess')
            @include('layouts.apply-process')
        @endif

        {{-- Conditionally include testimonials --}}
        @hasSection('includeTestimonial')
            @include('layouts.testimonial')
        @endif

        {{-- Conditionally include about section --}}
        @hasSection('includeAbout')
            @include('layouts.about')
        @endif
    </main>


    {{-- footer start --}}
    @include('layouts.footer')
    {{-- footer end --}}























    <!-- JS here -->

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets-main/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets-main/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets-main/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/price_rangs.js') }}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets-main/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('assets-main/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets-main/js/contact.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets-main/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets-main/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets-main/js/plugins.js') }}"></script>
    <script src="{{ asset('assets-main/js/main.js') }}"></script>
</body>

</html>
