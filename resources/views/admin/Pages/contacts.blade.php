<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>

        .badge {
            display: inline-block;
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

        .btn i {
            margin-right: 5px; /* Espaçamento entre o ícone e o texto */
        }

        /* Ocultar colunas específicas em telas menores */
        @media (max-width: 768px) {
            #myTable th:nth-child(3), #myTable td:nth-child(3), .span span { /* Coluna Status */
                display: none;
            }

            /* Ajustar estilos das células restantes para melhor aparência */
            #myTable th, #myTable td {
                white-space: nowrap; /* Evitar quebra de linha em células */
            }

            /* Ajustar o estilo dos alertas */
            #myTable .alert {
                padding: 0.25rem 0.5rem; /* Reduzir padding dos alertas */
                font-size: 0.875rem; /* Reduzir tamanho da fonte dos alertas */
            }
        }

        /* Estilos adicionais para melhorar a experiência do usuário */
        #myTable th, #myTable td {
            vertical-align: middle; /* Alinhar verticalmente ao meio */
        }

        #myTable td div {
            justify-content: center; /* Centralizar conteúdo do botão */
        }

        #myTable td a .btn {
            padding: 0.25rem 0.5rem; /* Ajustar padding dos botões */
            font-size: 0.875rem; /* Reduzir tamanho da fonte dos botões */
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

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
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/messages.title') }} </li>
                            <li class="breadcrumb-contents-list-item">
                                <form method="GET" action="{{ route('export.contacts') }}">
                                    @csrf
                                    <button style="background-color: #0dcaf0" class="btn btn-info btn-sm" type="submit"><i class="las la-file-export"></i>{{ __('backend/Pages/reserves.export') }}
                                </form>
                            </li>
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
                        <p>{{ __('backend/Pages/messages.title') }}</p>
                    </div>
                    <br><br>
                    @if (count($contacts) == 0)
                        <div class="alert alert-danger" role="alert">
                            {{ __('backend/Pages/messages.no_messajes') }}
                        </div>
                    @else
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('backend/Pages/messages.name') }}</th>
                                    <th>{{ __('backend/Pages/messages.email') }}</th>
                                    <th>{{ __('backend/Pages/messages.phone') }}</th>
                                    <th>{{ __('backend/Pages/messages.Status') }}</th>
                                    <th style="text-align:right">{{ __('backend/Pages/messages.opt') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->fn }} {{ $contact->ln }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td class="status-cell">
                                            @if ($contact->status === 'Pendent')
                                                <span class="badge badge-danger">
                                                    {{ __('backend/Pages/messages.pending') }}
                                                </span>
                                            @else
                                                <span class="badge badge-success">
                                                    {{ __('backend/Pages/messages.solved') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="span" style="text-align:right">
                                            <a title="{{ __('backend/Pages/messages.details') }}" class="btn btn-warning btn-sm" href="{{ route('allcontacts.details', $contact->id) }}"> <i class="fas fa-info-circle"></i><span>{{ __('backend/Pages/messages.details') }}</span></a>
                                            <a title="{{ __('backend/Pages/messages.delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ route('allcontacts.destroy', $contact->id) }}"> <i class="fas fa-trash-alt"></i><span>{{ __('backend/Pages/messages.delete') }}</span></a>
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
