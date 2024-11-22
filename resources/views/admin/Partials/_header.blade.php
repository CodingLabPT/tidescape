<!-- Scroll Bar Color Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">

<style>

    .profile-image {
        width: 40px; /* Ajuste o tamanho conforme necessário */
        height: 40px; /* Mantenha a altura igual à largura para um círculo perfeito */
        border-radius: 50%; /* Faz a imagem ficar circular */
        object-fit: cover; /* Garante que a imagem preencha o espaço sem distorção */
    }

    @media only screen and (max-width: 991px) {
        .navbar-area .nav-container  {
            display: block;
            visibility: visible;
        }

            .navbar-area {
            padding: 8px;
        }
    }


.navbar-author-flex {
    display: flex;
    align-items: center;
    cursor: pointer;
    flex-wrap: nowrap;
}

.navbar-author-name-title {
    margin: 0;
    font-size: 16px;
    display: flex;
    align-items: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
}

.dropdown-arrow {
    margin-left: 5px;
    font-size: 12px;
    transition: transform 0.3s ease;
}

.separator {
    width: 1px;
    height: 30px;
    background-color: #ccc;
    margin: 0 10px;
}

.navbar-author-wrapper {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    overflow: hidden;
    z-index: 1000;
}

.navbar-author:hover .navbar-author-wrapper {
    display: block;
}

.navbar-author-wrapper-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.navbar-author-wrapper-list-item {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.navbar-author-wrapper-list-item:hover {
    background-color: #FF8C32;
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
        <nav class="navbar navbar-area navbar-border navbar-padding navbar-expand-lg">
            <div class="container custom-container-one nav-container">
                <div class="logo-wrapper">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="">
                    </a>
                </div>
                @if (Auth::user()->role === 'admin')
                <div class="responsive-mobile-menu d-lg-none">
                    <a href="javascript:void(0)" class="click-nav-right-icon" style="right: 0px">
                        <i class="las la-ellipsis-v"></i>
                    </a>
                    <button style="visibility: hidden" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hotel_booking_menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                @elseif(Auth::user()->role === 'user')
                <div class="responsive-mobile-menu d-lg-none">
                    <a href="javascript:void(0)" class="click-nav-right-icon">
                        <i class="las la-ellipsis-v"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hotel_booking_menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                @endif

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

                <!-- Nome -->
                <div class="navbar-right-content show-nav-content">
                    <div class="single-right-content">
                        <div class="navbar-author">
                            <div class="navbar-author-flex">
                                <div class="navbar-author-name" style="padding: 8px;">
                                    <h6 class="navbar-author-name-title">

                                        @if (Auth::user()->photo)
                                            <img src="{{ Auth::user()->photo }}" class="profile-image" alt="imagem de perfil">
                                        @else
                                            <img src="https://placehold.co/40x40" class="profile-image" alt="imagem de perfil">
                                        @endif

                                        <div style="padding: 0px 5px;">{{ Auth::user()->fn }} {{ Auth::user()->ln }}</div>
                                        <span class="dropdown-arrow">&#9662;</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="navbar-author-wrapper">
                                <div class="navbar-author-wrapper-list">
                                    <a href="{{ route('profile.edit') }}" class="navbar-author-wrapper-list-item">Perfil</a>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="navbar-author-wrapper-list-item">Sair</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Globo -->
                <div class="navbar-right-content show-nav-content">
                    <div class="single-right-content">
                        <div class="dropdown">
                            <i class="las la-globe dropbtn" style="font-size: 26px; color: #FF8C32;"></i>
                            <div class="dropdown-content">
                                <a href="{{ route('localization',['locale' => 'pt']) }}">
                                    <img src="{{ asset('assets/svg/portugal-flag-icon.svg') }}" width="16" height="16" alt="Portuguese">
                                    Portuguese
                                </a>
                                <a href="{{ route('localization',['locale' => 'en']) }}">
                                    <img src="{{ asset('assets/svg/england-flag-icon.svg') }}" width="16" height="16" alt="English">
                                    English
                                </a>
                                <a href="{{ route('localization',['locale' => 'es']) }}">
                                    <img src="{{ asset('assets/svg/spain-country-flag-icon.svg') }}" width="16" height="16" alt="Espanol">
                                    Espanol
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Menu area end -->
    </header>
