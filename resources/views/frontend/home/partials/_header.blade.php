<style>

@media only screen and (max-width: 991px) {
    .navbar-area .nav-container {
        display: block !important;
        padding: 10px 20px 30px !important;
    }
}


/*globo*/
.navbar-right-content {
    position: relative;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    min-width: 160px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    border-radius: 4px;
    overflow: hidden;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: background-color 0.3s ease;
}

.dropdown-content a img {
    margin-right: 8px;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media (max-width: 768px) {
    .dropdown-content {
        right: 0;
        left: 0;
        width: auto; /* Ajusta a largura automaticamente */
        max-width: 100%; /* Garante que não ultrapasse a largura da tela */
        overflow-y: auto; /* Permite rolagem vertical se necessário */
        max-height: 200px; /* Define uma altura máxima */
    }
}


</style>

<header class="header-style-01">
    <!-- Menu area Starts -->
    <nav class="navbar navbar-area white-nav nav-absolute navbar-two navbar-expand-lg" style="position: fixed; ">
        <div class="container custom-container-one nav-container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 0px 10px;">
            <div class="logo-wrapper">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/img/logo_header.png') }}" alt="">
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

            <div class="collapse navbar-collapse" id="hotel_booking_menu" style="flex-grow: .4;">
                <ul class="navbar-nav">
                    <li><a href="{{ route('category') }}">{{ __('menu.tours') }}</a></li>
                    <li><a href="{{ route('offers') }}">{{ __('menu.offers') }} </a></li>
                    <li><a href="#jump">{{ __('menu.acommodations') }} </a></li>
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
                                    <a title="{{ __('menu.dashboard') }}" style="color:white" href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i class="fas fa-tachometer-alt"></i> {{ GoogleTranslate::trans('Admin dashboard', app()->getLocale()) }}</a>
                                @elseif ($user->role === 'agent')
                                    <a title="Agent dashboard" style="color:white" href="{{ route('agent.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i class="fas fa-tachometer-alt"></i> {{ GoogleTranslate::trans('Agent dashboard', app()->getLocale()) }}</a>
                                @else
                                    <a title="Dashboard" style="color:white" href="{{ route('user.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><i class="fas fa-tachometer-alt"></i> {{ GoogleTranslate::trans('User dashboard', app()->getLocale()) }}</a>
                                @endif
                            @else
                                <a style="color:white" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('menu.log_in') }}</a> &nbsp;&nbsp;&nbsp;

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
