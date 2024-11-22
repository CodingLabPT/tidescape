<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>

        .btn i {
            margin-right: 5px; /* Espaçamento entre o ícone e o texto */
        }

        @media screen and (max-width: 960px) {
            #top-widget-social {
            margin-top: 20px;
            }

            .banner-area-two {
                padding: 50px 0px !important;
            }

            .banner-single-content-title {
                max-width: 100% !important;
            }
        }

        .alert-danger {
            position: absolute; width: 100%; margin-top: 20px;
        }

        select option {
            padding: 5px 10px;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('auth.title') }} </title>


    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{ asset('assets/phone/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/phone/css/intlTelInput.css') }}">

    <!-- favicon -->
    <link rel=icon href="{{ asset('assets/img/logo-favicon.png') }}" sizes="16x16" type="icon/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- Flat Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flatpicker.css') }}">
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shots.css') }}">
    <!-- Scroll Bar Color Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">
    <!-- Language selector Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">
    <!-- MARIO css -->
    <link rel="stylesheet" href="{{ asset('assets/css/mario.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<!-- Header -->
@include('frontend.home.partials._header')

<!-- Banner area Starts -->
<div class="banner-area banner-area-two banner-bg" style="background-image: url('{{ asset('assets/img/banner/banner-man.png') }}'); background-size: cover;
    background-position: bottom;">
    <div class="banner-shapes">
        <img src="assets/img/banner/banner-shapes.png" alt="shapes">
        <img src="assets/img/banner/banner-shapes2.png" alt="shapes">
    </div>
    <div class="container">
        <div class="banner-area-flex">
            <div class="banner-single-content text-white">
                <h2 class="banner-single-content-title fw-700;" style="max-width: 70%"> {{ __('home/banner.title') }} </h2>
                <p class="banner-single-content-para mt-4"> {{ __('home/banner.subtitle') }} </p>
                <div class="banner-single-content-reviews mt-5">
                    <span class="banner-single-content-reviews-icon"> <i class="las la-star"></i> </span>
                    <div class="banner-single-content-reviews-para">
                        <span> 4.8/5(2380) </span>
                        <span> Trustpilot reviews </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.home.partials.location')
<br>

@include('_message')

@include('frontend.home.partials.what_makes_our_tours_the_best')

@include('frontend.home.partials.tours')

@include('frontend.home.partials.amazing_landscapes')

@include('frontend.home.partials.frequently_asked_question')

@include('frontend.home.partials.brands')

@include('components._footer')

<!-- back to top area start -->
<div class="back-to-top bg-color-two">
    <span class="back-top" onclick="backTop()"> <i class="las la-angle-up"></i> </span>
</div>
<!-- back to top area end -->

<!-- Mouse Cursor start -->
<div class="mouse-cursor-two">
    <div class="mouse-move mouse-outer bg-color-two"></div>
    <div class="mouse-move mouse-inner bg-color-two"></div>
</div>
<!-- Mouse Cursor Ends -->

<!-- bootstrap -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
    function backTop() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

</body>
</html>
