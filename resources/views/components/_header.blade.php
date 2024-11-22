<!-- header -->
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
                    <li><a href="#jump">{{ __('menu.acommodations') }} </a></li>
                    <li><a href="{{ route('contacts') }}"> {{ __('menu.contacts') }} </a></li>
                </ul>
                <ul class="social-icons" style="display:flex; list-style: none; padding: 0; margin: 7px 0 0 0">
                    <li class="footer-widget-social-list-item" style="margin-right: 15px;">
                        <a class="footer-widget-social-list-link" target="_blank" href="https://www.facebook.com/profile.php?id=100094309034236&sk=about&section=bio">
                            <i class="lab la-facebook-f"></i>
                        </a>
                    </li>
                    <li class="footer-widget-social-list-item" style="margin-right: 15px;">
                        <a class="footer-widget-social-list-link" target="_blank" href="https://twitter.com/Tidescape">
                            <i class="lab la-twitter"></i>
                        </a>
                    </li>
                    <li class="footer-widget-social-list-item" style="margin-right: 15px;">
                        <a class="footer-widget-social-list-link" target="_blank" href="https://www.instagram.com/tidescapeexclusivemoments/">
                            <i class="lab la-instagram"></i>
                        </a>
                    </li>
                    <li class="footer-widget-social-list-item">
                        <a class="footer-widget-social-list-link" target="_blank" href="https://www.linkedin.com/company/96430365/">
                            <i class="lab la-linkedin"></i>
                        </a>
                    </li>
                    &nbsp;&nbsp;
                    <li class="footer-widget-social-list-item">
                        <a class="footer-widget-social-list-link" target="_blank" href="https://www.tiktok.com/@tidescape?_t=8nlXr94u6C1&_r=1">
                            <svg style="width: 15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-right-content show-nav-content">
                <div class="single-right-content">
                    <div class="navbar-right-flex">
                        @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                @if ($user->role === 'admin')
                                    <a title="{{ GoogleTranslate::trans('Admin dashboard', app()->getLocale()) }}" style="color:black" href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.dashboard') }}</a>
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
