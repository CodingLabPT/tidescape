<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>
        .dt-length {
            display: none;
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

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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
                    <p>{{ __('backend/Pages/durations.title') }}</p>
                    <a href="{{ route('durations.create') }}"><i title="Add Duration" style="font-size: 30px" class="las la-plus-circle"></i></a>
                </div>
                <br><br>
                @if (count($durations) == 0)
                    <div class="alert alert-danger" role="alert">
                    {{ __('backend/Pages/durations.no_durations') }}
                    </div>
                @else
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('backend/Pages/durations.name') }}</th>
                                <th style="text-align: right">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($durations as $duration)
                            <tr>
                                <td>{{ $duration->name }}</td>
                                <td style="text-align: right">
                                    <a title="{{ __('backend/Pages/durations.details') }}" class="btn btn-warning btn-sm" href="{{ route('durations.details', $duration->id) }}">
                                        <i class="fas fa-info-circle"></i> {{ __('backend/Pages/durations.details') }}
                                    </a>
                                    <a title="{{ __('backend/Pages/durations.delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('backend/Pages/durations.are_you_sure_to_delete') }}')" href="{{ route('durations.destroy', $duration->id) }}">
                                        <i class="fas fa-trash-alt"></i> {{ __('backend/Pages/durations.delete') }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true, // Ativa a paginação
            "searching": true, // Ativa a busca
            "ordering": true, // Ativa a ordenação
            "info": true, // Mostra informações sobre a tabela
            "pageLength": 7 // Define o número de registros por página
        });
    });
    </script>

</body>

</html>
