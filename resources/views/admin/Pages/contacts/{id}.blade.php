<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <style>

        .table-header {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            font-size: 1.2em;
        }

        .badge {
            display: inline-block;
            font-weight: normal !important;
            padding: .35em .65em;
            font-size: .75em;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
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

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .text-right {
            text-align: right;
        }

        .alert {
            margin: 0;
            padding: 5px;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .float-right {
            float: right;
        }


        .btn i {
            margin-right: 5px; /* Espaçamento entre o ícone e o texto */
        }

        input, select {
            width: 100%;
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @include('components._styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <p>{{ __('backend/Pages/messages.detalles_del_contacto') }} <em> <strong> {{ $contact->fn }} {{ $contact->ln }} </strong> (#{{ $contact->id }}) </em></p>
                        @if ($contact->status === 'Pendent')
                            <p class="badge badge-danger"> <em> <strong> {{ __('backend/Pages/messages.pending') }} </strong> </em> </p>
                        @else
                            <p class="badge badge-success"> <em> <strong> {{ __('backend/Pages/messages.solved') }} </strong> </em> </p>
                        @endif

                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>{{ __('backend/Pages/messages.email') }}</td>
                                    <td class="text-right">{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/messages.message') }}</td>
                                    <td class="text-right">{{ $contact->message }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/messages.day') }}</td>
                                    <td class="text-right">{{ $contact->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/messages.response') }}</td>
                                    <td class="text-right">
                                        @if ($contact->resposta == "")
                                            <strong><em>Sem resposta</em></strong>
                                        @else
                                            <strong><em>{{ $contact->resposta }}</em></strong>
                                        @endif
                                    </td>
                                </tr>
                                @if ($contact->resposta == "")
                                <tr>
                                    <td colspan="2">
                                        <form action="{{ route('allcontacts.update', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <textarea class="form-control" name="response" id="response" cols="30" rows="5" required placeholder="{{ __('backend/Pages/messages.type_text_here') }}"></textarea>
                                            <input type="hidden" name="message" id="message" value="{{ $contact->message }}">
                                            <input type="hidden" name="email" id="email" value="{{ $contact->email }}">
                                            <button style="background-color: #0B5ED7" title="Send response" class="btn btn-primary btn-sm mt-2 float-right" type="submit"><i class="fas fa-paper-plane"></i> {{ __('backend/Pages/messages.send') }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            </table>
                    </div>
                    <a title="{{ __('backend/Pages/messages.go_back ') }}" class="btn btn-secondary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i>{{ __('backend/Pages/messages.go_back') }}</a>
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
