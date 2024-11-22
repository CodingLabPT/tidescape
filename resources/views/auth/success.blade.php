<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tidescape - Checkout</title>

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
    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- Flat Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flatpicker.css') }}">
    <!-- TellInput Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Language selector Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">


<style>
@media only screen and (max-width: 991px) {
.navbar-area .nav-container {
    display: block !important;
}

    .navbar-area {
        padding: 10px !important;
    }
}

@media (min-width: 992px) and (max-width: 1366px) {
    div.breadcrumb-contents {
        margin-top: 6% !important;
    }
}
</style>


</head>

<body>

<header class="header-style-01" style="z-index: 99999;">
    <!-- Menu area Starts -->
    <nav class="navbar navbar-area navbar-border navbar-padding navbar-expand-lg" style="position: fixed; width: 100%; background-color: white;">
        <div class="container custom-container-one nav-container">
            <div class="logo-wrapper">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </a>
            </div>
            <div class="responsive-mobile-menu d-lg-none">
                <a href="javascript:void(0)" class="click-nav-right-icon">
                    <i class="las la-ellipsis-v"></i>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hotel_booking_menu" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="hotel_booking_menu" style="flex-grow: .4;">
                <ul class="navbar-nav">
                    <li><a href="{{ route('category') }}">{{ __('menu.tours') }}</a></li>
                    <li><a href="{{ route('offers') }}">{{ __('menu.offers') }} </a></li>
                    <li><a href="/#jump">{{ __('menu.acommodations') }} </a></li>
                    <li><a href="{{ route('contacts') }}"> {{ __('menu.contacts') }} </a></li>
                </ul>
                @include('components.header._social')
            </div>

            <div class="navbar-right-content show-nav-content">
                <div class="single-right-content">
                    <div class="navbar-right-flex">
                        @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                @if ($user->role === 'admin')
                                    <a title="{{ __('menu.dashboard') }}" style="color:black" href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
                                @elseif ($user->role === 'agent')
                                    <a title="Agent dashboard" style="color:black" href="{{ route('agent.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
                                @else
                                    <a title="Dashboard" style="color:black" href="{{ route('user.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
                                @endif
                            @else
                                <a style="color:black" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.log_in') }}</a> &nbsp;&nbsp;&nbsp;

                                @if (Route::has('register'))
                                    <a style="color:white; background-color:#FF8C32; padding: .7rem 1rem; border-radius: 5px" href="{{ route('register') }}" class="">{{ __('menu.sign_up') }}</a>
                                @endif
                            @endauth
                        </div>
                        @endif
                        @include('frontend.home.partials.languageSelector')
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu area end -->
</header>

    <div class="breadcrumb-area section-bg-2 breadcrumb-padding" style="margin-top: 3rem">
        <div class="container custom-container-one">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-contents">
                        <h4 class="breadcrumb-contents-title"> {{ __('category.checkout_details') }} </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="/" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> {{ __('category.checkout') }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @include('_message')
    </div>

    <br>

    <div class="alert alert-success container" role="alert" style="position: relative; top: 60px">
        <h4 class="alert-heading">{{ __('category.well_done') }}</h4>
        <p style="color: #0f5132">{{ __('category.congratulations') }}</p>
        <hr>
        <p class="mb-0" style="color: #0f5132">{{ __('category.refer') }} <em><strong>({{ $user->email }})</strong></em> {{ __('category.address') }}</p>
    </div>

    <!-- Breadcrumb area end -->
    <!-- Checkout area Starts -->
    <!-- Checkout area end -->

    <br><br><br>

    @include('components._footer')

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"> <i class="las la-angle-up"></i> </span>
    </div>
    <!-- back to top area end -->

    <!-- Mouse Cursor start -->
    <div class="mouse-move mouse-outer"></div>
    <div class="mouse-move mouse-inner"></div>
    <!-- Mouse Cursor Ends -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jquery Migrate -->
    <script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Wow Js -->
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <!-- Slick Js -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- ImageLoaded Js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope Js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific Popup Js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- Nice Select Js -->
    <script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
    <!-- Flat Picker Js -->
    <script src="{{ asset('assets/js/flatpicker.js') }}"></script>
    <!-- Range Slider Js -->
    <script src="{{ asset('assets/js/nouislider-8.5.1.min.js') }}"></script>
    <!-- TellInput Js -->
    <script src="{{ asset('assets/js/intlTelInput.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>
