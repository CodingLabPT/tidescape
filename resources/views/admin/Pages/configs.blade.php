<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>
    /* Ocultar colunas específicas em telas menores */
    @media (max-width: 768px) {
        #example th:nth-child(2), #example td:nth-child(2), /* Primeira coluna IMG */
        #example th:nth-child(3), #example td:nth-child(3), /* Segunda coluna IMG */
        #example th:nth-child(4), #example td:nth-child(4) { /* Terceira coluna IMG */
            display: none;
        }

        /* Ajustar estilos das células restantes para melhor aparência */
        #example th, #example td {
            white-space: nowrap; /* Evitar quebra de linha em células */
        }

        /* Ajustar o estilo dos botões */
        #example td a .btn {
            padding: 0.25rem 0.5rem; /* Ajustar padding dos botões */
            font-size: 0.875rem; /* Reduzir tamanho da fonte dos botões */
        }
    }

    /* Estilos adicionais para melhorar a experiência do usuário */
    #example th, #example td {
        vertical-align: middle; /* Alinhar verticalmente ao meio */
    }

    #example td div {
        justify-content: center; /* Centralizar conteúdo do botão */
    }

    #example td a .btn {
        padding: 0.25rem 0.5rem; /* Ajustar padding dos botões */
        font-size: 0.875rem; /* Reduzir tamanho da fonte dos botões */
    }

        .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}




        .dt-length {
            display: none;
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


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                        <p>{{ __('backend/Pages/configs.title') }}</p>
                        <a href="{{ url('/admin/dashboard/configs/add') }}"><i title="{{ __('backend/Pages/configs.title') }}" style="font-size: 30px" class="las la-plus-circle"></i></a>
                    </div>
                    <br><br>
                    @if (count($boats) == 0)
                        <div class="alert alert-danger" role="alert">
                            {{ __('backend/Pages/configs.no_vessels') }}
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-sailboat"></i> {{ __('backend/Pages/configs.boat') }}</th>
                                        <th><i class="fas fa-image"></i></th>
                                        <th><i class="fas fa-image"></i></th>
                                        <th><i class="fas fa-image"></i></th>
                                        <th>{{ __('backend/Pages/configs.opt') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($boats as $boat)
                                    <tr>
                                        <td><i class="fas fa-ship"></i> {{ $boat->tipo }}</td>
                                        <td><img style="width:100px; height:50px; background-size: cover" src="{{ asset($boat->img) }}"></td>
                                        <td><img style="width:100px; height:50px; background-size: cover" src="{{ asset($boat->img2) }}"></td>
                                        <td><img style="width:100px; height:50px; background-size: cover" src="{{ asset($boat->img3) }}"></td>
                                        <td>
                                            <a title="{{ __('backend/Pages/locals.details') }}" href="/admin/dashboard/configs/edit/{{ $boat->id }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-info-circle"></i> {{ __('backend/Pages/locals.details') }}
                                            </a>
                                            <a title="Delete Boat" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="/admin/dashboard/configs/delete/{{ $boat->id }}"><i class="fas fa-trash-alt"></i> {{ __('backend/Pages/durations.delete') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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
