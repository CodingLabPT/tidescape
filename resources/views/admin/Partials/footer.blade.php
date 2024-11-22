<footer class="footer-area footer-area-two footer-bg-1">
    @include('components._footer')
            <div class="container">
                <div class="copyright-contents">
                    <div class="copyright-contents-flex">
                        <div class="footer-widget-social">
                            <ul class="footer-widget-social-list list-style-none justify-content-center">
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.facebook.com/profile.php?id=100094309034236&sk=about&section=bio"> <i class="lab la-facebook-f"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://twitter.com/Tidescape"> <i class="lab la-twitter"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.instagram.com/tidescapeexclusivemoments/"> <i class="lab la-instagram"></i> </a>
                                </li>
                                <li class="footer-widget-social-list-item">
                                    <a class="footer-widget-social-list-link" target="_blank" href="https://www.linkedin.com/company/96430365/"> <i class="lab la-linkedin"></i> </a>
                                </li>
                                <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank"><img width="140" height="58" src="{{ asset('assets/img/single-page/livro_reclamacoes.png') }}"></a>
                            </ul>
                        </div>

                        <span class="copyright-contents-main"> {{ date('Y') }} © Tidescape. {{ __('footer.all_rights_reserved.') }}. <br>{{ __('footer.developed_by') }} <a target="_blank" href="https://anmconnection.pt/pt">ANMConnection - marketing & web</a></span>
                    </div>
                </div>
            </div>
        </div>
</footer>
