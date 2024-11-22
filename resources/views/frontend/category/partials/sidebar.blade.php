<style>
/* SIDEBAR
*/
.form-control {
    color: #8D8D8D !important;
}

.price-filter {
display: flex;
justify-content: space-between;
align-items: center;
margin: 20px 0;
}

.price-input {
    flex: 1;
    margin-right: 15px;
}

.price-input:last-child {
    margin-right: 0;
}

label {
    display: block;
    margin-bottom: 5px;
}

.input-group {
    display: flex;
    align-items: center; /* Alinha verticalmente o símbolo e o input */
}

.currency-symbol {
    margin-right: 5px; /* Espaço entre o símbolo e o input */
    font-size: 16px; /* Tamanho do símbolo */
    line-height: 1.5; /* Alinhamento vertical */
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input[type="number"]:focus {
    border-color: #007bff;
    outline: none;
}
</style>

{{--
<form style="padding: 10px;" method="GET" action="{{ route('category') }}">
    <div class="shop-sidebar-content">
        <div class="shop-close-content">
            <div class="shop-close-content-icon"> <i class="las la-times"></i> </div>
            <div class="single-shop-left bg-white radius-10">
                <div class="single-shop-left-title open">
                    <h5 class="title"> {{ __('category.price') }} </h5>
                    <div class="single-shop-left-inner mt-4">
                        <div class="form-row d-flex" style="margin-top:10px; gap: 10px;">
                            <div class="col-4">
                                @if(isset($request->min))
                                    <input style="background-color: #EEEEEE; border: 2px solid #eee;" type="text; color: red" inputmode="numeric" pattern="[0-9\s]{1,4}" autocomplete="cc-number" maxlength="4" class="form-control" name="min" id="min" value="{{ $request->min }}" placeholder="Min">
                                @else
                                    <input style="background-color: #EEEEEE; border: 2px solid #eee;" type="text; color: red" inputmode="numeric" pattern="[0-9\s]{1,4}" autocomplete="cc-number" maxlength="4" class="form-control" name="min" id="min" value="" placeholder="Min">
                                @endif
                            </div>
                            <div class="col-4">
                                @if(isset($request->max))
                                    <input style="background-color: #EEEEEE; border: 2px solid #eee" type="text" inputmode="numeric" pattern="[0-9\s]{1,4}" autocomplete="cc-number" maxlength="4" class="form-control" name="max" id="max" value="{{ $request->max }}" placeholder="Max">
                                @else
                                    <input style="background-color: #EEEEEE; border: 2px solid #eee" type="text" inputmode="numeric" pattern="[0-9\s]{1,4}" autocomplete="cc-number" maxlength="4" class="form-control" name="max" id="max" value="" placeholder="Max">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-shop-left bg-white radius-10 mt-4">
                <div class="single-shop-left-title open">
                    <h5 class="title mb-4"> {{ __('category.duration') }} </h5>
                    <div class="single-shop-left-inner margin-top-15">
                        @foreach ($durations as $duration)
                    @php
                        $checked = [];
                        if(isset($_GET['duration']))
                        {
                            $checked = $_GET['duration'];
                        }
                    @endphp
                    <label class="py-1 container">
                        <input id="{{ $duration->name }}" name="duration[]" value="{{ $duration->name }}" type='checkbox'
                            @if(in_array($duration->name, $checked))
                            checked
                            @endif
                        >

                        @if ( $duration->name == "1h" )
                        {{ __('category.up_to_1_hours') }}
                        @elseif ( $duration->name == "2h" )
                        {{ __('category.up_to_2_hours') }}
                        @elseif ( $duration->name == "3h" )
                        {{ __('category.up_to_3_hours') }}
                        @elseif ( $duration->name == "4h" )
                        {{ __('category.up_to_4_hours') }}
                        @elseif ( $duration->name == "5h" )
                        {{ __('category.up_to_5_hours') }}
                        @elseif ( $duration->name == "6h" )
                        {{ __('category.up_to_6_hours') }}
                        @elseif ( $duration->name == "7h" )
                        {{ __('category.up_to_7_hours') }}
                        @elseif ( $duration->name == "8h" )
                        {{ __('category.up_to_8_hours') }}
                        @elseif ( $duration->name == "9h" )
                        {{ __('category.up_to_9_hours') }}
                        @elseif ( $duration->name == "10h" )
                        {{ __('category.up_to_10_hours') }}
                        @elseif ( $duration->name == "11h" )
                        {{ __('category.up_to_11_hours') }}
                        @else
                        {{ __('category.up_to_12_hours') }}
                        @endif

                        <span class="checkmark"></span>
                    </label>
                @endforeach
                    </div>
                </div>
            </div>

            <div class="single-shop-left bg-white radius-10 mt-4">
                <div class="single-shop-left-title open">
                    <h5 class="title mb-4"> {{ __('category.type_of_Boat') }} </h5>
                    <div class="single-shop-left-inner margin-top-15">
                        <label class="py-1 container">
                            <input id="eg" name="eg" value="eg" type='checkbox'
                            @if (isset($_GET['eg'])) checked @endif> {{ __('category.big') }}
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-close-content" >
            <div class="single-shop-left bg-white radius-10 mt-4">
                <button title="Filtering results" type="submit" class="btn btn-primary btn-sm">{{ __('category.filter') }}</button>
                <button type="reset" onclick="window.location.href = '/category'" class="btn btn-secondary">
                    Reset Filters
                </button>
            </div>
        </div>

    </div>
</form >
 --}}

 <form style="padding: 10px;" method="GET" action="{{ route('category.filter') }}">
    <div class="shop-sidebar-content">
        <div class="shop-close-content">
            <div class="shop-close-content-icon"> <i class="las la-times"></i> </div>
            <div class="single-shop-left bg-white radius-10">
                <div class="single-shop-left-title open">
                    <h5 class="title"> {{ __('category.price') }} </h5>
                    <div class="single-shop-left-inner mt-4">
                        <div class="price-filter">
                            <div class="price-input">
                                <label for="min_price">{{ __('category.min_price') }} (€)</label>
                                <div class="input-group">
                                    <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}" onblur="this.form.submit()">
                                </div>
                            </div>
                            <div class="price-input">
                                <label for="max_price">{{ __('category.max_price') }} (€)</label>
                                <div class="input-group">
                                    <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}" onblur="this.form.submit()">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="single-shop-left bg-white radius-10 mt-4">
                <div class="single-shop-left-title open">
                    <h5 class="title mb-4"> {{ __('category.duration') }} </h5>
                    <div class="single-shop-left-inner margin-top-15">
                        @foreach ($durations as $duration)
                    @php
                        $checked = [];
                        if(isset($_GET['duration']))
                        {
                            $checked = $_GET['duration'];
                        }
                    @endphp
                    <label class="py-1 container">
                        <input type="checkbox" id="{{ $duration->name }}" name="duration[]" value="{{ $duration->name }}" onchange="this.form.submit()"
                            @if(in_array($duration->name, $checked))
                            checked
                            @endif
                        >

                        @if ( $duration->name == "1h" )
                        {{ __('category.up_to_1_hours') }}
                        @elseif ( $duration->name == "2h" )
                        {{ __('category.up_to_2_hours') }}
                        @elseif ( $duration->name == "3h" )
                        {{ __('category.up_to_3_hours') }}
                        @elseif ( $duration->name == "4h" )
                        {{ __('category.up_to_4_hours') }}
                        @elseif ( $duration->name == "5h" )
                        {{ __('category.up_to_5_hours') }}
                        @elseif ( $duration->name == "6h" )
                        {{ __('category.up_to_6_hours') }}
                        @elseif ( $duration->name == "7h" )
                        {{ __('category.up_to_7_hours') }}
                        @elseif ( $duration->name == "8h" )
                        {{ __('category.up_to_8_hours') }}
                        @elseif ( $duration->name == "9h" )
                        {{ __('category.up_to_9_hours') }}
                        @elseif ( $duration->name == "10h" )
                        {{ __('category.up_to_10_hours') }}
                        @elseif ( $duration->name == "11h" )
                        {{ __('category.up_to_11_hours') }}
                        @else
                        {{ __('category.up_to_12_hours') }}
                        @endif

                        <span class="checkmark"></span>
                    </label>
                @endforeach
                    </div>
                </div>
            </div>


            <div class="single-shop-left bg-white radius-10 mt-4">
                <div class="single-shop-left-title open">
                    <h5 class="title mb-4"> {{ __('category.type_of_Boat') }} </h5>
                    <div class="single-shop-left-inner margin-top-15">
                        <label for="vessel" class="py-1 container">
                            <input id="vessel" name="vessel" value="eg" type='checkbox' onchange="this.form.submit()"
                                @if (isset($_GET['vessel'])) checked @endif> {{ __('category.big') }}
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="shop-close-content" >
            <div class="single-shop-left bg-white radius-10 mt-4">
                <button type="reset" onclick="window.location.href = '/category'" class="btn btn-secondary">
                    Reset Filters
                </button>
            </div>
        </div>

    </div>
</form >
