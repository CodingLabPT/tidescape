<style>
    .tour-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    }

    .tour {
        overflow: hidden;
        transition: transform 0.3s;
        width: 382px;
        flex: 1 1 300px;
        margin-bottom: 20px;
        margin: 10px; /* Define o espaço entre os cards */
    }

    .tour:hover {
        transform: scale(1.05);
    }

    .tour-image {
        width: 100%;
        height: 280px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1em;
        font-weight: 500;
        font-family: sans-serif;
    }

    .card-body {
        padding: 0px !important;
        margin-top: 12px;
    }

    .card-text {
        font-size: 1em;
    }

    .price-booking {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 768px) {
        .tour {
            flex: 1 1 100%;
        }

        .card-title {
            font-size: 1.25em;
        }

        .card-text {
            font-size: 0.9em;
        }
    }

    @media (max-width: 480px) {
        .card-title {
            font-size: 1em;
        }

        .card-text {
            font-size: 0.8em;
        }
    }
</style>

<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

<!-- jQuery (necessário para o Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div id="tab-grid" class="tab-content-item active mt-4 container">
    <div class="section-title center-text">
        <h2 class="title"> {{ __('home/tours.title') }} </h2>
        <div class="section-title-line"> </div>
    </div>
    <br>
    <div class="tour-section slick-carousel">
        @if (count($tour) === 0)
            <div class="alert alert-danger">
                {{ __('home/tours.no_tours') }} <i class="las la-frown"></i>
            </div>
        @else
        @foreach ($tour as $item)
        <div class="tour">
            <div class="hotel-view">
                <a href="{{ route('property', ['id' => $item->id, 'name' => Str::slug($item->name)]) }}" class="hotel-view-thumb hotel-view-grid-thumb bg-image radius-10">
                    <img fetchpriority="high" width="816" height="600" decoding="async" data-nimg="1" src="{{ asset($item->img) }}" class="tour-image" alt="{{ $item->name }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('property', ['id' => $item->id, 'name' => Str::slug($item->name)]) }}"> {{ $item->name }} </a></h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $item->local }}</p>
                    <p class="card-text"><i class="fas fa-clock"></i> {{ $item->duration }}</p>
                    <div class="price-booking">
                      <p class="price" style="color:#0B5ED7"><em>{{ __('home/tours.since') }} {{ $item->price }}€</em></p>
                      <div class="btn-wrapper">
                          <a href="{{ route('property', ['id' => $item->id, 'name' => Str::slug($item->name)]) }}" class="btn btn-primary btn-sm"><i class="fas fa-book-open"></i> {{ __('home/tours.book_now') }} </a>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slick-carousel').slick({
            autoplay: true, // Ativa o autoplay
            dots: false, // Mostra os pontos de navegação
            infinite: true, // Loop infinito
            speed: 300, // Velocidade da transição
            slidesToShow: 4, // Quantos slides mostrar por vez
            slidesToScroll: 1, // Quantos slides rolar por vez
            arrows: false, // Oculta as setas de navegação
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
