<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>

    input, textarea, select, fieldset, button {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border-radius: .375rem !important;
    }

        .dt-column-order {
            display: none
        }

        tr td img {
            width: 100%;
            height: 250px;
        }

            .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

.table>:not(caption)>*>* {
    border-bottom-width: 0px !important;
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
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/configs.title') }} </li>
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
                        <p>{{ __('backend/Pages/configs.editing') }} <strong><em>{{ $boat->tipo }}</em></strong></p>
                    </div>
                    <br><br>
                    <form method="POST" action="{{ route('boats.update', $boat->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <table class="table">
                            <div class="mb-3">
                                <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.name') }}</span>
                                <input placeholder="{{ __('backend/Pages/addBoatForm.name_placeholder') }}" type="text" value="{{ $boat->tipo }}" class="form-control" id="type" name="type" required>
                            </div>

                            <div class="mb-3">
                                <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.desc') }}</span>
                                <textarea class="form-control" required placeholder="{{ __('backend/Pages/addBoatForm.desc_placeholder') }}" style="width:100%; padding: 8px;" name="obs" id="obs" cols="20" rows="5">{{ $boat->descricao }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                    <div class="caption">
                                        <p><em>{{ __('backend/Pages/configs.imag_principal') }}</em></p>
                                        </div>
                                        <img src="<?php echo asset("{$boat->img}")?>" alt="">
                                        <input class="form-control" type="file" id="img" name="img">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p>{{ __('backend/Pages/configs.add_img') }}</p>
                                        </div>
                                        <img src="<?php echo asset("{$boat->img2}")?>" alt="">
                                        <input class="form-control" type="file" id="img2" name="img2">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <p>{{ __('backend/Pages/configs.add_img') }}</p>
                                        </div>
                                        <img src="<?php echo asset("{$boat->img3}")?>" alt="">
                                        <input class="form-control" type="file" id="img3" name="img3">
                                    </div>
                                </div>
                            </div>
                        </table>
                        <div class="d-flex justify-content-between">
                            <button title="{{ __('backend/Pages/configs.update') }}" type="submit" style="background-color: #146C43" type="button" class="btn btn-success btn-sm"><i class="fas fa-sync-alt"></i>{{ __('backend/Pages/configs.update') }}</button>
                            <a title="Go Back" class="btn btn-secondary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i>{{ __('backend/Pages/configs.go_back') }}</a>
                        </div>
                    </form>
                </div>
                <!--------------------------->
            </div>

        </div>
    </div>
    <!-- Dashboard area end -->


    @include('admin.Partials._dataTable')

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
