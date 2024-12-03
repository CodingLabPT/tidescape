<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
.navbar-border {
    border-bottom: none !important;
}

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

.table th, .table td {
    vertical-align: middle;
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

.badge-success {
    background-color: #28a745;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tidescape - {{ __('backend/Pages/myMessages.title') }}</title>

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
    <!-- Scripts -->

    <!-- Language selector Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                            <li class="breadcrumb-contents-list-item"> <a href="{{ route('user.dashboard') }}" class="breadcrumb-contents-list-item-link"> Home </a> </li>
                            <li class="breadcrumb-contents-list-item"> {{ __('backend/Pages/myMessages.title') }} </li>
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
                        <p>{{ __('backend/Pages/reserves.details') }} <em> <strong> {{ $contact->fn }} {{ $contact->ln }} </strong> (#{{ $contact->id }}) </em></p>
                        @if ($contact->status === 'Pendent')
                            <span class="badge badge-danger">{{ __('backend/Pages/messages.pending') }}</span>
                        @else
                            <span class="badge badge-success">{{ __('backend/Pages/messages.solved') }}</span>
                        @endif
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
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
                                            <span class="badge badge-danger">{{ __('backend/Pages/messages.waiting') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ $contact->resposta }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a title="Go Back" class="btn btn-secondary" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i>{{ __('backend/Pages/messages.go_back') }}</a>
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

</body>

</html>
