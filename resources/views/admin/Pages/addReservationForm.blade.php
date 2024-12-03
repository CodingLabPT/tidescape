<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>
    .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

        #name, #ep, #eg, #emg, #destaque {
            border-color: #CED4DA;
        }

        input, textarea, select, label, fieldset, button {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border-radius: .375rem !important;
    }

        label {
            background-color: #EAECF0; color:#6C757D; padding: 10px;
            display: block;
            width: 100%;
        }

        textarea {
            background-color: red;
        }

        .for {
            cursor: pointer;
            background-color: transparent;
            color: #6C757D;
            border: 1px solid #CED4DA;
        }

        #img, #img2, #img3 {
        opacity: 0;
        position: absolute;
        z-index: -1;
        }

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
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


</head>

<body>

        @include('admin.Partials._header')

    <!-- Breadcrumb area Starts -->
    <div class="breadcrumb-area breadcrumb-padding">
        <div class="container custom-container-one">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-contents">
                        <h4 class="breadcrumb-contents-title"> Dashboard </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('admin.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents"> {{ __('home/question.add_new_reserve') }} </li>

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
                <div class="dashboard-right-contents mt-4 mt-lg-0" style="border-radius:5px">
                    <div class="breadcrumb-contents">
                        <p>{{ __('home/question.add_new_reserve') }}</p>
                    </div>
                    <br>
                    <form method="POST" id="boatForm" name="boatForm" action="{{ route('admin.reserves.store') }}" data_funcoes_url="{{ route('admin.reserve.store') }}">
                        @csrf
                        <fieldset class="mb-4 border rounded p-4" style="border-color: #c2c2c2;">
                            <legend class="w-auto px-2">{{ __('home/question.personal_info') }}</legend>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="fn" class="form-label">{{ __('home/question.form_fn') }}</label>
                                    <input type="text" class="form-control @error('fn') is-invalid @enderror" id="fn" name="fn" required placeholder="{{ __('home/question.form_fn') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="ln" class="form-label">{{ __('home/question.form_ln') }}</label>
                                    <input type="text" class="form-control @error('ln') is-invalid @enderror" id="ln" name="ln" required placeholder="{{ __('home/question.form_ln') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">{{ __('home/question.form_phone') }}</label>
                                    <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" inputmode="numeric" maxlength="19" required placeholder="{{ __('home/question.form_phone') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">{{ __('home/question.form_email') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('home/question.form_email') }}" required>
                                </div>
                            </div>

                        </fieldset>

                        <div class="mb-3">
                            <label for="tour" class="form-label">{{ __('home/question.desired_tour') }}</label>
                            <select name="tour" id="tour" class="form-select @error('tour') is-invalid @enderror" required>
                                <option value="">{{ __('home/question.desired_tour') }}</option>
                                @foreach ($tours as $tour)
                                    <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="boat" class="form-label">{{ __('home/question.desired_vessel') }}</label>
                            <select name="boat" id="boat" class="form-select @error('boat') is-invalid @enderror" required>
                                <option value="">{{ __('home/question.desired_vessel') }}</option>
                                @foreach ($boats as $boat)
                                    <option value="{{ $boat->id }}">{{ $boat->tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="checkin" class="form-label">{{ __('home/question.desired_date') }}</label>
                                <input type="date" class="form-control @error('checkin') is-invalid @enderror" id="checkin" name="checkin" required>
                                @error('checkin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="horas" class="form-label">{{ __('home/question.desired_time') }}</label>
                                <input type="time" class="form-control @error('horas') is-invalid @enderror" id="horas" name="horas" min="08:00" max="19:00" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> {{ __('backend/Pages/addTourForm.submit_btn') }}</button>
                            <a title="Go Back" class="btn btn-secondary" href="{{ URL::previous() }}">
                                <i class="fas fa-arrow-left"></i> {{ __('backend/Pages/reserves.go_back') }}
                            </a>
                        </div>
                    </form>
                </div>
                <!--------------------------->
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
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                // Opções adicionais podem ser configuradas aqui
                initialCountry: "auto", // Define o país inicial automaticamente
                geoIpLookup: function(callback) {
                    fetch("https://ipinfo.io?token=YOUR_TOKEN", { cache: "reload" })
                        .then(response => response.json())
                        .then(data => {
                            var countryCode = (data && data.country) ? data.country : "pt";
                            callback(countryCode);
                        });
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Para formatação
            });
        });
    </script>

</body>

</html>
