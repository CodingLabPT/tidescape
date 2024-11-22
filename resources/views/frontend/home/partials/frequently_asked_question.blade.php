<!---------------- /Frequently Asked Question -->

<link rel="stylesheet" href="assets/css/intlTelInput.css">

<style>
        .error-message {
        color: #84204A;
        font-size: 0.875em;
        margin-top: 5px;
    }
</style>

<section class="contact-area pat-40 pab-100">
    <div class="container">
        <div class="section-title center-text">
            <h2 class="title"> {{ __('contact.get_in_touch') }} </h2>
            <div class="section-title-line"> </div>
        </div>
        <br>
        <div class="contact-map">
            <iframe src="{{ url('https://mapcarta.com/pt/N4378105291/Mapa') }}"></iframe>
        </div>
        <div class="row">
            <div class="col-lg-6 mt-5">
                <div class="contact-thumb">
                    <img src="{{ asset('assets/img/single-page/contact.png') }}" alt="img">
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="contact-wrapper contact-padding bg-white radius-20">
                    <div class="contact-contents">
                        <h4 class="contact-contents-title"> {{ __('contact.get_in_touch') }} </h4>
                        <p class="contact-contents-para mt-2"> {{ __('contact.friendly_team') }} </p>
                        <div class="contact-contents-form custom-form">
                            <form id="contactForm" action="{{ route('store.contact') }}" method="POST">
                                @csrf
                                <div style="display: flex; gap: 10px">
                                    <div class="single-input mt-4">
                                        <input type="text" class="form--control radius-5" id="fn" name="fn" placeholder="{{ __('home/question.form_fn') }}" value="{{ old('fn') }}">
                                        <div class="error-message" id="fnError"></div>
                                    </div>
                                    <div class="single-input mt-4">
                                        <input type="text" class="form--control radius-5" id="ln" name="ln" placeholder="{{ __('home/question.form_ln') }}" value="{{ old('ln') }}">
                                        <div class="error-message" id="lnError"></div>
                                    </div>
                                </div>
                                <div class="single-input mt-4">
                                    <input type="email" class="form--control radius-5" id="email" name="email" placeholder="{{ __('home/question.form_email') }}" value="{{ old('email') }}">
                                    <div class="error-message" id="emailError"></div>
                                </div>
                                <div class="single-input mt-4">
                                    <input type="tel" class="form--control radius-5" id="phone" name="phone" placeholder="{{ __('home/question.form_phone') }}" value="{{ old('phone') }}">
                                    <div class="error-message" id="phoneError"></div>
                                </div>
                                <div class="single-input mt-4">
                                    <textarea class="form--control form-message radius-5" id="message" name="message" placeholder="{{ __('home/question.form_questions') }}">{{ old('message') }}</textarea>
                                    <div class="error-message" id="messageError"></div>
                                </div>
                                <button id="btn" name="btn" type="submit" class="btn btn-primary btn-sm radius-5 padding-10"><i class="fas fa-envelope"></i>{{ __('contact.get_in_touch') }} </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- jquery  -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<!-- jquery Migrate -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- Isotope Js -->
<script src="assets/js/jquery.magnific-popup.js"></script>
<!-- Nice Select Js -->
<script src="assets/js/jquery.nice-select.js"></script>
<!-- Flat Picker Js -->
<script src="assets/js/main.js"></script>

<script src="assets/js/intlTelInput.js"></script>
<!-- main js -->

<script src="{{ asset('assets/phone/js/intlTelInput.js') }}"></script>

<script>
var input = document.querySelector("#phone");
window.intlTelInput(input,{});
</script>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Limpar mensagens de erro anteriores
        document.querySelectorAll('.error-message').forEach(function(el) {
            el.textContent = '';
        });

        // Validar primeiro nome
        const fn = document.getElementById('fn').value.trim();
        if (fn === '') {
            document.getElementById('fnError').textContent = '{{ __('contact.fn_error') }}';
            isValid = false;
        }

        // Validar último nome
        const ln = document.getElementById('ln').value.trim();
        if (ln === '') {
            document.getElementById('lnError').textContent = '{{ __('contact.ln_error') }}';
            isValid = false;
        }

        // Validar email
        const email = document.getElementById('email').value.trim();
        // Ajustado para verificar a extensão do domínio com pelo menos dois caracteres após o ponto
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{3,}$/;
        if (email === '' || !emailRegex.test(email)) {
            document.getElementById('emailError').textContent = '{{ __('contact.email_error') }}';
            isValid = false;
        }

        // Validar telefone
        const phone = document.getElementById('phone').value.trim();
        if (phone === '') {
            document.getElementById('phoneError').textContent = '{{ __('contact.phone_error') }}';
            isValid = false;
        }

        // Validar mensagem
        const message = document.getElementById('message').value.trim();
        if (message === '') {
            document.getElementById('messageError').textContent = '{{ __('contact.mensage_error') }}';
            isValid = false;
        }

        // Impedir envio do formulário se houver erros
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>
