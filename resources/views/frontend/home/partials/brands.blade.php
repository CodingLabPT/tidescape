<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

<!------------------ BRANDS --------------------->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="brand-carousel">
                @foreach ($brands as $item)
                    <div class="brand-item">
                        <a href="{{ $item->url }}" target="_blank">
                            <img src="{{ asset($item->logo) }}" alt="brandLogo">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!------------------ /BRANDS --------------------->

<!-- jQuery (necessário para o Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.brand-carousel').slick({
            slidesToShow: 5,
            infinite: true,
            arrows: false,
            dots: false,
            swipeToSlide: true,
            autoplay: true,
            autoplaySpeed: 2500,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 5
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    });
</script>
