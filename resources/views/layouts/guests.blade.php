<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'login')</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets-main/img/logo/logo.png')}}" />
  <link rel="stylesheet" href="{{asset('assets-admin/css/styles.min.css')}}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @yield('main')
  </div>


  <script src="{{asset('assets-admin/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>  
  