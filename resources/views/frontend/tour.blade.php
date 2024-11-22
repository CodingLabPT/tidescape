<!DOCTYPE html>
<html lang="pt-br">

<meta name='refresh'>
<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>

    .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}


        @media (min-width: 992px) and (max-width: 1366px) {
            div.breadcrumb-contents {
                margin-top: 6% !important;
            }
        }


        @media only screen and (max-width: 991px) {
            .navbar-area .nav-container {
                display: block !important;
            }

            .navbar-area {
                padding: 10px !important;
            }
        }


    .circle, .circle::before {
    content: "";
    margin: 15px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    margin: 0;
    transition: all 0.3s;
    background-color: #FF8C32;
    }

    .circle::before {
    animation: mymove 2s infinite;
    position: absolute;
    background-color: #985420;
    }

    @-webkit-keyframes mymove {
        50%   {
            transform: scale(2);
            opacity: 0
        }
        100%   {
            transform: scale(2);
            opacity: 0
        }
    }

    .hotel-view-contents-header {
        display: flex;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 95%; margin: 20px;
        background-color: #f9f9f9;
    }

    .hotel-view-contents {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .hotel-view-contents span.people_see {
        font-size: 12px;
    }

    .hotel-view-contents-title {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: left;
    }

    .hotel-view-contents-location {
        display: flex;
        justify-content: left;
        align-items: flex-start;
        gap: 15px;
    }

    .hotel-view-contents-location-icon {
        font-size: 18px;
        color: #555;
    }

    .hotel-view-contents-location-para {
        font-size: 16px;
        color: #333;
    }

    @media screen and (max-width: 960px) {

        .hotel-view-contents-header {
            display: block;
        }

        .hotel-view-contents-title {
            font-size: calc(16px + 6 * ((100vw - 320px) / 680)) !important;
        }

        #top-widget-social {
            margin-top: 20px;
        }
    }

    .hotel-view-contents-bottom {
        padding: 0px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tidescape - {{ __('tour.title') }} </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @include('components._styles')

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

<div class="breadcrumb-area section-bg-2 breadcrumb-padding" style="margin-top: 3rem">
    <div class="container custom-container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-contents">
                    <h4 class="breadcrumb-contents-title"> {{ __('tour.title') }} </h4>
                    <ul class="breadcrumb-contents-list list-style-none">
                        <li class="breadcrumb-contents-list-item"> <a href="{{ url('/') }}" class="breadcrumb-contents-list-item-link"> {{ __('tour.back_home') }} </a> </li>
                        <li class="breadcrumb-contents-list-item"> <a href="{{ url('/category') }}" class="breadcrumb-contents-list-item-link"> {{ __('tour.back_tours') }} </a> </li>
                        <li class="breadcrumb-contents-list-item"> {{ __('tour.title') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@include('_message')
</div>

<section class="hotel-details-area section-bg-2 pat-100 pab-100">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-8 col-lg-7">
                <div class="details-left-wrapper">
                    <div class="details-contents bg-white radius-10">
                        <div class="details-contents-header">
                            <div class="details-contents-thumb details-contents-main-thumb bg-image">
                                <img style="width: 100%; height:110%; background-size: cover; border-radius:10px" src="<?php echo asset("{$tour->img}")?>">
                            </div>
                            <br><br>
                            <div class="secundatyimg" style="display:flex">
                                <div class="details-contents-header-thumb">
                                    <img style="display:flex; justify-content:flex-start; background-size: cover;" width="396" height="" src="<?php echo asset("{$tour->img2}")?>">
                                </div>
                                &nbsp;&nbsp;&nbsp;
                                <div class="details-contents-header-thumb">
                                    <img style="display:flex; justify-content:flex-start" width="396" height="" src="<?php echo asset("{$tour->img3}")?>">
                                </div>
                            </div>
                        </div>
                        <div class="hotel-view-contents">


                            <div class="hotel-view-contents-header">

                                <div class="hotel-view-contents">
                                    <h3 class="hotel-view-contents-title">{!! nl2br($tour->name) !!}</h3>
                                    <div style="display: flex; align-content: center; justify-content: center; align-items: center">
                                        <div class="circle"></div>
                                        &nbsp;
                                        <span class="people_see">{{ rand(15, 25) }} {{ __('tour.people_see') }}</span>
                                    </div>

                                </div>

                                <div class="hotel-view-contents-location mt-2" style="display: inline;">
                                    <span class="hotel-view-contents-location-icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <span class="hotel-view-contents-location-para">{{ $tour->local }}</span>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="hotel-view-contents-location-icon"><i class="fas fa-clock"></i></span>
                                    <span class="hotel-view-contents-location-para">{{ $tour->duration }}</span>
                                </div>
                            </div>

                            <br>

                        </div>
                        <div class="details-contents-tab">
                            <ul class="tabs details-tab details-tab-border">
                                <li class="active" data-tab="about"><i class="fas fa-info-circle"></i> About </li>
                                <!--   <li data-tab="reviews"> Avaliações </li> -->
                            </ul>

                            <div id="about" class="tab-content-item active">
                                <div class="about-tab-contents">
                                    <p class="about-tab-contents-para">
                                        {!!nl2br ($tour->obs) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sticky-top">
                    <form action="{{ route('reserve.store') }}" method="POST">
                        @csrf
                        <div class="hotel-details-widget hotel-details-widget-padding widget bg-white radius-10">
                            <div class="details-sidebar">
                                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
                                <input type="hidden" name="tour_name" id="tour_name" value="{{ $tour->name }}">
                                <input type="hidden" name="tour_local" id="tour_local" value="{{ $tour->local }}">
                                <input type="hidden" name="tour_duration" id="tour_duration" value="{{ $tour->duration }}">
                                <input type="hidden" name="tour_ep" id="tour_ep" value="{{ $tour->ep }}">
                                <input type="hidden" name="tour_eg" id="tour_eg" value="{{ $tour->eg }}">
                                <input type="hidden" name="tour_emg" id="tour_emg" value="{{ $tour->emg }}">

                                <div class="details-sidebar">
                                    <div class="details-sidebar-dropdown custom-form">
                                        <div class="single-input">
                                            <div style="display: flex; gap:20px;">
                                                <div style="width:100%">
                                                    <span class="hotel-view-contents-location-icon"><i class="fas fa-calendar"></i> </span>
                                                    <label class="details-sidebar-dropdown-title"> {{ __('tour.reservation_date') }} </label><br>
                                                    <input style="width: 100%; padding:5px; border:1px solid #CED4DA" id="checkin" name="checkin" type="date" min="{{ date('Y-m-d') }}" required>
                                                </div>
                                                <div style="width:100%">
                                                    <span class="hotel-view-contents-location-icon"> <i class="fas fa-clock"></i> </span>
                                                    <label class="details-sidebar-dropdown-title"> {{ __('tour.desired_time') }} </label><br>
                                                    <input style="width: 100%; padding:5px; border:1px solid #CED4DA" id="horas" name="horas" type="time" min="08:00" max="19:00" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="hotel-view-contents-location mt-2">
                                            <span class="hotel-view-contents-location-icon"> <i class="fas fa-ship"></i> </span>
                                            <span class="hotel-view-contents-location-para"> {{ __('tour.boats_available_for_the_tour') }} </span>
                                        </div>
                                        <div id="boats_available" class="hotel-view-contents-location mt-2">
                                            <select style="padding:10px" onchange="alterar_preco()" class="form-select" id="tipo" name="tipo">

                                                @if ($tour->ep == 0 && $tour->eg == 0 && $tour->emg == 0)
                                                    <option disabled value="">{{ __('tour.no_available_boats') }}</option>
                                                @else
                                                    <option value="">{{ __('tour.click_to_see_the_boats') }}</option>
                                                @endif

                                                @if ($tour->ep == 0)
                                                @else
                                                    <option value="small"><i class="fas fa-ship"></i> {{ __('tour.small') }}</option>
                                                @endif

                                                @if ($tour->eg == 0)
                                                @else
                                                    <option value="big"><i class="fas fa-ship"></i> {{ __('tour.big') }}</option>
                                                @endif

                                                @if ($tour->emg == 0)
                                                @else
                                                    <option value="large"><i class="fas fa-ship"></i> {{ __('tour.large') }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <span id="txtSmallBoatPrice" style="width: 100%; display: none">
                                        <div class="hotel-view-contents-bottom" style="padding: 0px">
                                            <div class="hotel-view-contents-bottom-flex">
                                                <div class="hotel-view-contents-bottom-contents mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{ __('tour.price') }} </h4>
                                                </div>
                                                <div class="btn-wrapper mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{$tour->ep}}€ </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    <span id="txtBigBoatPrice" style="width: 100%; display: none">
                                        <div class="hotel-view-contents-bottom" style="padding: 0px">
                                            <div class="hotel-view-contents-bottom-flex">
                                                <div class="hotel-view-contents-bottom-contents mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{ __('tour.price') }} </h4>
                                                </div>
                                                <div class="btn-wrapper mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{$tour->eg}}€ </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    <span id="txtLargeBoatPrice" style="width: 100%; display: none">
                                        <div class="hotel-view-contents-bottom" style="padding: 0px">
                                            <div class="hotel-view-contents-bottom-flex">
                                                <div class="hotel-view-contents-bottom-contents mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{ __('tour.price') }} </h4>
                                                </div>
                                                <div class="btn-wrapper mt-4">
                                                    <h4 class="hotel-view-contents-bottom-title">{{$tour->emg}}€ </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    <div class="btn-wrapper mt-4">
                                        <button type="submit" id="btnReserv" name="btnReserv" class="btn btn-primary btn-sm"><i class="fas fa-calendar-check"></i> {{ __('tour.continue_reservation') }}</button>
                                    </div>

                                    <br>
                                    <!-- DEFINIÇÃO DAS EMBARCAÇÕES -->
                                    <span id="txtSmallBoat" style="width: 100%; display: none">
                                        <p><em><strong>{{ $smallBoat[0]->tipo }}</strong></em> </p>
                                        <p tyle="text-align: justify">{!!nl2br ($smallBoat[0]->descricao) !!}</p>
                                        <br>
                                        <div class="" style="display:flex; gap: 10px">
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$smallBoat[0]->img}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$smallBoat[0]->img2}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$smallBoat[0]->img3}")?>">
                                            </div>
                                        </div>
                                    </span>

                                    <span id="txtBigBoat" style="width: 100%; display: none">
                                        <p><em><strong>{{ $bigBoat[0]->tipo }}</strong></em> </p>
                                        <p style="text-align: justify">{!!nl2br ($bigBoat[0]->descricao) !!}</p>
                                        <br>
                                        <div class="" style="display:flex; gap: 10px">
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$bigBoat[0]->img}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$bigBoat[0]->img2}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$bigBoat[0]->img3}")?>">
                                            </div>
                                        </div>
                                    </span>

                                    <span id="txtLargeBoat" style="width: 100%; display: none">
                                        <p><em><strong>{{ $largeBoat[0]->tipo }}</strong></em> </p>
                                        <p tyle="text-align: justify">{!!nl2br ($largeBoat[0]->descricao) !!}</p>
                                        <br>
                                        <div class="" style="display:flex; gap: 10px">
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$largeBoat[0]->img}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$largeBoat[0]->img2}")?>">
                                            </div>
                                            <div class="details-contents-header-thumb">
                                                <img width="220" height="100" src="<?php echo asset("{$largeBoat[0]->img3}")?>">
                                            </div>
                                        </div>
                                    </span>

                                    <br>
                                </div>

                                @else
                                <p>{{ __('tour.access') }}</p>
                                <br>
                                <a href="{{ route('login.index', ['id' => $tour->id]) }}"><span class="btn btn-primary btn-sm">{{ __('tour.here') }}</span></a>
                                @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <div class="hotel-details-widget hotel-details-widget-padding widget bg-white radius-10">
                    <div class="details-sidebar">
                        <div class="details-sidebar-offer center-text radius-10">
                            <div class="details-sidebar-offer-shapes">
                                <img src="{{ asset('assets/img/single-page/offer_shapes.png') }}" alt="shapes">
                            </div>
                            <div class="details-sidebar-offer-thumb">
                                <img src="{{ asset('assets/img/single-page/offer.png') }}" alt="">
                            </div>
                            <div class="btn-wrapper mt-5">
                                <a href="{{ route('contacts') }}" class="cmn-btn btn-bg-white"> Book Now </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    @include('components._footer')

    <div class="back-to-top">
        <span class="back-top"> <i class="las la-angle-up"></i> </span>
    </div>

    <div class="mouse-move mouse-outer"></div>
    <div class="mouse-move mouse-inner"></div>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>

    <script>

    const timeout = 3000;
    const loading = $('#boats_available');
    loading.LoadingOverlay('show');

    $(($loading) => {
        setTimeout(() => {
            loading.LoadingOverlay('hide');
        }, timeout);
    });



    </script>



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
    <!-- TellInput Js -->
    <script src="assets/js/intlTelInput.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

    <script>
        function alterar_preco() {
            const $tipo              = document.getElementById('tipo').value;
            const $txtSmallBoat      = document.getElementById('txtSmallBoat');
            const $txtBigBoat        = document.getElementById('txtBigBoat');
            const txtSmallBoatPrice  = document.getElementById('txtSmallBoatPrice');

            if($tipo != "") {
                if($tipo == 'small') {
                    txtSmallBoat.style.display = 'block';
                    txtSmallBoatPrice.style.display = 'block';

                    txtBigBoat.style.display = 'none';
                    txtBigBoatPrice.style.display = 'none';

                    txtLargeBoat.style.display = 'none';
                    txtLargeBoatPrice.style.display = 'none';

                } else if ($tipo == 'big') {
                    txtSmallBoat.style.display = 'none';
                    txtSmallBoatPrice.style.display = 'none';

                    txtBigBoat.style.display = 'block';
                    txtBigBoatPrice.style.display = 'block';

                    txtLargeBoat.style.display = 'none';
                    txtLargeBoatPrice.style.display = 'none';
                } else {
                    txtSmallBoat.style.display = 'none';
                    txtSmallBoatPrice.style.display = 'none';

                    txtBigBoat.style.display = 'none';
                    txtBigBoatPrice.style.display = 'none';

                    txtLargeBoat.style.display = 'block';
                    txtLargeBoatPrice.style.display = 'block';
                }

            } else {
                txtSmallBoatPrice.style.display = 'none';
                txtBigBoatPrice.style.display = 'none';
                txtLargeBoatPrice.style.display = 'none';
                txtSmallBoat.style.display = 'none';
                txtBigBoat.style.display = 'none';
                txtLargeBoat.style.display = 'none';
            }


        }
    </script>

    <script crossorigin="anonymous" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @include('components._scripts')

</body>

</html>

