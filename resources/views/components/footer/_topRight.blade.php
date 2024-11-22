<style>

    button[type='submit']:hover {
        background-color: #1E84FE !important;
    }

</style>

<div class="footer-wrapper-single">
    <div class="footer-widget widget">
        <h3 class="footer-widget-title text-white"> {{ __('footer.right_title') }} </h3>
        <div class="footer-widget-inner mt-4">
            <p class="footer-widget-para"> {{ __('footer.right_subtitle') }} </p>
            <div class="footer-widget-form mt-5">
                <form action="{{ route('store.newsletter') }}" method="POST" id="newsletter-form">
                    @csrf
                    <div class="footer-widget-form-single" style="position: relative">
                        <input class="footer-widget-form-control" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="{{ __('footer.right_placeholder') }}" required>
                        <button type="submit" id="btnAderir" name="btnAderir">{{ __('footer.right_btn') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
