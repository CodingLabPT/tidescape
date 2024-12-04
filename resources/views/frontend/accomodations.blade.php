<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tidescape - {{ __('category.page_title') }} </title>

<style>

@media screen and (max-width: 960px) {
    #top-widget-social {
        margin-top: 20px;
    }
}

    /*

    /* The container */
label.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
label.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
label.container:hover input ~ .checkmark {
  border:1px solid #2196F3;
}

/* When the checkbox is checked, add a blue background */
label.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
label.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
label.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>
    <!-- favicon -->
    <link rel=icon href="{{ asset('') }}../assets/img/logo-favicon.png" sizes="16x16" type="icon/png">
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
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">
    <!-- Language selector Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">
</head>
<body>

<nav class="navbar navbar-area navbar-border navbar-padding navbar-expand-lg" style="margin:0 auto; position:fixed; display:block; width:100%; background-color:white; z-index: 9999" >
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hotel_booking_menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="hotel_booking_menu">
            <ul class="navbar-nav">
                <li><a href="{{ route('category') }}">{{ __('menu.tours') }}</a></li>
                <li><a href="{{ route('offers') }}">{{ __('menu.offers') }} </a></li>
                <li><a style="color:#FF8C32" href="{{ route('accomodations') }}">{{ __('menu.acommodations') }} </a></li>
                <li><a href="{{ route('contacts') }}"> {{ __('menu.contacts') }} </a></li>
            </ul>
        </div>
        <div id="top-widget-social" class="footer-widget-social">
            <ul class="footer-widget-social-list list-style-none justify-content-center">
                <li class="footer-widget-social-list-item">
                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.facebook.com/profile.php?id=100094309034236&sk=about&section=bio"> <i class="lab la-facebook-f"></i> </a>
                </li>
                <li class="footer-widget-social-list-item">
                    <a class="footer-widget-social-list-link" target="_blank" href="https://twitter.com/Tidescape"> <i class="lab la-twitter"></i> </a>
                </li>
                <li class="footer-widget-social-list-item">
                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.instagram.com/tidescapeexclusivemoments/"> <i class="lab la-instagram"></i> </a>
                </li>
                <li class="footer-widget-social-list-item">
                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.linkedin.com/company/96430365/"> <i class="lab la-linkedin"></i> </a>
                </li>
                <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank"><img style="visibility: hidden" width="80" height="58" src="{{ asset('assets/img/single-page/livro_reclamacoes.png') }}"></a>
            </ul>
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
                                <a title="{{ __('menu.dashboard') }}" style="color:black" href="{{ route('agent.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
                            @else
                                <a title="{{ __('menu.dashboard') }}" style="color:black" href="{{ route('user.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
                            @endif
                        @else
                            <a style="color:black" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.log_in') }}</a> &nbsp;&nbsp;&nbsp;

                            @if (Route::has('register'))
                                <a style="color:white; background-color:#FF8C32; padding: 15px 30px; border-radius: 5px" href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.sign_up') }}</a>
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


<!-- page title area start  -->
<div class="breadcrumb-area section-bg-2 breadcrumb-padding" style="margin-top: 90px">
    <div class="container custom-container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-contents">
                    <h4 class="breadcrumb-contents-title"> {{ __('category.page_title') }} </h4>
                    <ul class="breadcrumb-contents-list list-style-none">
                        <li class="breadcrumb-contents-list-item"> <a href="{{ url('/') }}" class="breadcrumb-contents-list-item-link"> {{ __('category.home') }} </a> </li>
                        <li class="breadcrumb-contents-list-item"> Tours </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<!-- MENSAGENS DE SUCESSO
-->
@if (session('msg'))
<div class="breadcrumb-area breadcrumb-padding container" style="background-color: #fff">
    <p style="background-color: #D4EDDA; color: #155724; border:1px solid #C3E6CB; width: 100%; margin-bottom:0; text-align:center; padding:10px; " class="msg" >
    @if (session('msg'))
    {{ __('footer.success_email') }}
    @endif
    </p>
</div>
<!-- MENSAGENS DE ERRO!!
-->
@elseif ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="breadcrumb-area breadcrumb-padding container" style="background-color: #fff">
        <p style="background-color: #f2dede; color: #a94442; border:1px solid #ebccd1; width: 100%; margin-bottom:0; text-align:center; padding:10px; " class="msg" >
        @if ($errors->get('email'))
        {{ __('footer.error_email') }}
        @endif
        </p>
    </div>
    @endforeach
@endif



    <!-- Hotel List area start -->
