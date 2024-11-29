<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/languageSelector.css') }}">

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

    .btn i {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
    }

    #name, #ep, #eg, #emg, #destaque {
        border-color: #CED4DA;
    }

    input, textarea, select, fieldset, button {
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        border-radius: .375rem !important;
    }

    .imgs label {
        background-color: #EAECF0; color:#6C757D; padding: 10px;
        display: block;
        width: 100%;
    }

    textarea {
        background-color: red;
    }

    .for {
        cursor: pointer;
        background-color: transparent;
        color: #6C757D;
        border: 1px solid #CED4DA;
    }

    #img, #img2, #img3 {
    opacity: 0;
    position: absolute;
    z-index: -1;
    }

    body::-webkit-scrollbar {
    width: 1em;
    }

    body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    body::-webkit-scrollbar-thumb {
    background-color: #ff8c32;
    outline: 1px solid #ff8c32;
    }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                            <li class="breadcrumb-contents-list-item"> <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.title1') }}</span> </li>
                            <li class="breadcrumb-contents-list-item"><span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.title2') }}</span></li>
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
                        <p>{{ __('backend/Pages/addBoatForm.title') }}</p>
                    </div>
                    <br>
                    <form method="POST" action="{{ route('boats.store') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border border-gray-300 p-6 mb-6 rounded-lg">
                            <!-- Campo de Upload de Foto de Perfil -->
                        <div class="row">
                            <div class="mb-4 text-center col-md-4">
                                <label for="img" class="block text-gray-700 text-sm font-bold">{{ __('backend/Pages/addBoatForm.principal_image') }}</label>
                                <small for="img" class="block text-gray-500 text-sm mb-2">{{ __('backend/Pages/addBoatForm.drag_and_drop') }}</small>
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <img id="preview" src="https://via.placeholder.com/150" alt="Preview" class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover mb-2">
                                        <input style="cursor: pointer" required id="preview" name="img" id="img" type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 text-center col-md-4">
                                <label for="img2" class="block text-gray-700 text-sm font-bold">{{ __('backend/Pages/addBoatForm.adicional_image') }}</label>
                                <small for="img2" class="block text-gray-500 text-sm mb-2">{{ __('backend/Pages/addBoatForm.drag_and_drop') }}</small>
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <img id="preview2" src="https://via.placeholder.com/150" alt="Preview" class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover mb-2">
                                        <input style="cursor: pointer" required id="preview2" name="img2" id="img2" type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage2(event)">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 text-center col-md-4">
                                <label for="img3" class="block text-gray-700 text-sm font-bold">{{ __('backend/Pages/addBoatForm.adicional_image') }}</label>
                                <small for="img3" class="block text-gray-500 text-sm mb-2">{{ __('backend/Pages/addBoatForm.drag_and_drop') }}</small>
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <img id="preview3" src="https://via.placeholder.com/150" alt="Preview" class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover mb-2">
                                        <input style="cursor: pointer" required id="preview3" name="img3" id="img3" type="file" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage3(event)">
                                    </div>
                                </div>
                            </div>

                        </div>
                        </fieldset>

                        <div class="mb-3">
                            <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.name') }}</span>
                            <input placeholder="{{ __('backend/Pages/addBoatForm.name_placeholder') }}" type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <span style="font-style: italic; color: #999999">{{ __('backend/Pages/addBoatForm.desc') }}</span>
                            <textarea class="form-control" placeholder="{{ __('backend/Pages/addBoatForm.desc_placeholder') }}" id="obs" name="obs" style="height: 100px" required></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button style="background-color: #0B5ED7" type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{ __('backend/Pages/addBoatForm.submit_btn') }}
                            </button>
                            <a title="Go Back" class="btn btn-secondary" href="{{ URL::previous() }}">
                                <i class="fas fa-arrow-left"></i> {{ __('backend/Pages/addBoatForm.go_back_btn') }}
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

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.style.cursor = 'pointer';
            preview.style.width = '150px';
            preview.style.height = '150px';
            preview.style.borderColor = 'transparent';
            preview.style.borderRadius = '5px';

            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function previewImage2(event) {
            const preview = document.getElementById('preview2');
            preview.style.width = '150px';
            preview.style.height = '150px';
            preview.style.borderColor = 'transparent';
            preview.style.borderRadius = '5px';

            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function previewImage3(event) {
            const preview = document.getElementById('preview3');
            preview.style.width = '150px';
            preview.style.height = '150px';
            preview.style.borderColor = 'transparent';
            preview.style.borderRadius = '5px';

            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>
