<style>

.card {
    border-radius: 10px;
}

.imgimg {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}


.hotel-view-contents-title {
    font-size: calc(8px + 6 * ((100vw - 320px) / 680)) !important;
}

@media screen and (max-width: 960px) {
    .hotel-view-contents-title {
        font-size: calc(16px + 6 * ((100vw - 320px) / 680)) !important;
    }
}

</style>


<div class="shop-grid-contents">
    <div class="grid-list-contents">
        <div class="grid-list-contents-flex">
            <em>{{ __('category.viewing_a_total_of') }} <strong>{{ count($tours) }}</strong> {{ __('category.results') }}</em>
            <div class="grid-list-view">
                <ul class="grid-list-view-flex d-flex tabs list-style-none">
                    <li class="grid-list-view-icons active" data-tab="tab-grid">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-border-all"></i> </a>
                    </li>
                    <li class="grid-list-view-icons" data-tab="tab-list">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-bars"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="tab-grid" class="tab-content-item mt-4 active">
        <div class="row gy-4">
            @foreach ($tours as $tour)
            <div class="col-md-6">
                <div class="card">
                    <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="hotel-view-thumb hotel-view-grid-thumb bg-image">
                        <img style="width: 100%; background-size: cover; border-top-left-radius:10px; border-top-right-radius:10px;" src="<?php echo asset("{$tour->img}")?>">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"> {{ $tour->name }} </a></h5>
                      <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $tour->local }}</p>
                      <p class="card-text"><i class="fas fa-clock"></i> {{ $tour->duration }}</p>
                      <br>
                      <div style="display: flex; justify-content: space-between">
                        <p class="" style="color:#0B5ED7"><em>{{ GoogleTranslate::trans('Since', app()->getLocale()) }} {{ $tour->price }}€</em></p>
                        <div class="btn-wrapper">
                            <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="btn btn-primary btn-sm"> <i class="fas fa-book-open"></i> {{ GoogleTranslate::trans('Book Now', app()->getLocale()) }} </a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="tab-list" class="tab-content-item mt-4">
        <div class="row gy-4">
            @foreach ($tours as $tour)
            <div class="card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-4" style="padding: 0px">
                    <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"
                        class="hotel-view-thumb hotel-view-list-thumb bg-image">
                        <img class="imgimg" style="height: 100%;" src="<?php echo asset("{$tour->img}")?>">
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}"> {{ $tour->name }} </a></h5>
                      <p class="card-text">{{ $tour->local }}</p>
                      <br><br>
                      <div style="display: flex; justify-content: space-between">
                        <p class="" style="color:#0B5ED7"><em>Since {{ $tour->price }}€</em></p>
                        <div class="btn-wrapper">
                            <a href="{{ route('property', ['id' => $tour->id, 'name' => Str::slug($tour->name)]) }}" class="btn btn-primary btn-sm"> Book Now </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>

    @if(count($tours) === 0)
    <div class="alert alert-danger mt-3" role="alert">
        {{ __('category.sorry') }} {{ __('category.no_tours_available') }}
      </div>
    @endif

    <div class="row mt-5">
        <div class="col">
            <div class="pagination-wrapper">
                <ul class="pagination-list list-style-none">
                    {{-- Link para a página anterior --}}
                    @if ($tours->onFirstPage())
                        <li class="pagination-list-item-prev disabled">
                            <span class="pagination-list-item-button"> Prev </span>
                        </li>
                    @else
                        <li class="pagination-list-item-prev">
                            <a href="{{ $tours->previousPageUrl() }}" class="pagination-list-item-button"> Prev </a>
                        </li>
                    @endif

                    {{-- Links para as páginas --}}
                    @foreach ($tours->getUrlRange(1, $tours->lastPage()) as $page => $url)
                        @if ($page == $tours->currentPage())
                            <li class="pagination-list-item active">
                                <span class="pagination-list-item-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="pagination-list-item">
                                <a href="{{ $url }}" class="pagination-list-item-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Link para a próxima página --}}
                    @if ($tours->hasMorePages())
                        <li class="pagination-list-item-next">
                            <a href="{{ $tours->nextPageUrl() }}" class="pagination-list-item-button"> Next </a>
                        </li>
                    @else
                        <li class="pagination-list-item-next disabled">
                            <span class="pagination-list-item-button"> Next </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

</div>


