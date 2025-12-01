<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets-admin/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets-admin/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.dashboard.sidebar')
        <!--  Sidebar End -->

        {{-- main wrapper --}}
        <div class="body-wrapper">

            <!--  Header Start -->
            @include('layouts.dashboard.header')
            <!--  Header End -->

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @yield('main')
                    </div>
                </div>
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a
                            href="https://themewagon.com/" target="_blank"
                            class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
                </div>
            </div>
        </div>
        {{-- end main wrapper --}}
    </div>



    <script src="{{ asset('assets-admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets-admin/js/dashboard.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script>
        

        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor.create(document.querySelector('#jobDesc'), {
                  toolbar: [
                        'undo', 'redo', '|', 
                        'bold', 'italic', 'underline', 'strikethrough', '|', 
                        'bulletedList', 'numberedList', '|',
                        'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock'
                  ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
