  <!--  Header Start -->
  <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                  <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                      <i class="ti ti-menu-2"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                      <i class="ti ti-bell-ringing"></i>
                      <div class="notification bg-primary rounded-circle"></div>
                  </a>
              </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                  @if (Auth::user()->role === 'job_poster')
                      <a href="{{ route('jobposter.company_profile') }}" class="btn btn-primary me-2"><span
                              class="d-none d-md-block">Company
                              Profile</span> </a>
                  @endif
                  <li class="nav-item dropdown">
                      <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('assets-admin/images/profile/user-2.jpg') }}" alt="" width="35"
                              height="35" class="rounded-circle">
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                          <div class="message-body">
                              @if (Auth::user()->role === 'job_poster')
                                  <a href="{{ route('job_poster.accountSettings') }}"
                                      class="d-flex align-items-center gap-2 dropdown-item">
                                      <i class="ti ti-user fs-6"></i>
                                      <p class="mb-0 fs-3">My Profile</p>
                                  </a>
                              @elseif(Auth::user()->role === 'admin')
                                  <a href="{{ route('admin.accountSettings') }}"
                                      class="d-flex align-items-center gap-2 dropdown-item">
                                      <i class="ti ti-user fs-6"></i>
                                      <p class="mb-0 fs-3">My Profile</p>
                                  </a>
                              @endif

                              <form action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button rype="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                              </form>
                          </div>
                      </div>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <!--  Header End -->
