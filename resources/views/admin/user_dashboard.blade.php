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
                        <h4 class="breadcrumb-contents-title"><i class="fas fa-tachometer-alt"></i> User Dashboard </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('user.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> User Dashboard </li>
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

            @include('admin.Partials.dash_user')

            <div class="dashboard-right-contents mt-4 mt-lg-0">
                <div class="dashboard-promo">
                    <div class="row gy-4 justify-content-center">


                        <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                            <a href="{{ route('myreservations.show') }}" style="text-decoration: none;">
                                <div class="single-order card user-stats-card">
                                    <div class="user-stats-content">
                                        <div class="single-order-icon">
                                            <i class="las la-ticket-alt"></i> <!-- Ícone de bilhete -->
                                        </div>
                                        <span class="user-stats-subtitle">{{ __('backend/userSidebar.my_reserves') }}</span>
                                    <h2 class="user-stats-title">{{ count($reserveQuery) }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                            <a href="{{ route('myreservations.show') }}" style="text-decoration: none;">
                                <div class="single-order card user-stats-card">
                                    <div class="user-stats-content">
                                        <div class="single-order-icon">
                                            <i class="las la-comments"></i> <!-- Ícone de comentario -->
                                        </div>
                                        <span class="user-stats-subtitle">{{ __('backend/userSidebar.my_messages') }}</span>
                                    <h2 class="user-stats-title">{{ count($contactQuery) }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                            <a href="{{ route('myreservations.show') }}" style="text-decoration: none;">
                                <div class="single-order card user-stats-card">
                                    <div class="user-stats-content">
                                        <div class="single-order-icon">
                                            <i class="las la-envelope"></i> <!-- Ícone de newsletter -->
                                        </div>
                                        <span class="user-stats-subtitle">{{ __('backend/userSidebar.newsletter') }}</span>
                                        <br>
                                        @if (count($newsletterQuery) === 0)
                                            <samll style="font-size: 20px" class="single-order-contents-title">  {{ __('backend/userSidebar.sem_registo') }}</samll>
                                            @else
                                            <small style="font-size: 20px" class="single-order-contents-title"> {{ __('backend/userSidebar.com_registo') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </a>
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

    <!-- jquery -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- jquery Migrate -->
    <script src="../assets/js/jquery-migrate.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Wow Js -->
    <script src="../assets/js/wow.js"></script>
    <!-- Slick Js -->
    <script src="../assets/js/slick.js"></script>
    <!-- ImageLoaded Js -->
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Isotope Js -->
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <!-- Magnific Popup Js -->
    <script src="../assets/js/jquery.magnific-popup.js"></script>
    <!-- Nice Select Js -->
    <script src="../assets/js/jquery.nice-select.js"></script>
    <!-- Flat Picker Js -->
    <script src="../assets/js/flatpicker.js"></script>
    <!-- Range Slider Js -->
    <script src="../assets/js/nouislider-8.5.1.min.js"></script>
    <!-- TellInput Js -->
    <script src="../assets/js/intlTelInput.js"></script>
    <!-- main js -->
    <script src="../assets/js/main.js"></script>


    <script>
        function redirect() {
            window.location.href = "/";
        }
    </script>

</body>

</html>
