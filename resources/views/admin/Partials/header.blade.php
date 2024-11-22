<header class="header-style-01">
    <!-- Menu area Starts -->
    <nav class="navbar navbar-area navbar-border navbar-padding navbar-expand-lg">
        <div class="container custom-container-one nav-container bg-white" style="padding: 20px; border-radius: 10px;">
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

            @if (Auth::user()->role === 'admin')
            <div style="visibility: hidden" class="collapse navbar-collapse" id="hotel_booking_menu">
                <ul class="navbar-nav" style="text-align: right">
                    <li><a href="{{ route('category') }}">{{ __('menu.tours') }}</a></li>
                    <li><a href="{{ route('offers') }}">{{ __('menu.offers') }} </a></li>
                    <li><a href="/#jump">{{ __('menu.acommodations') }} </a></li>
                    <li><a href="{{ route('contacts') }}"> {{ __('menu.contacts') }} </a></li>
                </ul>
            </div>
            @else
            <div class="collapse navbar-collapse" id="hotel_booking_menu">
                <ul class="navbar-nav" style="text-align: right">
                    <li><a href="{{ route('category') }}">{{ __('menu.tours') }}</a></li>
                    <li><a href="{{ route('offers') }}">{{ __('menu.offers') }} </a></li>
                    <li><a href="/#jump">{{ __('menu.acommodations') }} </a></li>
                    <li><a href="{{ route('contacts') }}"> {{ __('menu.contacts') }} </a></li>
                </ul>
            </div>
            @endif

            <div class="navbar-right-content show-nav-content">
                <div class="single-right-content">
                    <div class="navbar-author">
                        <div class="navbar-author-flex">
                            <div class="navbar-author-thumb">

                            </div>
                            <div class="navbar-author-name">
                                <h6 class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">{{ Auth::user()->fn }} {{ Auth::user()->ln }}
                                    <div><svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg></div>
                                </h6>
                            </div>
                        </div>
                        <div class="navbar-author-wrapper">
                            <div class="navbar-author-wrapper-list">

                                <a href="{{ route('profile.edit') }}" class="navbar-author-wrapper-list-item"> Perfil </a>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="navbar-author-wrapper-list-item"> Exit </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-right-content show-nav-content" style="padding: 0px 10px">
                <div class="single-right-content">
                    <div class="dropdown">
                        <i style="font-size: 26px; color: #FF8C32" class="las la-globe" class="dropbtn"></i>
                        <div class="dropdown-content">
                            <a href="{{ route('localization',['locale' => 'pt']) }}">
                                <img src="https://motellovers.com/public/img/flags/174-portugal.svg" width="16" height="16" alt="MotelLovers.com English">
                                Portuguese
                            </a>
                            <a href="{{ route('localization',['locale' => 'en']) }}">
                                <img src="https://motellovers.com/public/img/flags/262-united-kingdom.svg" width="16" height="16" alt="MotelLovers.com English">
                                English
                            </a>
                            <a href="{{ route('localization',['locale' => 'es']) }}" class="dropdown-item">
                                <img src="https://motellovers.com/public/img/flags/044-spain.svg" width="16" height="16" alt="MotelLovers.com Español">
                                Espanhol
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </nav>
    <!-- Menu area end -->
</header>
