<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Ecommerce Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href=" {{asset('assets/admin/css/bootstrap.min.css ')}} ">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href=" {{asset('assets/admin/css/jqvmap.min.css ')}}">
    <link rel="stylesheet" href=" {{asset('assets/admin/css/summernote-bs4.css ')}}">
    <link rel="stylesheet" href=" {{asset('assets/admin/css/wl.carousel.min.css ')}}">
    <link rel="stylesheet" href=" {{asset('assets/admin/css/owl.theme.default.min.css ')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href=" {{asset('assets/admin/css/style.css ')}}">
    <link rel="stylesheet" href=" {{asset('assets/admin/css/components.css ')}} ">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    @stack('css')
    </head>

<body>
    <div class="main-wrapper">
        @include('admin.partials.topnav')


        @include('admin.partials.sidenav')

        <!-- Main Content -->
            @yield('content')




        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">
                2.3.0
            </div>
        </footer>
    </div>


<!-- General JS Scripts -->

<script src="{{asset('assets/admin/js/jquery.min.js ')}} "></script>

<script src="{{asset('assets/admin/js/popper.js ')}}"></script>
<script src="{{asset('assets/admin/js/tooltip.js ')}} "></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js ')}}"></script>
<script src="{{asset('assets/admin/js/jquery.nicescroll.min.js ')}} "></script>
<script src="{{asset('assets/admin/js/moment.min.js ')}} "></script>
<script src="{{asset('assets/admin/js/stisla.js ')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/admin/js/jquery.sparkline.min.js ')}}"></script>
<script src="{{asset('assets/admin/js/chart.min.js ')}} "></script>
<script src="{{asset('assets/admin/js/owl.carousel.min.js ')}} "></script>
<script src="{{asset('assets/admin/js/summernote-bs4.js ')}} "></script>
<script src="{{asset('assets/admin/js/jquery.chocolat.min.js ')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/admin/js/page/index.js ')}}"></script>

<!-- Template JS File -->
<script src="{{asset('assets/admin/js/scripts.js ')}}"></script>
<script src="{{asset('assets/admin/js/custom.js ')}}"></script>
@include('admin.partials.notify')
@stack('script')
</body>
</html>