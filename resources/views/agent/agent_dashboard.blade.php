<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent Panel</title>

    <style>
        body::-webkit-scrollbar {
    width: 1em;
    }

    body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    body::-webkit-scrollbar-thumb {
    background-color: #ff8c32;
    outline: 1px solid #ff8c32;
    }
    </style>

    <!-- favicon -->
    <link rel=icon href="{{ asset('assets/img/logo-favicon.png') }}" sizes="16x16" type="icon/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/style.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/geral.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


<body>
    <!-- Breadcrumb area Starts -->
    <div class="breadcrumb-area breadcrumb-padding">
        <div class="container custom-container-one">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-contents">
                        <a href="/" target="_blank" style="width:50%"><img src="../../assets/img/logo.png" width="35%"></a>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                        
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                        
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                        
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                        
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Breadcrumb area end -->
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

                <div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-bottom">
            <ul class="dashboard-list list-style-none">
                <li class="list active">
                    <a style="text-decoration:none;" href="/dashboard">Dashboard </a>
                </li>
                <br>
                
                
                <li class="">
                    <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard">Reservations </h6>
                    
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="/dashboard/reserves">List of Reservations</a> </h6>
                    
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="/dashboard/calendary">Calendary</a> </h6>
                                        
                    <br>
                </li>


                <li class="">

                    <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard">Users </h6>


                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px;" href="/dashboard/users/admins.php">ADMINS</a> </h6>
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px;" href="/dashboard/users/users.php">Clients</a> </h6>
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px;" href="/dashboard/newsletter">Newsletter</a> </h6>
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px;" href="/dashboard/contacts">Contacts</a> </h6>
                                        <br>
                    
               
                </li>
                <li class="">
                    <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard">Tours </h6>
                                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px;" href="/dashboard/tours-list/">List of tours</a> </h6>
                                        
                </li>
                
                
                <!--
                <li class="list has-children">
                    <a href="/">Reservas </a>
                    <ul class="submenu list-style-none">
                        <li class="list"> <a href="/dashboard/reserves/"> Lista de reservas </a> </li>
                        <li class="list"> <a href="#"> Calendário </a> </li>
                    </ul>
                </li>
                -->
                <!--
                <li class="list has-children">
                    <a href="javascript:void(0)">Utilizadores </a>
                    <ul class="submenu list-style-none">
                        <li class="list"> <a href="/dashboard/users/admins.php">ADMINS </a> </li>
                        <li class="list"> <a href="/dashboard/users/users.php"> Clientes </a> </li>
                        <li class="list"> <a href="/dashboard/newsletter/"> Newsletter </a> </li>
                        <li class="list"> <a href="/dashboard/contacts/"> Contactos </a> </li>
                    </ul>
                </li>
                -->
                <br>
                <li class="">
                    <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="#">Categories </h6>
                </li>
                                           <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px;"> <a style="text-decoration: none; color:black" href="/dashboard/?cat=Local">Local</a> </h6>
                                                   <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px;"> <a style="text-decoration: none; color:black" href="/dashboard/?cat=Duração">Duração</a> </h6>
                                                   <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px;"> <a style="text-decoration: none; color:black" href="/dashboard/?cat=Gestão">Gestão</a> </h6>
                                        <!--
                <li class="list">
                    <a href="javascript:void(0)"> <i class="las la-sign-out-alt"></i> Log Out </a>
                </li>
                -->       
            </ul>
        </div>
    </div>