<div class="responsive-overlay"></div>
<section class="hotel-list-area section-bg-2 pat-100 pab-100">
    <div class="container">
        @include('frontend.home.partials.location')
            <div class="shop-contents-wrapper mt-5">
                <div class="shop-icon">
                    <div class="shop-icon-sidebar">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <div class="shop-sidebar-content">
                    <div class="shop-close-content">
                        <div class="shop-close-content-icon"> <i class="las la-times"></i></div>
                        <div class="single-shop-left bg-white radius-10 mt-4">

                        <form style="padding: 10px;" method="GET" action="{{ route('accomodations') }}">

                            <h5>{{ __('category.price') }} (€)</h5>
                            <div class="form-row d-flex" style="margin-top:10px; gap: 10px;">
                                <div class="col-4">
                                    @if(isset($request->min))
                                        <input type="number" class="form-control" name="min" id="min" value="{{ $request->min }}" placeholder="min">
                                    @else
                                        <input type="number" class="form-control" name="min" id="min" value="" placeholder="min">
                                    @endif
                                </div>
                                <div class="col-4">
                                    @if(isset($request->max))
                                        <input type="number" class="form-control" name="max" id="max" value="{{ $request->max }}" placeholder="max">
                                    @else
                                        <input type="number" class="form-control" name="max" id="max" value="" placeholder="max">
                                    @endif
                                </div>
                              </div>

                            <hr>

                            <h5 style="margin-bottom: 20px" class="title py-"> {{ __('category.duration') }} </h5>
                            @foreach ($durations as $duration)
                                @php
                                    $checked = [];
                                    if(isset($_GET['duration']))
                                    {
                                        $checked = $_GET['duration'];
                                    }
                                @endphp
                                <label class="py-1 container">
                                    <input id="{{ $duration->name }}" name="duration[]" value="{{ $duration->name }}" type='checkbox'
                                        @if(in_array($duration->name, $checked))
                                        checked
                                        @endif
                                    >

                                    @if ( $duration->name == "1h" )
                                    {{ __('category.up_to_1_hours') }}
                                    @elseif ( $duration->name == "2h" )
                                    {{ __('category.up_to_2_hours') }}
                                    @elseif ( $duration->name == "3h" )
                                    {{ __('category.up_to_3_hours') }}
                                    @elseif ( $duration->name == "4h" )
                                    {{ __('category.up_to_4_hours') }}
                                    @elseif ( $duration->name == "5h" )
                                    {{ __('category.up_to_5_hours') }}
                                    @elseif ( $duration->name == "6h" )
                                    {{ __('category.up_to_6_hours') }}
                                    @elseif ( $duration->name == "7h" )
                                    {{ __('category.up_to_7_hours') }}
                                    @elseif ( $duration->name == "8h" )
                                    {{ __('category.up_to_8_hours') }}
                                    @elseif ( $duration->name == "9h" )
                                    {{ __('category.up_to_9_hours') }}
                                    @elseif ( $duration->name == "10h" )
                                    {{ __('category.up_to_10_hours') }}
                                    @elseif ( $duration->name == "11h" )
                                    {{ __('category.up_to_11_hours') }}
                                    @else
                                    {{ __('category.up_to_12_hours') }}
                                    @endif

                                    <span class="checkmark"></span>
                                </label>
                            @endforeach

                            <hr>

                            <h5 style="margin-bottom: 20px" class="title py-1"> {{ __('category.type_of_Boat') }} </h5>
                                <label class="py-1 container">
                                    <input id="ep" name="ep" value="ep" type='checkbox'
                                    @if (isset($_GET['ep'])) checked @endif
                                    > {{ __('category.small') }}
                                    <span class="checkmark"></span>
                                </label>

                                <label class="py-1 container">
                                    <input id="eg" name="eg" value="eg" type='checkbox'
                                    @if (isset($_GET['eg'])) checked @endif> {{ __('category.big') }}
                                    <span class="checkmark"></span>
                                </label>

                                <label class="py-1 container">
                                    <input id="emg" name="emg" value="emg" type='checkbox'
                                    @if (isset($_GET['emg'])) checked @endif
                                    > {{ __('category.large') }}
                                    <span class="checkmark"></span>
                                </label>

                            <button style="margin-top:10px" title="Filtering results" type="submit" id="filtrarTipo" name="filtrarTipo" class="btn btn-primary">{{ __('category.filter') }}</button>
                        </form>
                        <hr>
                        <button style="background-color: #ff8c32; color:#fff" type="button" onclick="window.location.href = '/category'" class="btn">{{ __('category.clear_filters') }}</button>
                        </div>
                    </div>
                </div>

                @include('frontend.category.partials.content')
</section>
<!-- Hotel List area end -->

<!-- footer area start -->
<footer class="footer-area footer-area-two footer-bg-1">
    @include('components.footer')
            <div class="container">
                <div class="copyright-contents">
                    <div class="copyright-contents-flex">
                        <div class="footer-widget-social">
                            <ul class="footer-widget-social-list list-style-none justify-content-center">
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.facebook.com/profile.php?id=100094309034236&sk=about&section=bio"> <i class="lab la-facebook-f"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://twitter.com/Tidescape"> <i class="lab la-twitter"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.instagram.com/tidescapeexclusivemoments/"> <i class="lab la-instagram"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.linkedin.com/company/96430365/"> <i class="lab la-linkedin"></i> </a>
                                </li>
                                <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank"><img width="140" height="58" src="{{ asset('assets/img/single-page/livro_reclamacoes.png') }}"></a>
                            </ul>
                        </div>

                        <span class="copyright-contents-main"> {{ date('Y') }} © Tidescape. {{ __('footer.all_rights_reserved.') }}. <br>{{ __('footer.developed_by') }} <a target="_blank" href="https://anmconnection.pt/pt">ANMConnection - marketing & web</a></span>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!-- footer area end -->



<!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"> <i class="las la-angle-up"></i> </span>
    </div>
    <!-- back to top area end -->

    <!-- Mouse Cursor start -->
    <div class="mouse-move mouse-outer"></div>
    <div class="mouse-move mouse-inner"></div>
    <!-- Mouse Cursor Ends -->

<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- jquery Migrate -->
<script src="assets/js/jquery-migrate.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- Wow Js -->
<script src="assets/js/wow.js"></script>
<!-- Slick Js -->
<script src="assets/js/slick.js"></script>
<!-- ImageLoaded Js -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- Isotope Js -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- Magnific Popup Js -->
<script src="assets/js/jquery.magnific-popup.js"></script>
<!-- Nice Select Js -->
<script src="assets/js/jquery.nice-select.js"></script>
<!-- Flat Picker Js -->
<script src="assets/js/flatpicker.js"></script>
<!-- Range Slider Js -->
<script src="assets/js/nouislider-8.5.1.min.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>

</html>
