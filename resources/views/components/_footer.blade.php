<footer class="footer-area footer-area-two footer-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-wrapper">
                    <div class="footer-wrapper-flex">
                        @include('components.footer._topLeft')
                        @include('components.footer._topRight')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-navbar">
        @include('components.footer._middle')
    </div>
    <div class="copyright-area footer-padding copyright-bg-1">
        @include('components.footer._bottom')
    </div>
</footer>
