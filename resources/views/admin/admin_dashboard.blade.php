<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>
        .user-stats-card {
            text-align: center; /* Centraliza o texto */
        }

        .user-stats-content {
            position: relative; /* Para garantir que o conteúdo fique acima do fundo */
            z-index: 1; /* Eleva o conteúdo acima do fundo */
        }

        .user-stats-subtitle, .user-stats-title {
            font-size: 18px; /* Tamanho da fonte do subtítulo */
            color: #fff; /* Cor do texto do subtítulo */
            margin-bottom: 10px; /* Espaçamento abaixo do subtítulo */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5), /* Sombra suave */
                        0 0 15px rgba(0, 0, 0, 0.3); /* Efeito de brilho ao redor */
        }

        .user-stats-title {
            font-size: 24px; /* Aumenta o tamanho da fonte para maior destaque */
            color: #fff; /* Cor do texto do título */
            margin-bottom: 10px; /* Espaçamento abaixo do título */
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7), /* Sombra mais pronunciada */
                        0 0 20px rgba(0, 0, 0, 0.5); /* Efeito de brilho mais intenso */
            font-weight: bold; /* Negrito para dar mais ênfase */
            font-style: italic;
        }

        .btn i {
        margin-right: 5px; /* Espaçamento entre o ícone e o texto */
        }

        @media only screen and (max-width: 1398.98px) {
            div.breadcrumb-contents {
                margin-top: -16px !important;
            }
        }

        .single-order {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .single-order-icon {
            font-size: 10px; /* Tamanho do ícone */
            color: #007bff; /* Cor do ícone */
            text-align: center; /* Centraliza o ícone */
            margin: 10px; /* Margem ao redor do ícone */
        }

        .single-order:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('backend/Pages/configs.title_geral') }}</title>

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
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    @include('admin.Partials._header')

    <!-- Breadcrumb area Starts -->
    <div class="breadcrumb-area breadcrumb-padding">
        <div class="container custom-container-one">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-contents">
                        <h4 class="breadcrumb-contents-title"><i class="fas fa-tachometer-alt"></i> Admin Dashboard </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('admin.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> Admin Dashboard </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @include('_message')
    </div>

    <!-- Dashboard area Starts -->
    <div class="body-overlay"></div>
    <div class="dashboard-area section-bg-2 dashboard-padding">
        <div class="container">

            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>

                @include('admin.Partials.dash')

                <!--------------------------->
                <div class="dashboard-right-contents mt-4 mt-lg-0">
                    <div class="dashboard-promo">
                        <div class="row gy-4 justify-content-center">
                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="{{ route('tours.show') }}" style="text-decoration: none;">
                                    <div class="single-order card user-stats-card">
                                        <div class="user-stats-content">
                                            <div class="single-order-icon">
                                                <i class="las la-map"></i> <!-- Ícone de mapa -->
                                            </div>
                                            <span class="user-stats-subtitle">{{ __('backend/Pages/configs.tours') }}</span>
                                            <h2 class="user-stats-title">{{ count($tours) }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="{{ route('reservations.show') }}" style="text-decoration: none;">
                                    <div class="single-order card user-stats-card">
                                        <div class="user-stats-content">
                                            <div class="single-order-icon">
                                                <i class="las la-ticket-alt"></i> <!-- Ícone de bilhete -->
                                            </div>
                                            <span class="user-stats-subtitle">{{ __('backend/Pages/configs.reserves') }}</span>
                                            <h2 class="user-stats-title">{{ count($reserves) }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="{{ route('newsletters.show') }}" style="text-decoration: none;">
                                    <div class="single-order card user-stats-card">
                                        <div class="user-stats-content">
                                            <div class="single-order-icon">
                                                <i class="las la-envelope"></i>
                                            </div>
                                            <span class="user-stats-subtitle">{{ __('backend/Pages/configs.newsteller') }}</span>
                                            <h2 class="user-stats-title">{{ count($newsletters) }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="{{ route('clients.show') }}" style="text-decoration: none;">
                                    <div class="single-order card user-stats-card">
                                        <div class="user-stats-content">
                                            <div class="single-order-icon">
                                                <i class="las la-user"></i>
                                            </div>
                                            <span class="user-stats-subtitle">{{ __('backend/Pages/configs.users') }}</span>
                                            <h2 class="user-stats-title">{{ count($users) }}</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @foreach ($reservesP as $reserveP)
                                <div class="single-reservation bg-white base-padding">
                                    <div class="single-reservation-expandIcon"> <i class="las la-angle-down"></i> </div>
                                    <div class="single-reservation-head">
                                        <div class="single-reservation-flex">
                                            <div class="single-reservation-content">
                                                
                                                <h5 class="single-reservation-content-title"> {{ __('backend/Pages/reserves.reserve_detail') }}</h5>
                                                <span class="single-reservation-content-id"> #{{ $reserveP->id }}  </span>
                                            </div>
                                            <div class="single-reservation-btn">
                                                @if ($reserveP->status === 'Pendent')
                                                    <a href="{{ route('reservations.details', $reserveP->id) }}" class="btn btn-danger"> {{ $reserveP->status }} </a>
                                                @elseif ($reserveP->status === 'Waiting')
                                                    <a href="{{ route('reservations.details', $reserveP->id) }}" class="btn btn-warning"> {{ $reserveP->status }} </a>
                                                @else
                                                    <a href="{{ route('reservations.details', $reserveP->id) }}" class="btn btn-success"> {{ $reserveP->status }} </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-reservation-inner" style="">
                                        <div class="single-reservation-item">
                                            <div class="single-reservation-name">
                                                <h5 class="single-reservation-name-title"> {{ $reserveP->fn }} {{ $reserveP->ln }} </h5>
                                                <p class="single-reservation-name-para"> {{ $reserveP->email }} </p>
                                            </div>
                                        </div>
                                        <div class="single-reservation-item">
                                            <div class="single-reservation-details">
                                                <div class="single-reservation-details-item">
                                                    <span class="single-reservation-details-subtitle"> {{ __('backend/Pages/reserves.day') }} </span>
                                                    <h5 class="single-reservation-details-title"> {{ $reserveP->checkin }} </h5>
                                                </div>
                                                <div class="single-reservation-details-item">
                                                    <span class="single-reservation-details-subtitle"> {{ __('backend/Pages/reserves.day') }} </span>
                                                    <h5 class="single-reservation-details-title"> {{ $reserveP->horas }} </h5>
                                                </div>
                                                <div class="single-reservation-details-item">
                                                    <span class="single-reservation-details-subtitle"> {{ __('backend/Pages/reserves.boat') }} </span>
                                                    <h5 class="single-reservation-details-title"> {{ $reserveP->tipo_embarcacao }} </h5>
                                                </div>
                                                {{--
                                                <div class="single-reservation-details-item">
                                                    <span class="single-reservation-details-subtitle"> Booked </span>
                                                    <h5 class="single-reservation-details-title"> 28 Jun 22 </h5>
                                                </div>
                                                 --}}
                                            </div>
                                        </div>
                                        {{--
                                        <div class="single-reservation-item">
                                            <div class="single-reservation-flex">
                                                <div class="single-reservation-content">
                                                    <h5 class="single-reservation-content-title"> Total Bill </h5>
                                                    <span class="single-reservation-content-price"> $250 </span>
                                                </div>
                                                <div class="single-reservation-logoPrice">
                                                    <span class="single-reservation-logoPrice-thumb">
                                                        <img src="assets/img/dashboard/mslogo.png" alt="img">
                                                    </span>
                                                    <span class="single-reservation-logoPrice-code"> ***9320 </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-reservation-item">
                                            <div class="single-reservation-flex">
                                                <div class="single-reservation-name">
                                                    <h5 class="single-reservation-name-title"> Beyond Hotel </h5>
                                                    <p class="single-reservation-name-para"> 4140 Parker Rd. Allentown, New Mexico 31134 </p>
                                                </div>
                                                <div class="single-reservation-btn">
                                                    <a href="javascript:void(0)" class="dash-btn popup-click"> <i class="las la-exclamation-circle"></i> Cancel? </a>
                                                </div>
                                            </div>
                                        </div>
                                        --}}
                                    </div>
                                </div>
                            @endforeach

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="pagination-wrapper">
                                        <ul class="pagination-list list-style-none">
                                            {{-- Link para a página anterior --}}
                                            @if ($reservesP->onFirstPage())
                                                <li class="pagination-list-item-prev disabled">
                                                    <span class="pagination-list-item-button"> Prev </span>
                                                </li>
                                            @else
                                                <li class="pagination-list-item-prev">
                                                    <a href="{{ $reservesP->previousPageUrl() }}" class="pagination-list-item-button"> Prev </a>
                                                </li>
                                            @endif

                                            {{-- Links para as páginas --}}
                                            @foreach ($reservesP->getUrlRange(1, $reservesP->lastPage()) as $page => $url)
                                                @if ($page == $reservesP->currentPage())
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
                                            @if ($reservesP->hasMorePages())
                                                <li class="pagination-list-item-next">
                                                    <a href="{{ $reservesP->nextPageUrl() }}" class="pagination-list-item-button"> Next </a>
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
                </div>

            </div>
        </div>
    </div>
    <!-- Dashboard area end -->


    <!-- footer area start -->
    @include('components._footer')
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

    @include('components._scripts')


    <script>
        function redirect() {
            window.location.href = "/";
        }
    </script>

</body>

</html>
