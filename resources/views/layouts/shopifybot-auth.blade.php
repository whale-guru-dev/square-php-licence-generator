<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('shopifybot/img/favicon.jpg')}}">

    <title>TableScrapes</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/bootstrap.min.css')}}" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/fonts/line-icons.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/slicknav.css')}}">
    <!-- Owl carousel -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/owl.theme.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/slick.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/slick-theme.css')}}" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/animate.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/main.css')}}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('shopifybot/css/responsive.css')}}">

</head>
<body>

<!-- Header Area wrapper Starts -->
<header id="header-wrap">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="/" class="navbar-brand"><img src="{{asset('shopifybot/img/logo.png')}}" alt=""></a>
            </div>
        </div>


    </nav>
    <!-- Navbar End -->


</header>
<!-- Header Area wrapper End -->

<div class="anim-tb">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-12 padding-none">
                <div class="feature-thumb wow fadeInRight" data-wow-delay="0.3s">
                    <img src="{{asset('shopifybot/img/tablescrapes.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@yield('content')


<!-- Go to Top Link -->
<a href="#" class="back-to-top">
    <i class="lni lni-chevron-up"></i>
</a>

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>
<!-- End Preloader -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('shopifybot/js/jquery-min.js')}}"></script>
<script src="{{asset('shopifybot/js/popper.min.js')}}"></script>
<script src="{{asset('shopifybot/js/bootstrap.min.js')}}"></script>
<script src="{{asset('shopifybot/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('shopifybot/js/slick.min.js')}}"></script>
<script src="{{asset('shopifybot/js/wow.js')}}"></script>
<script src="{{asset('shopifybot/js/jquery.nav.js')}}"></script>
<script src="{{asset('shopifybot/js/scrolling-nav.js')}}"></script>
<script src="{{asset('shopifybot/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('shopifybot/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('shopifybot/js/main.js')}}"></script>
<script src="{{asset('shopifybot/js/form-validator.min.js')}}"></script>
<script src="{{asset('shopifybot/js/contact-form-script.min.js')}}"></script>

</body>
</html>
