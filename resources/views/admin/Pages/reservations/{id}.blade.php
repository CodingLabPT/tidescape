<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

.table-header {
    background-color: #f8f9fa;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    font-size: 1.2em;
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

.form-check {
    display: flex;
    align-items: center;
}
</style>

<head>
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
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/reserves.title') }} / {{ __('backend/Pages/reserves.details_of_reserve') }} </li>
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
                        <p>{{ __('backend/Pages/reserves.details_of_reserve') }} <em> <strong> {{ $reserve->fn }} {{ $reserve->ln }} </strong> (#{{ $reserve->id }}) </em></p>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.tour_name') }}</td>
                                    <td class="text-end">{{ $tourName }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.local') }}</td>
                                    <td class="text-end">{{ $tourLocal }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.duration') }}</td>
                                    <td class="text-end">{{ $tourDuration }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.boat') }}</td>
                                    <td class="text-end">
                                        @if ($reserve->tipo_embarcacao === 'small')
                                            {{ __('backend/Pages/reserves.small') }} ({{ $tourEP }}€)
                                        @elseif ($reserve->tipo_embarcacao === 'big')
                                            {{ __('backend/Pages/reserves.big') }} ({{ $tourEG }}€)
                                        @else
                                            {{ __('backend/Pages/reserves.large') }} ({{ $tourEMG }}€)
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.day') }}</td>
                                    <td class="text-end">{{ $reserve->checkin }} / {{ $reserve->horas }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.phone') }}</td>
                                    <td class="text-end">{{ $reserve->tel }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.email') }}</td>
                                    <td class="text-end">{{ $reserve->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('backend/Pages/reserves.Status') }}</td>
                                    <td class="text-end">
                                        @if ($reserve->status == 'Pendent')
                                            <span class="badge bg-danger">{{ __('backend/Pages/reserves.pending') }}</span>
                                        @elseif($reserve->status == 'Waiting')
                                            <span class="badge bg-warning">{{ __('backend/Pages/reserves.waiting') }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __('backend/Pages/reserves.active') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @if($reserve->status == 'Waiting')
                        <form action="{{ route('reserves.validate', $reserve->id) }}" method="POST" class="mt-2">
                                @method('PUT')
                                @csrf
                                <div style="display: flex; justify-content: right; align-items: center; gap: 5px">
                                    <div>
                                        <span>{{ __('backend/Pages/reserves.validate') }}</span>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="validate" id="validate">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: right; align-items: center">
                                    <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-check"></i> {{ __('backend/Pages/reserves.validate') }}</button>
                                </div>
                        </form>
                    @endif

                    <table style="width: 100%">
                        <tr>
                            <td style="text-align: left">
                                <a title="Go Back" class="btn btn-secondary" href="{{ URL::previous() }}">
                                    <i class="fas fa-arrow-left"></i> {{ __('backend/Pages/reserves.go_back') }}
                                </a>
                            </td>
                        </tr>
                    </table>


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
        function redirect() {
            window.location.href = "/";
        }
    </script>
</body>

</html>
