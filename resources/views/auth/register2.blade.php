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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <!-- favicon -->
    <link rel=icon href="{{ asset('assets/img/logo-favicon.png') }}" sizes="16x16" type="icon/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
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
                <form method="POST" action="{{ route('register.store') }}" class="w-full md:w-1/2 p-8" enctype="multipart/form-data">
                    @csrf

                    <x-text-input id="login" class="block mt-1 w-full" type="hidden" name="tour" value="{{ $id }}" autofocus autocomplete="username" />

                    <div class="mb-4">
                        <h2 class="text-2xl font-bold mb-2">{{ __('auth.login.title') }}</h2>
                        <small class="text-gray-600 mb-4">{{ __('auth.register.title') }}</small>
                    </div>

                    <!-- Campo de Upload de Foto de Perfil -->
                    <div class="mb-4 text-center">
                        <label for="profile_photo" class="block text-gray-700 text-sm font-bold">{{ __('auth.register.profile_photo') }}</label>
                        <small for="profile_photo" class="block text-gray-500 text-sm mb-2">Clique ou arraste para carregar uma imagem</small>
                        <div class="flex justify-center mb-4">
                            <div class="relative">
                                <img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover mb-2">
                                <input id="profile_photo" name="profile_photo" type="file" name="profile_photo" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 flex space-x-4">
                        <!-- fn -->
                        <div class="flex-1">
                            <label for="fn" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.fn') }}</label>
                            <input id="fn" type="text" name="fn" :value="old('fn')" required autofocus autocomplete="fn" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- ln -->
                        <div class="flex-1">
                            <label for="ln" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.ln') }}</label>
                            <input id="ln" type="text" name="ln" :value="old('ln')" required autofocus autocomplete="ln" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4 flex space-x-4">
                        <!-- tax id -->
                        <div class="flex-1">
                            <label for="login" class="block text-gray-700 text-sm font-bold mb-2">{{ __('auth.register.tax_id') }}</label>
                            <input id="login" type="number" name="nif" :value="old('nif')" autofocus autocomplete="nf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <!-- phone -->
                        <div class="flex-1">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.phone_number') }}</label>
                            <input id="phone" type="text" inputmode="numeric" maxlength="19" name="phone" :value="old('phone')" required autofocus autocomplete="phone" class="shadow appearance-none border rounded w-full py-2 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <!-- email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.email') }}</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4 flex space-x-4">
                        <!-- password -->
                        <div class="flex-1">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.password') }}</label>
                            <input type="password" name="password" :value="old('password')" required autofocus autocomplete="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <!-- confirm password -->
                        <div class="flex-1">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2 required">{{ __('auth.register.confirm_password') }}</label>
                            <input type="password" name="password_confirmation" :value="old('password_confirmation')" required autofocus autocomplete="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mt-4" style="display: flex">
                        <input type="checkbox" name="checkbox" :value="old('checkbox')" class="mr-2 leading-tight">
                        <label for="remember_me" class="text-xs md:text-sm text-gray-600">{{ __('auth.register.terms') }}</label>
                    </div>

                    <div class="mt-4">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" id="btnReg" name="btnReg"> {{ __('auth.register.btn_register') }} </button>
                    </div>

                    <!-- Feedback for Incorrect Credentials -->
                    @if ($errors->any())
                        <div class="mt-4">
                            <p class="text-red-500 text-xs italic">The provided credentials are incorrect. Please follow the steps below:</p>
                            <ul class="list-disc list-inside text-red-500 text-xs">
                                @if ($errors->has('phone'))
                                    <li>The entered Phone number is already in use!</li>
                                @endif
                                @if ($errors->has('email'))
                                    <li>The entered email is already in use!</li>
                                @endif
                                @if ($errors->has('password'))
                                    <li>The password must be at least 9 characters long!</li>
                                @endif
                                @if ($errors->has('checkbox'))
                                    <li>You did not agree to the terms!</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <p class="mt-4 text-center text-gray-600">{{ __('auth.register.already_account') }} <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-800">{{ __('auth.register.login_link') }}</a></p>
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

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>
