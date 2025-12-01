<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets-main/img/logo/logo.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block mx-5">
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('frontend.jobs.index') }}">All Jobs</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            @auth
                                <div class="dropdown show">
                                    <a class="btn btn-primary dropdown-toggle rounded" style="padding:22px" href="#"
                                        role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @if (Auth::user()->role === 'job_poster')
                                            <a class="dropdown-item" href="{{ route('job_poster.dashboard') }}">Go to
                                                Dashboard</a>
                                        @elseif(Auth::user()->role === 'admin')
                                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Go to
                                                Dashboard</a>
                                        @endif
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <div style="display: flex; justify-content: space-around">
                                                    <button type="submit" class="dropdown-item"
                                                        href="{{ route('logout') }}">logout</button>
                                                    <img src="{{ asset('assets-main/img/icon/logout.png') }}" width="20"
                                                        height="20" style="margin-top:8px; margin-right:10px"
                                                        alt="">
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            @else
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ route('register') }}" class="btn head-btn1">Register</a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Login</a>
                                </div>
                            @endauth

                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
