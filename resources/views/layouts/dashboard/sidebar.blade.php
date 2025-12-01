<aside class="left-sidebar" style="width: 300px">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="text-nowrap logo-img"
                style="border-right: 2px solid rgb(0, 128, 255) ; padding:10px">
                <img src="{{ asset('assets-admin/images/logos/logo-light.svg') }}" alt="" />
            </a>

            @if ($company && $company->logo_path && Auth::user()->role === 'job_poster')
                <div class="my-3">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/' . $company->logo_path) }}" alt="Company Logo" width="100">
                    </a>
                </div>
            @else
                <a href="index.html"><img src="{{ asset('assets-main/img/logo/logo.png') }}" style="margin-left: 10px"
                        width="74" alt=""></a>
            @endif
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        @if (Auth::user()->role === 'job_poster')
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('job_poster.dashboard') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                        <span class="hide-menu">ACTIONS</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('jobs.create') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                    class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Post a New Job</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('jobs.index') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Jobs List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('apply.index') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone"
                                    class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Applications</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=" {{ route('jobs.shortlisted') }} " aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Shortlisted Candidates</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"
                            class="fs-6"></iconify-icon>
                        <span class="hide-menu">EXTRA</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('job_poster.accountSettings') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone"
                                    class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Account Settings</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3">
                    <div class="d-flex">
                        <div class="unlimited-access-title me-3">
                            <h6 class="fw-semibold fs-4 mb-3 text-dark w-75">Developed By Y.G</h6>

                        </div>
                        <div class="unlimited-access-img">
                            <img src="{{ asset('assets-admin/images/backgrounds/product-tip.png') }}" alt=""
                                class="img-fluid">
                        </div>

                    </div>
                    <div class="text-center">
                        <a href="https://www.linkedin.com/in/yassine-grihim-9a2336235/" target="_blank"
                            class="btn btn-sm btn-primary fs-2 mt-2 fw-semibold lh-sm">
                            linkedIn Profile
                        </a>
                    </div>

                </div>
            </nav>
        @else
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                        <span class="hide-menu">ACTIONS</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard.companies') }}"
                            aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                    class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Companies List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard.jobs') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Jobs List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('categories.index') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Jobs Categories List</span>
                        </a>
                    </li>
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"
                            class="fs-6"></iconify-icon>
                        <span class="hide-menu">EXTRA</span>
                    </li>
                    <!-- Create Accounts Menu -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard.create') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone"
                                    class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Create Accounts</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                            <span>
                                <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                </ul>
                <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3">
                    <div class="d-flex">
                        <div class="unlimited-access-title me-3">
                            <h6 class="fw-semibold fs-4 mb-3 text-dark w-75">Developed By Y.G</h6>

                        </div>
                        <div class="unlimited-access-img">
                            <img src="{{ asset('assets-admin/images/backgrounds/product-tip.png') }}" alt=""
                                class="img-fluid">
                        </div>

                    </div>
                    <div class="text-center">
                        <a href="https://www.linkedin.com/in/yassine-grihim-9a2336235/" target="_blank"
                            class="btn btn-sm btn-primary fs-2 mt-2 fw-semibold lh-sm">
                            linkedIn Profile
                        </a>
                    </div>

                </div>
            </nav>
        @endif
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
