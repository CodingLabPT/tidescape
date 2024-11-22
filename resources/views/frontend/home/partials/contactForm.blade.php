<form action="{{ route('store.contact') }}" method="POST">
    @csrf
    <div class="single-input">
        <label class="label-title"> {{ __('home/question.form_fn') }} </label>
        <input type="text" class="form--control radius-10" placeholder="{{ __('home/question.form_fn') }}" id="fn" name="fn" required>
    </div>
    <div class="single-input">
        <label class="label-title"> {{ __('home/question.form_ln') }} </label>
        <input type="text" class="form--control radius-10" placeholder="{{ __('home/question.form_ln') }}" id="ln" name="ln" required>
    </div>
    <div class="single-input">
        <label class="label-title"> {{ __('home/question.form_email') }} </label>
        <input type="email" class="form--control radius-10" placeholder="{{ __('home/question.form_email') }}" id="email" name="email" required>
    </div>
    <div class="single-input">
        <label class="label-title"> {{ __('home/question.form_phone') }} </label>
        <input type="tel" class="form--control radius-10" placeholder="{{ __('home/question.form_phone') }}" id="phone" name="phone" required>
    </div>
    <div class="single-input">
        <label class="label-title"> {{ __('home/question.form_questions') }} </label>
        <textarea  class="form--control form-message radius-10" id="message" name="message" placeholder=" {{ __('home/question.form_questions') }}..." required></textarea>
    </div>
    <button title="Send contact form" style="width: 100%" class="btn btn-primary" type="submit" name="btn" id="btn"> {{ __('home/question.form_submit_btn') }} </button>
</form>

<script src="{{ asset('assets/phone/js/intlTelInput.js') }}"></script>

<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input,{});
</script>
