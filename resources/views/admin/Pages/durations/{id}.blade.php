<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>
        input, textarea, select, fieldset, button {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border-radius: .375rem !important;
    }


            table td, table th  {
            border: none !important;
        }

        input, select {
            width: 100%;
            padding: 10px;
        }

        form img {
            width: 100%;
            height: 250px;
        }

    .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
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
                        <h4 class="breadcrumb-contents-title"> Dashboard </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('admin.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/durations.title') }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @include('_message')
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
                @include('admin.Partials.dash')

                <!--------------------------->
                <div class="dashboard-right-contents mt-4 mt-lg-0" style="border-radius:5px">
                    <div class="breadcrumb-contents">
                        <p>{{ __('backend/Pages/durations.editing') }} <em>{{ $duration->name }}</em></p>
                    </div>
                    <br><br>
                    <form method="POST" action="{{ route('durations.update', $duration->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <input required name="name" id="name" type="text" class="form-control" value="{{ $duration->name }}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <button title="{{ __('backend/Pages/locals.update') }}" type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-sync-alt"></i> {{ __('backend/Pages/locals.update') }}
                            </button>
                            <a title="Go Back" class="btn btn-secondary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i>{{ __('backend/Pages/locals.go_back') }}</a>
                        </div>
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
</body>

</html>
