<div class="dropdown">
    <i style="font-size: 26px; color: #FF8C32" class="las la-globe" class="dropbtn"></i>
    <div class="dropdown-content">
        <a href="{{ route('localization',['locale' => 'pt']) }}">
            <img src="{{ asset('assets/svg/portugal-flag-icon.svg') }}" width="20" height="20" alt="Tidescape.pt English">
            Portuguese
        </a>
        <a href="{{ route('localization',['locale' => 'en']) }}">
            <img src="{{ asset('assets/svg/england-flag-icon.svg') }}" width="20" height="20" alt="Tidescape.pt English">
            English
        </a>
        <a href="{{ route('localization',['locale' => 'es']) }}" class="dropdown-item">
            <img src="{{ asset('assets/svg/spain-country-flag-icon.svg') }}" width="20" height="20" alt="Tidescape.pt Espanhol">
            Espanol
        </a>
    </div>
</div>



