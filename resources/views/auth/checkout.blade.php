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
    <link rel=icon href="favicon.png" sizes="16x16" type="icon/png">
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
    </style>

</head>

<body>

<header class="header-style-01">
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

    <div class="breadcrumb-area section-bg-2 breadcrumb-padding" style="margin-top: 4%">
        <div class="container custom-container-one">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-contents">
                        <h4 class="breadcrumb-contents-title"> {{ __('category.page_title') }} </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="/" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> Checkout </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@include('_message')
</div>

    <!-- Checkout area Starts -->
    <section class="Checkout-area section-bg-2 pat-100 pab-100">
        <div class="container">
            <form method="POST" action="{{ route('reserve.success', ['id' => $reserve->id]) }}">
                <div class="row g-4">
                    <div class="col-xl-8 col-lg-7">
                        <div class="checkout-wrapper">
                            <div class="checkout-single bg-white radius-10">
                                <h4 class="checkout-title"> {{ __('category.reserve_information') }}</h4>
                                <div class="checkout-contents mt-3">
                                    <div class="checkout-form custom-form">
                                            @method('PUT')
                                            @csrf
                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> {{ __('auth.register.fn') }} </label>
                                                    <input class="form--control" disabled value={{ $user->fn }} type="text" id="fn" name="fn" placeholder="Type First Name">
                                                </div>
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> {{ __('auth.register.ln') }} </label>
                                                    <input class="form--control" disabled value={{ $user->ln }} type="text" id="ln" name="ln" placeholder="Type Last Name">
                                                </div>
                                            </div>
                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> {{ __('auth.register.phone_number') }} </label>
                                                    <input class="form--control" disabled id="phone" name="phone" value={{ $user->phone }} type="tel" placeholder="Type Mobile Number">
                                                </div>
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> {{ __('auth.register.email') }} </label>
                                                    <input class="form--control" disabled type="text" name="email" id="email" value={{ $user->email }} placeholder="Type Email">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="input-flex-item">
                                                <button type="submit" class="btn btn-primary">{{ __('category.submit') }}</button>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!--
                            <div class="checkout-single bg-white radius-10">
                                <h4 class="checkout-title"> Payment </h4>
                                <div class="checkout-contents mt-4">
                                    <div class="custom-radio custom-radio-inline">
                                        <div class="custom-radio-single active">
                                            <input class="radio-input" type="radio" id="radio1" name="size" checked="checked">
                                            <label for="radio1"> <img src="assets/img/icons/card.svg" alt="card"> Credit/Dabit Card</label>
                                        </div>
                                        <div class="custom-radio-single">
                                            <input class="radio-input" type="radio" name="size" id="radio2">
                                            <label for="radio2"> <img src="assets/img/icons/paypal.svg" alt="Paypal"> Paypal</label>
                                        </div>
                                    </div>
                                    <div class="checkout-form custom-form">
                                        <form action="#">
                                            <div class="single-input mt-4">
                                                <label class="label-title"> Card Number </label>
                                                <input class="form--control input-padding-left" type="text" name="name" placeholder="Type Card Number">
                                                <div class="input-icon"> <img src="assets/img/icons/card.svg" alt="Icon"> </div>
                                            </div>
                                            <div class="input-flex-item">
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> Expire Date </label>
                                                    <input class="form--control input-padding-left date-picker" placeholder="Select Expire Date">
                                                    <div class="input-icon"> <img src="assets/img/icons/calendar.svg" alt="Icon"> </div>
                                                </div>
                                                <div class="single-input mt-4">
                                                    <label class="label-title"> CVV/CVC </label>
                                                    <input class="form--control input-padding-left" type="number" name="name" placeholder="Type CVV/CVC">
                                                    <div class="input-icon"> <img src="assets/img/icons/cvc.svg" alt="Icon"> </div>
                                                </div>
                                            </div>
                                            <div class="lock-contents mt-4">
                                                <div class="lock-contents-icon">
                                                    <img src="assets/img/icons/lock.svg" alt="Icon">
                                                </div>
                                                <span class="lock-contents-para"> Information are encrypted with 256 bit SSL </span>
                                            </div>
                                            <div class="guaranty-cancellation radius-10 mt-4">
                                                <h4 class="guaranty-cancellation-title"> Guarantee & Cancellation </h4>
                                                <p class="guaranty-cancellation-para"> Cancel 12 hours before checking-in time for a Free Cancellation. </p>
                                            </div>
                                            <div class="checkbox-wrap mt-4">
                                                <div class="checkbox-inline">
                                                    <input class="check-input" type="checkbox" id="agree">
                                                    <label class="checkbox-label" for="agree"> I agree to the <a href="javascript:void(0)">Terms & Conditions</a> of <a href="javascript:void(0)">Beyond Hotels</a> </label>
                                                </div>
                                            </div>
                                            <div class="btn-wrapper mt-4">
                                                <a href="javascript:void(0)" class="cmn-btn btn-bg-1 btn-small"> Pay & Confirm </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            -->

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sticky-top">
                            <div class="checkout-widget checkout-widget-padding widget bg-white radius-10">
                                <div class="checkout-sidebar">
                                    <h4 class="checkout-sidebar-title"> {{ __('category.tour_details') }} </h4>
                                    <div class="checkout-sidebar-contents">
                                        <ul class="checkout-flex-list list-style-none checkout-border-top pt-3 mt-3">
                                            <li class="list"> <span class="regular"> {{ __('category.tour_name') }} </span> <span class="strong"> {{ $tourName }} </span> </li>
                                            <li class="list"> <span class="regular"> {{ __('category.date') }}  </span> <span class="strong"> {{ $reserve->checkin }} / {{ $reserve->horas }}h  </span> </li>
                                            @if ($reserve->tipo_embarcacao == 'small')
                                                <li class="list"> <span class="regular"> {{ __('category.desired_boat') }}  </span> <span class="strong"> {{ __('backend/Pages/reserves.small') }} </span> </li>
                                            @endif

                                            @if ($reserve->tipo_embarcacao == 'big')
                                                <li class="list"> <span class="regular"> {{ __('category.desired_boat') }}  </span> <span class="strong"> {{ __('backend/Pages/reserves.big') }} </span> </li>
                                            @endif

                                            @if ($reserve->tipo_embarcacao == 'large')
                                                <li class="list"> <span class="regular"> {{ __('category.desired_boat') }}  </span> <span class="strong"> {{ __('backend/Pages/reserves.large') }} </span> </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-widget checkout-widget-padding widget bg-white radius-10">
                                <div class="sticky-top">
                                    <h4 class="checkout-sidebar-title"> {{ __('category.price') }} </h4>
                                    <div class="checkout-sidebar-contents">
                                        <ul class="checkout-flex-list list-style-none checkout-border-top pt-3 mt-3">
                                            @if ($reserve->tipo_embarcacao == 'small')
                                                <li class="list"> <span class="regular"> Total </span> <span class="strong color-one fs-20"> {{ $tourEP }}€ </span> </li>
                                            @endif

                                            @if ($reserve->tipo_embarcacao == 'big')
                                                <li class="list"> <span class="regular"> Total </span> <span class="strong color-one fs-20"> {{ $tourEG }}€ </span> </li>
                                            @endif

                                            @if ($reserve->tipo_embarcacao == 'large')
                                                <li class="list"> <span class="regular"> Total </span> <span class="strong color-one fs-20"> {{ $tourEMG }}€ </span> </li>
                                            @endif
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout area end -->

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

    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input,{});
    </script>

</body>

</html>
