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


        /* Ocultar colunas específicas em telas menores */
@media (max-width: 768px) {
    #example th:nth-child(3), #example td:nth-child(3), /* Coluna Local */
    #example th:nth-child(4), #example td:nth-child(4), /* Coluna Duration */
    #example th:nth-child(6), #example td:nth-child(6) { /* Coluna Resaltar */
        display: none;
    }

    /* Ajustar estilos das células restantes para melhor aparência */
    #example th, #example td {
        white-space: nowrap; /* Evitar quebra de linha em células */
    }

    /* Ajustar o contêiner da imagem */
    #example td img {
        height: auto; /* Ajustar altura automaticamente */
        max-width: 50px; /* Limitar largura máxima */
    }
}

/* Estilos adicionais para melhorar a experiência do usuário */
#example th, #example td {
    vertical-align: middle; /* Alinhar verticalmente ao meio */
}

#example td div {
    justify-content: center; /* Centralizar conteúdo do botão */
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
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/tours.title') }} </li>
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
                    <p>{{ __('backend/Pages/tours.title') }}</p>
                    <a href="{{ route('admin.dashboard.addTour') }}"><i title="{{ __('backend/Pages/tours.add') }}" style="font-size: 30px" class="las la-plus-circle"></i></a>
                </div>
                <br><br>
                @if (count($tours) == 0)
                    <div class="alert alert-danger" role="alert">
                        {{ __('backend/Pages/tours.no_tours') }}
                    </div>
                @else
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>{{ __('backend/Pages/tours.name') }}</th>
                                <th>{{ __('backend/Pages/tours.local') }}</th>
                                <th>{{ __('backend/Pages/tours.duration') }}</th>
                                <th>Avatar</th>
                                <th>{{ __('backend/Pages/tours.resaltar') }}</th>
                                <th style="text-align:right">{{ __('backend/Pages/tours.opt') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tours as $tour)
                            <tr>
                              <!--  <td>{{ $tour->id }}</td> -->
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->local }}</td>
                                <td>{{ $tour->duration }}</td>
                                <td style="width: 100px">
                                    <img src="{{ asset($tour->img) }}">
                                </td>
                                <td>{{ $tour->destaque == 'sim' ? 'Sim' : 'Não' }}</td>
                                <td>
                                    <div style="display: flex; gap: 5px">
                                        <a title="{{ __('backend/Pages/tours.delete') }}" class="btn btn-warning btn-sm" href="/admin/dashboard/tours/edit/{{ $tour->id }}">
                                            <i class="fas fa-info-circle"></i> {{ __('backend/Pages/tours.details') }}
                                        </a>
                                        <a title="{{ __('backend/Pages/tours.delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="/admin/dashboard/tours/delete/{{ $tour->id }}">
                                            <i class="fas fa-trash-alt"></i> {{ __('backend/Pages/tours.delete') }}
                                        </a>
                                    </div>
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
