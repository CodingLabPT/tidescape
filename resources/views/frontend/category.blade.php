<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>
        /* SIDEBAR
        */
        .form-control {
            color: #8D8D8D !important;
        }

        .price-filter {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        }

        .price-input {
            flex: 1;
            margin-right: 15px;
        }

        .price-input:last-child {
            margin-right: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group {
            display: flex;
            align-items: center; /* Alinha verticalmente o símbolo e o input */
        }

        .currency-symbol {
            margin-right: 5px; /* Espaço entre o símbolo e o input */
            font-size: 16px; /* Tamanho do símbolo */
            line-height: 1.5; /* Alinhamento vertical */
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /*
        CONTENT
        */

        #tab-grid .card {
            margin-bottom: 1rem !important;
        }

        .g-4, .gy-4 {
            --bs-gutter-y: 0rem !important;
        }

        .card {
            border-radius: 10px !important;
        }

        .imgimg {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }


        .hotel-view-contents-title {
            font-size: calc(8px + 6 * ((100vw - 320px) / 680)) !important;
        }

        @media screen and (max-width: 960px) {
            .hotel-view-contents-title {
                font-size: calc(16px + 6 * ((100vw - 320px) / 680)) !important;
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

        @media (min-width: 992px) and (max-width: 1366px) {
            div.breadcrumb-contents {
                margin-top: 6% !important;
            }
        }



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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tidescape - {{ __('category.page_title') }} </title>
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
                    <li><a style="color: #FF8C32">{{ __('menu.tours') }}</a></li>
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
                    <h4 class="breadcrumb-contents-title"> {{ __('category.page_title') }} </h4>
                    <ul class="breadcrumb-contents-list list-style-none">
                        <li class="breadcrumb-contents-list-item"> <a href="{{ url('/') }}" class="breadcrumb-contents-list-item-link"> {{ __('category.home') }} </a> </li>
                        <li class="breadcrumb-contents-list-item"> Tours </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('_message')
</div>
<!-- page title area end -->

<!-- Hotel List area start -->
<div class="responsive-overlay"></div>
<section class="hotel-list-area section-bg-2 pat-100 pab-100">
    <div class="container">

        {{-- Location --}}
        <form method="GET" action="{{ route('category.filter') }}">
            <div class="location-area">
                <div class="container">
                    <div class="banner-location bg-white radius-5">
                        <div class="banner-location-flex">
                            <div class="banner-location-single">
                                <div class="banner-location-single-flex">
                                    <div class="banner-location-single-icon">
                                        <i style="margin-top: 1rem" class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="banner-location-single-contents">
                                        <span class="banner-location-single-contents-subtitle">{{ __('home/location.title') }}</span>
                                        <div class="banner-location-single-contents-dropdown">
                                            <select class="js-select select-style-two" name="local" id="local" onchange="this.form.submit()">
                                                @if (isset($_GET['local']))
                                                    <option value="Select a location" {{ isset($_GET['local']) && isset($_GET['local']) === 'Select a location' ? 'selected' : '' }}>
                                                        @php echo $_GET['local'] @endphp
                                                    </option>
                                                @else
                                                    <option value="Select a location" {{ isset($_GET['local']) && isset($_GET['local']) === 'Select a location' ? 'selected' : '' }}>
                                                        {{ __('home/location.dropdown_title') }}
                                                    </option>
                                                @endif


                                                @foreach ($locals as $item)
                                                    <option value="{{ $item->name }}" {{ isset($_GET['local']) && isset($_GET['local']) === $item->name ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- Location --}}

            <div class="shop-contents-wrapper mt-5">
                <div class="shop-icon">
                    <div class="shop-icon-sidebar">
                        <i class="las la-bars"></i>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <form style="padding: 10px;" method="GET" action="{{ route('category.filter') }}">
                    <div class="shop-sidebar-content">
                        <div class="shop-close-content">
                            <div class="shop-close-content-icon"> <i class="las la-times"></i> </div>
                            <div class="single-shop-left bg-white radius-10">
                                <div class="single-shop-left-title open">
                                    <h5 class="title"> {{ __('category.price') }} </h5>
                                    <div class="single-shop-left-inner mt-4">
                                        <div class="price-filter">
                                            <div class="price-input">
                                                <label for="min_price">{{ __('category.min_price') }} (€)</label>
                                                <div class="input-group">
                                                    <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}" onblur="this.form.submit()">
                                                </div>
                                            </div>
                                            <div class="price-input">
                                                <label for="max_price">{{ __('category.max_price') }} (€)</label>
                                                <div class="input-group">
                                                    <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}" onblur="this.form.submit()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="single-shop-left bg-white radius-10 mt-4">
                                <div class="single-shop-left-title open">
                                    <h5 class="title mb-4"> {{ __('category.duration') }} </h5>
                                    <div class="single-shop-left-inner margin-top-15">
                                        @foreach ($durations as $duration)
                                    @php
                                        $checked = [];
                                        if(isset($_GET['duration']))
                                        {
                                            $checked = $_GET['duration'];
                                        }
                                    @endphp
                                    <label class="py-1 container">
                                        <input type="checkbox" id="{{ $duration->name }}" name="duration[]" value="{{ $duration->name }}" onchange="this.form.submit()"
                                            @if(in_array($duration->name, $checked))
                                            checked
                                            @endif
                                        >

                                        @if ($duration->name == "1h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_1_hours') }}</p>
                                            <small>{{ $tourWith1h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "2h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_2_hours') }}</p>
                                            <small>{{ $tourWith2h }}</small>
                                        </div>


                                        @elseif ( $duration->name == "3h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_3_hours') }}</p>
                                            <small>{{ $tourWith3h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "4h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_4_hours') }}</p>
                                            <small>{{ $tourWith4h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "5h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_5_hours') }}</p>
                                            <small>{{ $tourWith5h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "6h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_6_hours') }}</p>
                                            <small>{{ $tourWith6h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "7h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_7_hours') }}</p>
                                            <small>{{ $tourWith7h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "8h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_8_hours') }}</p>
                                            <small>{{ $tourWith8h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "9h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_9_hours') }}</p>
                                            <small>{{ $tourWith9h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "10h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_10_hours') }}</p>
                                            <small>{{ $tourWith10h }}</small>
                                        </div>

                                        @elseif ( $duration->name == "11h" )
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_11_hours') }}</p>
                                            <small>{{ $tourWith11h }}</small>
                                        </div>

                                        @else
                                        <div style="display: flex; justify-content: space-between; align-items: center">
                                            <p>{{ __('category.up_to_12_hours') }}</p>
                                            <small>{{ $tourWith12h }}</small>
                                        </div>

                                        @endif

                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="single-shop-left bg-white radius-10 mt-4">
                                <div class="single-shop-left-title open">
                                    <h5 class="title mb-4"> {{ __('category.type_of_Boat') }} </h5>
                                    <div class="single-shop-left-inner margin-top-15">
                                        <label for="vessel" class="py-1 container">
                                            <input id="vessel" name="vessel" value="eg" type='checkbox' onchange="this.form.submit()"
                                                @if (isset($_GET['vessel'])) checked @endif>
                                                <div style="display: flex; align-items: center; justify-content: space-between">
                                                    <p>{{ __('category.big') }}</p>
                                                    <small>{{ $totalToursWithEgNotZero }}</small>
                                                </div>

                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="shop-close-content" >
                            <div class="single-shop-left bg-white radius-10 mt-4">
                                <button type="reset" onclick="window.location.href = '/category'" class="btn btn-secondary btn-sm">
                                    {{ __('category.clear_filters') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </form >

                {{-- CONTENT --}}
                <div class="shop-grid-contents">
                    <div class="grid-list-contents">
                        <div class="grid-list-contents-flex">
                            <em>{{ __('category.viewing_a_total_of') }} <strong>{{ count($tours) }}</strong> {{ __('category.results') }}</em>
                            <div class="grid-list-view">
                                <ul class="grid-list-view-flex d-flex tabs list-style-none">
                                    <li class="grid-list-view-icons active" data-tab="tab-grid">
                                        <a href="javascript:void(0)" class="icon"> <i class="las la-border-all"></i> </a>
                                    </li>
                                    <li class="grid-list-view-icons" data-tab="tab-list">
                                        <a href="javascript:void(0)" class="icon"> <i class="las la-bars"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="tab-grid" class="tab-content-item mt-4 active">
                        <div class="row gy-4">
                            @foreach ($tours as $tour)
                            <div class="col-md-6">
                                <div class="card">
                                    <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="hotel-view-thumb hotel-view-grid-thumb bg-image">
                                        <img style="width: 100%; background-size: cover; border-top-left-radius:10px; border-top-right-radius:10px;" src="<?php echo asset("{$tour->img}")?>">
                                    </a>
                                    <div class="card-body">
                                      <h5 class="card-title"><a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"> {{ $tour->name }} </a></h5>
                                      <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $tour->local }}</p>
                                      <p class="card-text"><i class="fas fa-clock"></i> {{ $tour->duration }}</p>
                                      <br>
                                      <div style="display: flex; justify-content: space-between">
                                        <p class="" style="color:#0B5ED7"><em>{{ __('home/tours.since') }} {{ $tour->price }}€</em></p>
                                        <div class="btn-wrapper">
                                            <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="btn btn-primary btn-sm"> <i class="fas fa-book-open"></i> {{ __('home/tours.book_now') }} </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="tab-list" class="tab-content-item mt-4">
                        <div class="row gy-4">
                            @foreach ($tours as $tour)
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                  <div class="col-md-4" style="padding: 0px">
                                    <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"
                                        class="hotel-view-thumb hotel-view-list-thumb bg-image">
                                        <img class="imgimg" style="height: 100%;" src="<?php echo asset("{$tour->img}")?>">
                                    </a>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title"><a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"> {{ $tour->name }} </a></h5>
                                      <p class="card-text">{{ $tour->local }}</p>
                                      <br><br>
                                      <div style="display: flex; justify-content: space-between">
                                        <p class="" style="color:#0B5ED7"><em>Since {{ $tour->price }}€</em></p>
                                        <div class="btn-wrapper">
                                            <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="btn btn-primary btn-sm"> {{ __('home/tours.book_now') }} </a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>

                    @if(count($tours) === 0)
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ __('category.sorry') }} {{ __('category.no_tours_available') }}
                      </div>
                    @endif

                    <div class="row mt-5">
                        <div class="col">
                            <div class="pagination-wrapper">
                                <ul class="pagination-list list-style-none">
                                    {{-- Link para a página anterior --}}
                                    @if ($tours->onFirstPage())
                                        <li class="pagination-list-item-prev disabled">
                                            <span class="pagination-list-item-button"> Prev </span>
                                        </li>
                                    @else
                                        <li class="pagination-list-item-prev">
                                            <a href="{{ $tours->previousPageUrl() }}" class="pagination-list-item-button"> Prev </a>
                                        </li>
                                    @endif

                                    {{-- Links para as páginas --}}
                                    @foreach ($tours->getUrlRange(1, $tours->lastPage()) as $page => $url)
                                        @if ($page == $tours->currentPage())
                                            <li class="pagination-list-item active">
                                                <span class="pagination-list-item-link">{{ $page }}</span>
                                            </li>
                                        @else
                                            <li class="pagination-list-item">
                                                <a href="{{ $url }}" class="pagination-list-item-link">{{ $page }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Link para a próxima página --}}
                                    @if ($tours->hasMorePages())
                                        <li class="pagination-list-item-next">
                                            <a href="{{ $tours->nextPageUrl() }}" class="pagination-list-item-button"> Next </a>
                                        </li>
                                    @else
                                        <li class="pagination-list-item-next disabled">
                                            <span class="pagination-list-item-button"> Next </span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Hotel List area end -->

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

    @include('components._scripts')

</body>

</html>
