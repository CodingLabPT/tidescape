{{-- Location --}}
<form method="GET" action="{{ route('category.filter') }}">
    <div class="location-area">
        <div class="container">
            <div class="banner-location bg-white radius-5">
                <div class="banner-location-flex">
                    <div class="banner-location-single">
                        <div class="banner-location-single-flex">
                            <div class="banner-location-single-icon">
                                <i style="margin-top: 1rem" class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="banner-location-single-contents">
                                <span class="banner-location-single-contents-subtitle">{{ __('home/location.title') }}</span>
                                <div class="banner-location-single-contents-dropdown">
                                    <select class="js-select select-style-two" name="local" id="local" onchange="this.form.submit()">
                                        @if (isset($_GET['local']))
                                            <option value="Select a location" {{ isset($_GET['local']) && isset($_GET['local']) === 'Select a location' ? 'selected' : '' }}>
                                                @php echo $_GET['local'] @endphp
                                            </option>
                                        @else
                                            <option value="Select a location" {{ isset($_GET['local']) && isset($_GET['local']) === 'Select a location' ? 'selected' : '' }}>
                                                {{ __('home/location.dropdown_title') }}
                                            </option>
                                        @endif

                                        @foreach ($locals as $item)
                                            <option value="{{ $item->name }}" {{ isset($_GET['local']) && isset($_GET['local']) === $item->name ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
{{-- Location --}}
