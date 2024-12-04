<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>

    form span {
        background-color: #EAECF0;
        color: #6C757D;
        padding: 10px;
        display: block;
        width: 100%;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border-radius: .375rem !important;
        margin-bottom: 8px;
    }


    input, textarea, select, fieldset, button {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
    }

    .table>:not(caption)>*>* {
        border-bottom-width: 0px !important;
    }


    .btn i {
        margin-right: 5px; /* Espa���amento entre o ���cone e o texto */
    }

    input, select {
        width: 100%;
        padding: 10px;
    }

    form img {
        width: 100%;
        height: 250px;
    }

    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('backend/Pages/configs.title_geral') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/configs.details') }} </li>
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
                        <p><strong><em>{{ $tour->name }}</em></strong> </p>
                    </div>
                    <br><br>
                    <form method="POST" action="{{ route('tours.update', $tour->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <table class="table">

                            <tr>
                                <td colspan="2">
                                    <span style="font-style: italic; color: #999999">{{ __('backend/Pages/tours.name') }}</span>
                                    <input value="{{ $tour->name }}" placeholder="{{ __('backend/Pages/addTourForm.namePlaceholder') }}" type="text" class="form-control" id="name" name="name" required>
                                </td>
                            </tr>


                            <tr>
                                <td colspan="2">
                                    <span style="font-style: italic; color: #999999">{{ __('backend/Pages/reserves.local') }}</span>
                                    <select name="local" id="local" class="form-control">
                                        <option value="{{ $tour->local }}" selected>{{ $tour->local }}</option>
                                        @foreach ($locals as $local)
                                            <option value="{{ $local->name }}">{{ $local->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span style="font-style: italic; color: #999999">{{ __('backend/Pages/reserves.duration') }}</span>
                                    <select name="duration" id="duration" class="form-control">
                                        <option value="{{ $tour->duration }}" selected>{{ $tour->duration }}</option>
                                        @foreach ($durations as $duration)
                                            <option value="{{ $duration->name }}">{{ $duration->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addTourForm.highlight') }} "Home"</span>
                                    <select name="destaque" id="destaque" class="form-control">
                                        @if ($tour->destaque == 'sim')
                                            <option checked value="{{ $tour->destaque }}">Sim</option>
                                            <option value="nao">Não</option>
                                        @else
                                        <option checked value="{{ $tour->destaque }}">Não</option>
                                            <option value="sim">Sim</option>
                                        @endif

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addTourForm.obs') }}</span>
                                    <textarea class="form-control" style="padding:10px; width: 100%" placeholder="{{ __('backend/Pages/addTourForm.obs') }}" required style="width:100%" name="obs" id="obs" cols="20" rows="5">{{ $tour->obs }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addTourForm.pricesmall') }}</span>
                                            <input class="form-control" type="number" maxlength="4" name="ep" id="ep" type="text" value="{{ $tour->ep }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addTourForm.pricebig') }}</span>
                                            <input class="form-control" type="number" maxlength="4" name="eg" id="eg" type="text" value="{{ $tour->eg }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addTourForm.priceslarge') }}</span>
                                            <input class="form-control" type="number" maxlength="4" name="emg" id="emg" type="text" value="{{ $tour->emg }}" required>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                            <div class="caption">
                                                <p><em>{{ __('backend/Pages/addTourForm.principal_img') }}</em></p>
                                                </div>
                                                <img src="<?php echo asset("{$tour->img}")?>" alt="">
                                                <input class="form-control" type="file" id="img" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <div class="caption">
                                                    <p>{{ __('backend/Pages/addTourForm.adicional_img') }}</p>
                                                </div>
                                                <img src="<?php echo asset("{$tour->img2}")?>" alt="">
                                                <input class="form-control" type="file" id="img2" name="img2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <div class="caption">
                                                    <p>{{ __('backend/Pages/addTourForm.adicional_img') }}</p>
                                                </div>
                                                <img src="<?php echo asset("{$tour->img3}")?>" alt="">
                                                <input class="form-control" type="file" id="img3" name="img3">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <button title="Update tour" type="submit" style="background-color: #146C43" class="btn btn-success btn-sm">
                                <i class="fas fa-sync-alt"></i> {{ __('backend/Pages/tours.update') }}
                            </button>
                            <a title="Go Back" class="btn btn-secondary btn-sm" href="{{ URL::previous() }}">
                                <i class="fas fa-arrow-left"></i> {{ __('backend/Pages/tours.go_back') }}
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

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"> <i class="las la-angle-up"></i> </span>
    </div>
    <!-- back to top area end -->

    @include('components._scripts')
</body>

</html>
