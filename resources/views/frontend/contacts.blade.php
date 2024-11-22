<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<link rel="stylesheet" href="assets/css/intlTelInput.css">

<head>

    <style>

        .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

        @media only screen and (max-width: 991px) {
            .navbar-area .nav-container {
                display: block !important;
            }

            .navbar-area {
                padding: 10px !important;
            }
        }

    .error-message {
        color: #84204A;
        font-size: 0.875em;
        margin-top: 5px;
    }


    @media screen and (max-width: 960px) {
        #top-widget-social {
            margin-top: 20px;
        }
    }

    @media (min-width: 992px) and (max-width: 1366px) {
            div.breadcrumb-contents {
                margin-top: 6% !important;
            }
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tidescape - {{ __('contact.get_in_touch') }} </title>

    <link rel="stylesheet" href="{{ asset('assets/phone/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/phone/css/intlTelInput.css') }}">

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
                    <li><a style="color: #FF8C32"> {{ __('menu.contacts') }} </a></li>
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
                    <h4 class="breadcrumb-contents-title"> {{ __('contact.get_in_touch') }} </h4>
                    <ul class="breadcrumb-contents-list list-style-none">
                        <li class="breadcrumb-contents-list-item"> <a href="{{ url('/') }}" class="breadcrumb-contents-list-item-link"> {{ __('contact.home') }} </a> </li>
                        <li class="breadcrumb-contents-list-item"> {{ __('contact.get_in_touch') }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@include('_message')
</div>

<br>


    <section class="contact-area pat-100 pab-100">
        <div class="container">
            <div class="contact-map">
                <iframe src="{{ url('https://mapcarta.com/pt/N4378105291/Mapa') }}"></iframe>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class="contact-thumb">
                        <img src="{{ asset('assets/img/single-page/contact.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    <div class="contact-wrapper contact-padding bg-white radius-20">
                        <div class="contact-contents">
                            <h4 class="contact-contents-title"> {{ __('contact.get_in_touch') }} </h4>
                            <p class="contact-contents-para mt-2"> {{ __('contact.friendly_team') }} </p>
                            <div class="contact-contents-form custom-form">
                                <form id="contactForm" action="{{ route('store.contact') }}" method="POST">
                                    @csrf
                                    <div style="display: flex; gap: 10px">
                                        <div class="single-input mt-4">
                                            <input type="text" class="form--control radius-5" id="fn" name="fn" placeholder="{{ __('home/question.form_fn') }}" value="{{ old('fn') }}">
                                            <div class="error-message" id="fnError"></div>
                                        </div>
                                        <div class="single-input mt-4">
                                            <input type="text" class="form--control radius-5" id="ln" name="ln" placeholder="{{ __('home/question.form_ln') }}" value="{{ old('ln') }}">
                                            <div class="error-message" id="lnError"></div>
                                        </div>
                                    </div>
                                    <div class="single-input mt-4">
                                        <input type="email" class="form--control radius-5" id="email" name="email" placeholder="{{ __('home/question.form_email') }}" value="{{ old('email') }}">
                                        <div class="error-message" id="emailError"></div>
                                    </div>
                                    <div class="single-input mt-4">
                                        <input type="tel" class="form--control radius-5" id="phone" name="phone" placeholder="{{ __('home/question.form_phone') }}" value="{{ old('phone') }}">
                                        <div class="error-message" id="phoneError"></div>
                                    </div>
                                    <div class="single-input mt-4">
                                        <textarea class="form--control form-message radius-5" id="message" name="message" placeholder="{{ __('home/question.form_questions') }}">{{ old('message') }}</textarea>
                                        <div class="error-message" id="messageError"></div>
                                    </div>
                                    <button id="btn" name="btn" type="submit" class="btn btn-primary btn-sm radius-5 padding-10"><i class="fas fa-envelope"></i> {{ __('contact.get_in_touch') }} </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area end -->
    <!-- footer area start -->

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


<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Limpar mensagens de erro anteriores
        document.querySelectorAll('.error-message').forEach(function(el) {
            el.textContent = '';
        });

        // Validar primeiro nome
        const fn = document.getElementById('fn').value.trim();
        if (fn === '') {
            document.getElementById('fnError').textContent = '{{ __('contact.fn_error') }}';
            isValid = false;
        }

        // Validar último nome
        const ln = document.getElementById('ln').value.trim();
        if (ln === '') {
            document.getElementById('lnError').textContent = '{{ __('contact.ln_error') }}';
            isValid = false;
        }

        // Validar email
        const email = document.getElementById('email').value.trim();
        // Ajustado para verificar a extensão do domínio com pelo menos dois caracteres após o ponto
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{3,}$/;
        if (email === '' || !emailRegex.test(email)) {
            document.getElementById('emailError').textContent = '{{ __('contact.email_error') }}';
            isValid = false;
        }

        // Validar telefone
        const phone = document.getElementById('phone').value.trim();
        if (phone === '') {
            document.getElementById('phoneError').textContent = '{{ __('contact.phone_error') }}';
            isValid = false;
        }

        // Validar mensagem
        const message = document.getElementById('message').value.trim();
        if (message === '') {
            document.getElementById('messageError').textContent = '{{ __('contact.mensage_error') }}';
            isValid = false;
        }

        // Impedir envio do formulário se houver erros
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>



</body>

</html>
