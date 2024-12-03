<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <style>

        .dt-paging button,  .dt-paging input, .dt-paging optgroup, .dt-paging select, .dt-paging textarea {
        border: 1px solid !important;
        padding: 5px 10px;
        float: right;
    }

    .dt-search {
        float: right !important;
    }

    .table-responsive {
    margin: 20px 0;
}

.table th, .table td {
    vertical-align: middle;
}

.badge {
    padding: 0.5em 0.75em;
    font-size: 0.875em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}

.badge-danger {
    background-color: #dc3545;
}

.badge-warning {
    background-color: #ffc107;
    color: #212529;
}

.badge-success {
    background-color: #28a745;
}

.btn-warning {
    background-color: #FFCA2C;
    border-color: #FFCA2C;
    color: #212529;
}

.btn-warning:hover {
    background-color: #e0b800;
    border-color: #d1a700;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

@media (max-width: 1399px) {
    .btn-icon-only {
        /* Esconde o texto dos botões */
        span {
            display: none;
        }
    }
}



        /* Ocultar colunas específicas em telas menores */
@media (max-width: 768px) {
    #example th:nth-child(3), #example td:nth-child(3), /* Coluna boat */
    #example th:nth-child(4), #example td:nth-child(4), /* Coluna day */
    #example th:nth-child(5), #example td:nth-child(5) { /* Coluna status */
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
    </style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>

    <!-- favicon -->
    <link rel=icon href="{{ asset('assets/img/logo-favicon.png') }}" sizes="16x16" type="icon/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/geral.css') }}">
    <!-- Language selector Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                        <h4 class="breadcrumb-contents-title"> User Dashboard </h4>
                        <ul class="breadcrumb-contents-list list-style-none">
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('user.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/myReserves.title') }} </li>
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
                @include('admin.Partials.dash_user')
                <!--------------------------->
                <div class="dashboard-right-contents mt-4 mt-lg-0" style="border-radius:5px">
                    <div class="breadcrumb-contents">
                        <p>{{ __('backend/Pages/myReserves.title') }}</p>
                    </div>
                    <br>
                    @if (count($reserveQuery) == 0)
                        <div class="alert alert-danger" role="alert">
                            {{ __('backend/Pages/myReserves.no') }}
                        </div>
                    @else
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend/Pages/reserves.name') }}</th>
                                    <th>{{ __('backend/Pages/reserves.phone') }}</th>
                                    <th>{{ __('backend/Pages/reserves.boat') }}</th>
                                    <th>{{ __('backend/Pages/reserves.day') }}</th>
                                    <th>{{ __('backend/Pages/reserves.Status') }}</th>
                                    <th style="text-align: right">{{ __('backend/Pages/reserves.opt') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reserveQuery as $reserve)
                                <tr>
                                    <td>{{ $reserve->fn }} {{ $reserve->ln }}</td>
                                    <td>{{ $reserve->tel }}</td>
                                    <td>
                                        @if ($reserve->tipo_embarcacao === 'small')
                                            {{ __('backend/Pages/reserves.small') }}
                                        @elseif ($reserve->tipo_embarcacao === 'big')
                                            {{ __('backend/Pages/reserves.big') }}
                                        @else
                                            {{ __('backend/Pages/reserves.large') }}
                                        @endif
                                    </td>
                                    <td>{{ $reserve->checkin }} / {{ $reserve->horas }}h</td>
                                    <td>
                                        @if ($reserve->status === 'Pendent')
                                            <span class="badge badge-danger">{{ __('backend/Pages/reserves.pending') }}</span>
                                        @elseif ($reserve->status === 'Waiting')
                                            <span class="badge badge-warning">{{ __('backend/Pages/reserves.waiting') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('backend/Pages/reserves.active') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a title="{{ __('backend/Pages/reserves.details') }}" href="{{ route('myreserves.details', $reserve->id) }}" class="btn btn-warning btn-sm btn-icon-only">
                                            <i class="fas fa-info-circle"></i> <span>{{ __('backend/Pages/reserves.details') }}</span>
                                        </a>
                                        <a title="{{ __('backend/Pages/reserves.delete') }}" class="btn btn-danger btn-sm btn-icon-only" onclick="return confirm('Are you sure to cancel?')" href="{{ route('myreserves.destroy', $reserve->id) }}">
                                            <i class="fas fa-trash-alt"></i> <span>{{ __('backend/Pages/reserves.delete') }}</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
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

    <!-- jquery -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- jquery Migrate -->
    <script src="../assets/js/jquery-migrate.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Wow Js -->
    <script src="../assets/js/wow.js"></script>
    <!-- Slick Js -->
    <script src="../assets/js/slick.js"></script>
    <!-- ImageLoaded Js -->
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Isotope Js -->
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <!-- Magnific Popup Js -->
    <script src="../assets/js/jquery.magnific-popup.js"></script>
    <!-- Nice Select Js -->
    <script src="../assets/js/jquery.nice-select.js"></script>
    <!-- Flat Picker Js -->
    <script src="../assets/js/flatpicker.js"></script>
    <!-- Range Slider Js -->
    <script src="../assets/js/nouislider-8.5.1.min.js"></script>
    <!-- TellInput Js -->
    <script src="../assets/js/intlTelInput.js"></script>
    <!-- main js -->
    <script src="../assets/js/main.js"></script>


    <script>
        function redirect() {
            window.location.href = "/";
        }
    </script>

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
