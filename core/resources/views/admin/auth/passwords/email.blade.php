<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot Password</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css ')}} ">

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css ')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/components.css ')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Forgot Password</h4></div>

                        <div class="card-body">
                            <p class="text-muted">We will send a link to reset your password</p>
                            <form method="POST" action="{{ route('admin.password.reset') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{asset('assets/admin/js/jquery.min.js')}} "></script>
<script src="{{asset('assets/admin/js/popper.js')}} "></script>
<script src="{{asset('assets/admin/js/tooltip.js')}} "></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}} bootstrap/js/"></script>
<script src="{{asset('assets/admin/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/admin/js/moment.min.js')}} "></script>
<script src="{{asset('assets/admin/js/stisla.js')}} "></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('assets/admin/js/scripts.js')}} "></script>
<script src="{{asset('assets/admin/js/custom.js')}} "></script>
@include('admin.partials.notify')
</body>
</html>