</div>                
                <div class="dashboard-right-contents mt-4 mt-lg-0">
                    <div class="dashboard-promo">
                        <div class="row gy-4 justify-content-center">
                            
                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="/dashboard/tours-list" style="text-decoration: none;">
                                <div class="single-order">
                                    <div class="single-order-flex">
                                        <div class="single-order-contents">
                                            <span class="single-order-contents-subtitle" style="padding: 13px;"> Tours  </span>

                                            
                                            <h2 style="text-decoration: none;" class="single-order-contents-title"> 3 </h2>
                                        </div>
                                        <div class="single-order-icon">
                                            <i class="las la-history"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="/dashboard/reserves" style="text-decoration: none;">
                                <div class="single-order">
                                    <div class="single-order-flex">
                                        <div class="single-order-contents">
                                            <span class="single-order-contents-subtitle" style="padding: 13px;"> Reservations </span>
                                                                                        <h2 class="single-order-contents-title"> 7 </h2>
                                        </div>
                                        <div class="single-order-icon">
                                            <i class="las la-check-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="/dashboard/newsletter/" style="text-decoration: none;">
                                <div class="single-order">
                                    <div class="single-order-flex">
                                        <div class="single-order-contents">
                                            <span class="single-order-contents-subtitle" style="padding: 13px;"> Newsletter </span>
                                                                                        <h2 class="single-order-contents-title"> 1 </h2>
                                        </div>
                                        <div class="single-order-icon">
                                            <i class="las la-times-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="col-xxl-3 col-xl-4 col-sm-6 orders-child">
                                <a href="/dashboard/users/users.php" style="text-decoration: none;">
                                <div class="single-order">
                                    <div class="single-order-contents">
                                        <span class="single-order-contents-subtitle"> Registered Users &nbsp;&nbsp;&nbsp; </span>
                                                                                    <h2 class="single-order-contents-title"> 5 </h2>
                                    </div>
                                    <div class="single-order-icon">
                                        <i class="las la-clipboard-check"></i>
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

    <!-- popup start -->
    <div class="popup-overlay"></div>
    <div class="popup-fixed">
        <div class="popup-contents popup-cancell-modal">
            <h2 class="popup-contents-title"> Why do you want to cancel? </h2>
            <div class="popup-contents-select">
                <label class="popup-contents-select-label"> Choose a reason </label>
                <div class="js-select">
                    <select>
                        <option value="1">Don't want to Book</option>
                        <option value="2">Booked Accidentally</option>
                        <option value="3">Don't want to Book</option>
                    </select>
                </div>
            </div>
            <div class="popup-contents-btn flex-btn">
                <a href="javascript:void(0)" class="dash-btn popup-close"> <i class="las la-arrow-left"></i> Go Back </a>
                <a href="javascript:void(0)" class="dash-btn btn-cancelled popup-close"> Cancel </a>
            </div>
        </div>
    </div>
    <!-- popup ends  -->

    <!-- footer area start -->
    <footer class="footer-area footer-area-two footer-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-wrapper">
                        <div class="footer-wrapper-flex">
                            <div class="footer-wrapper-single" style="width: 70%">
                                <div class="footer-widget widget" style="width: 100%">
                                    <div class="footer-widget-contents">
                                        <div class="footer-widget-logo">
                                            <a href="{{ url('/') }}"> <img src="{{ asset('assets/img/header_home_footer.png') }} " style="width: 40%;" alt="logo"> </a>
                                        </div>
                                        <div class="footer-widget-inner mt-4">
                                            <p class="footer-widget-contents-para"> Event, Tour, and Travel Booking Platform. </p>
                                            <div class="copyright-contents-items mt-5">
                                                <div class="copyright-contents-single">
                                                    <div class="copyright-contents-single-flex">
                                                        <div class="copyright-contents-single-icon">
                                                            <i class="las la-phone"></i>
                                                        </div>
                                                        <div class="copyright-contents-single-details">
                                                            <span class="copyright-contents-single-details-title"> Contact us! </span>
                                                            <a href="{{ url('tel:3104372766') }}" class="copyright-contents-single-details-link"> +351 220 944 436 </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="copyright-contents-single">
                                                    <div class="copyright-contents-single-flex">
                                                        <div class="copyright-contents-single-icon">
                                                            <i class="las la-envelope"></i>
                                                        </div>
                                                        <div class="copyright-contents-single-details">
                                                            <span class="copyright-contents-single-details-title"> Make us a question! </span>
                                                            <a href="{{ url('mailto:into@tidescape.pt') }}" class="copyright-contents-single-details-link"> info@tidescape.pt </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-wrapper-single">
                                <div class="footer-widget widget">
                                    <h3 class="footer-widget-title text-white"> Newsletter </h3>
                                    <div class="footer-widget-inner mt-4">
                                        <p class="footer-widget-para"> About 80% of our requests are responded to within 24 hours! Don't hesitate, we'll be brief and dedicated. </p>
                                        <div class="footer-widget-form mt-5">
                                            <form action="#" method="POST">
                                                <div class="footer-widget-form-single">
                                                    <input class="footer-widget-form-control" type="email" id="email" name="email" placeholder="Enter your email" required>
                                                    <button type="submit" id="btnAderir" name="btnAderir" > Submit </button>
                                                </div>
                                            </form>

                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-navbar">
            <div class="container">
                <div class="footer-widget widget">
                    <div class="footer-widget-nav">
                        <ul class="footer-widget-nav-list list-style-none text-center">
                                <li class="footer-widget-nav-list-item">
                                    <a href="#" class="footer-widget-nav-list-link">  </a>
                                </li>
                                <li class="footer-widget-nav-list-item">
                                    <a href="{{ url('/info') }}" class="footer-widget-nav-list-link"> Terms of use </a>
                                </li>
                                <li class="footer-widget-nav-list-item">
                                    <a href="{{ url('/info') }}" class="footer-widget-nav-list-link"> Privacy Policy </a>
                                </li>
                                <li class="footer-widget-nav-list-item">
                                    <a href="{{ url('contacts') }}" class="footer-widget-nav-list-link"> Contacts </a>
                                </li>
                                <li class="footer-widget-nav-list-item">
                                    <a href="#" class="footer-widget-nav-list-link"> </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area footer-padding copyright-bg-1">
            <div class="container">
                <div class="copyright-contents">
                    <div class="copyright-contents-flex">
                        <div class="footer-widget-social">
                            <ul class="footer-widget-social-list list-style-none justify-content-center">
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="{{ url('https://www.facebook.com/profile.php?id=100094309034236&sk=about&section=bio') }}"> <i class="lab la-facebook-f"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="{{ url('https://twitter.com/Tidescape') }}"> <i class="lab la-twitter"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="{{ url('https://www.instagram.com/tidescapeexclusivemoments/') }}"> <i class="lab la-instagram"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="{{ url('https://www.linkedin.com/company/96430365/') }}"> <i class="lab la-linkedin"></i> </a>
                                </li>
                            </ul>
                        </div>
                        <span class="copyright-contents-main"> 2023 © Tidescape. All rights reserved. <br>Developed by: <a target="_blank" href="{{ url('https://anmconnection.pt/pt') }}">ANMConnection - marketing & web</a></span>
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