<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .required:after {
            content: '*';
            color: red;
            margin-left: 0.25rem;
        }

        .login-area {
            width: 100%;
            height: 100vh; /* 100% da altura da viewport */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6; /* Cor de fundo opcional */
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('auth.login.page_title') }} </title>

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
    <!-- Main tailwindcss -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

    <section class="login-area py-10 bg-gray-100">
        <div class="container mx-auto flex justify-center items-center">
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex max-w-4xl">

                <!-- Image Section -->
                <div class="login-wrapper-thumb hidden md:block">
                    <a href="/">
                        <img src="{{ asset('assets/img/single-page/login.jpg') }}" alt="Login Image" class="h-full w-full object-cover">
                    </a>
                </div>

                <!-- Form Section -->
                <form method="POST" action="{{ route('login') }}" class="w-full md:w-1/2 p-8">
                    @csrf
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold mb-2">{{ __('auth.login.title') }}</h2>
                        <p class="text-gray-600 mb-4">{{ __('auth.login.subtitle') }}</p>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <label for="login" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.login.login') }}</label>
                        <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus autocomplete="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.login.password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <p class="text-red-500 text-xs italic mt-2">@error('password') {{ $message }} @enderror</p>
                    </div>

                    <!-- Feedback for Incorrect Credentials -->
                    @if ($errors->any())
                        <div class="mb-4">
                            <p class="text-red-500 text-xs italic">The provided credentials are incorrect. Please follow the steps below:</p>
                            <ul class="list-disc list-inside text-red-500 text-xs">
                                <li>Make sure your username is correct.</li>
                                <li>Confirm that your password has been entered correctly.</li>
                                <li>If you forgot your password, click on "Forgot your password?" to reset it.</li>
                            </ul>
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('auth.login.btn_login') }}
                        </button>
                        <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('auth.login.forgot_password') }}
                        </a>
                    </div>

                    <div class="mt-4">
                        <input type="checkbox" id="remember_me" name="remember_me" class="mr-2 leading-tight">
                        <label for="remember_me" class="text-sm text-gray-600">{{ __('auth.login.remember_me') }}</label>
                    </div>

                    <p class="mt-4 text-center text-gray-600">{{ __('auth.login.no_account') }} <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-800">{{ __('auth.login.register_now') }}</a></p>
                    <div class="block md:hidden">
                        Click to <a class="text-blue-500 hover:text-blue-800" href="/">home</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Mouse Cursor start -->
    <div class="mouse-move mouse-outer"></div>
    <div class="mouse-move mouse-inner"></div>
    <!-- Mouse Cursor Ends -->

    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- jquery Migrate -->
    <script src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Wow Js -->
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <!-- Slick Js -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- ImageLoaded Js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope Js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific Popup Js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- Nice Select Js -->
    <script src="{{ asset('assets/js/jquery.nice-select.js') }}"></script>
    <!-- Flat Picker Js -->
    <script src="{{ asset('assets/js/flatpicker.js') }}"></script>
    <!-- Range Slider Js -->
    <script src="{{ asset('assets/js/nouislider-8.5.1.min.js') }}"></script>
    <!-- TellInput Js -->
    <script src="{{ asset('assets/js/intlTelInput.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
