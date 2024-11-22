<div class="container">
    @if (session('success'))
    <div class="breadcrumb-area breadcrumb-padding">
        <p style="background-color: #D4EDDA; color: #155724; border:1px solid #C3E6CB; width: 100%; margin-bottom:0; text-align:center; padding:10px; " class="msg" >{{ session('msg') }}</p>
    </div>
    @endif

    @if (session('error'))
    <div class="breadcrumb-area breadcrumb-padding">
        <p style="background-color: #f2dede; color: #a94442; border:1px solid #ebccd1; width: 100%; margin-bottom:0; text-align:center; padding:10px; " class="msg" >
            {{ session('error') }}
        </p>
    </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="breadcrumb-area breadcrumb-padding">
            <p style="background-color: #f2dede; color: #a94442; border:1px solid #ebccd1; width: 100%; margin-bottom:0; text-align:center; padding:10px; " class="msg" >
            @if ($errors->get('email'))
            {{ __('footer.error_email') }}
            @endif
            </p>
        </div>
        @endforeach
    @endif
</div>
