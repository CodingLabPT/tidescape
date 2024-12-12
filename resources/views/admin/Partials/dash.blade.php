<div class="dashboard-left-content">
    <div class="dashboard-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="dashboard-bottom">
            <ul class="dashboard-list list-style-none">
                <li class="list active">
                    <a class="dashboard-link" style="margin: 0" href="/admin/dashboard">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>


                @php
                $actual_link = url()->current();
                $linksA = [
                    [
                        'route' => 'reservations.show',
                        'icon' => 'fas fa-calendar-check',
                        'label' => __('backend/sidebar.booking'),
                        'url' => url('/reservations') // Use url() for dynamic URLs
                    ],
                    [
                        'route' => 'calendarys.show',
                        'icon' => 'fas fa-calendar',
                        'label' => __('backend/sidebar.Calendar'),
                        'url' => url('/calendary')
                    ],
                ];

                $linksB = [
                    [
                        'route' => 'admins.show',
                        'icon' => 'fas fa-user-shield',
                        'label' => __('backend/sidebar.Admins'),
                        'url' => url('/admins')
                    ],
                    [
                        'route' => 'clients.show',
                        'icon' => 'fas fa-users',
                        'label' => __('backend/sidebar.Users'),
                        'url' => url('/clients')
                    ],
                    [
                        'route' => 'newsletters.show',
                        'icon' => 'fas fa-envelope',
                        'label' =>  __('backend/sidebar.Newsletter'),
                        'url' => url('/newsletters')
                    ],
                    [
                        'route' => 'allcontacts.show',
                        'icon' => 'fas fa-comments',
                        'label' =>  __('backend/sidebar.Messages'),
                        'url' => url('/allcontacts')
                    ],



                ];

                $linksC = [
                    [
                        'route' => 'tours.show',
                        'icon' => 'fas fa-route',
                        'label' => __('backend/sidebar.Tours2'),
                        'url' => url('/tours')
                    ],
                ];

                $linksD = [
                    [
                        'route' => 'locals.show',
                        'icon' => 'fas fa-map-marker-alt',
                        'label' => __('backend/sidebar.Local'),
                        'url' => url('/locals')
                    ],
                    [
                        'route' => 'durations.show',
                        'icon' => 'fas fa-clock',
                        'label' => __('backend/sidebar.Duration'),
                        'url' => url('/durations')
                    ],
                    [
                        'route' => 'boats.show',
                        'icon' => 'fas fa-tasks',
                        'label' =>  __('backend/sidebar.Management'),
                        'url' => url('/boats')
                    ],
                    [
                        'route' => 'brands.show',
                        'icon' => 'fas fa-tag',
                        'label' =>  __('Brands'),
                        'url' => url('/brands')
                    ],
                ];

                @endphp

                <li>
                    <p></p>
                    <div style="border-left: 4px solid #FF8C32; padding: 15px; position: relative; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); cursor: pointer;" class="single-reservation open">
                        <h5 class="single-reservation-content-title" style="text-align: left; font-weight: 100; font-size: 17px;"> {{ __('backend/sidebar.booking_management') }} </h5>
                        <div class="single-reservation-expandIcon" style="position: absolute; top: 15px; right: 0;"> <i class="las la-angle-down"></i> </div>

                        <div class="single-reservation-inner" style="margin-top: 0px; border:none; display:block">
                            @foreach ($linksA as $link)
                                <h6>
                                    <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                    href="{{ route($link['route']) }}">
                                        <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                    </a>
                                </h6>
                            @endforeach
                        </div>
                    </div>


                    {{--
                    <h6 class="dashboard-title" onclick="toggleLinksA()">
                        {{ __('backend/sidebar.booking_management') }}
                        <i class="fas fa-chevron-up arrow-iconA"></i> <!-- Ícone de seta -->
                    </h6>
                    <div class="dashboard-linksA" style="display: block;">
                        @foreach ($linksA  as $link)
                            <h6>
                                <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                   href="{{ route($link['route']) }}">
                                    <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                </a>
                            </h6>
                        @endforeach
                    </div>
                     --}}


                    <div style="border-left: 4px solid #FF8C32; padding: 15px; position: relative; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); cursor: pointer;" class="single-reservation open">
                        <h5 class="single-reservation-content-title" style="text-align: left; font-weight: 100; font-size: 17px;"> {{ __('backend/sidebar.Users') }} </h5>
                        <div class="single-reservation-expandIcon" style="position: absolute; top: 15px; right: 0;"> <i class="las la-angle-down"></i> </div>

                        <div class="single-reservation-inner" style="margin-top: 0px; border:none; display:block">
                            @foreach ($linksB as $link)
                                <h6>
                                    <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                    href="{{ route($link['route']) }}">
                                        <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                    </a>
                                </h6>
                            @endforeach
                        </div>
                    </div>

                    <div style="border-left: 4px solid #FF8C32; padding: 15px; position: relative; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); cursor: pointer;" class="single-reservation open">
                        <h5 class="single-reservation-content-title" style="text-align: left; font-weight: 100; font-size: 17px;"> {{ __('backend/sidebar.Tours2') }} </h5>
                        <div class="single-reservation-expandIcon" style="position: absolute; top: 15px; right: 0;"> <i class="las la-angle-down"></i> </div>

                        <div class="single-reservation-inner" style="margin-top: 0px; border:none; display:block">
                            @foreach ($linksC as $link)
                                <h6>
                                    <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                    href="{{ route($link['route']) }}">
                                        <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                    </a>
                                </h6>
                            @endforeach
                        </div>
                    </div>

                    <div style="border-left: 4px solid #FF8C32; padding: 15px; position: relative; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); cursor: pointer;" class="single-reservation open">
                        <h5 class="single-reservation-content-title" style="text-align: left; font-weight: 100; font-size: 17px;"> {{ __('backend/sidebar.Categories') }} </h5>
                        <div class="single-reservation-expandIcon" style="position: absolute; top: 15px; right: 0;"> <i class="las la-angle-down"></i> </div>

                        <div class="single-reservation-inner" style="margin-top: 0px; border:none; display:block">
                            @foreach ($linksD as $link)
                                <h6>
                                    <a class="dashboard-link {{ $actual_link === $link['url'] ? 'active' : '' }}"
                                    href="{{ route($link['route']) }}">
                                        <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                                    </a>
                                </h6>
                            @endforeach
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>

<style>
    .dashboard-list {
        list-style: none;
        padding: 0;
    }

    .dashboard-title {
        text-decoration: none;
        color: #333; /* Cor mais suave */
        font-size: 16px; /* Aumentar o tamanho da fonte */
        display: block;
        text-align: left;
        margin-left: 15px;
        margin-bottom: 10px; /* Aumentar o espaço abaixo do título */
        padding: 10px; /* Aumentar o padding */
        border-radius: 5px;
        background-color: #f9f9f9; /* Cor de fundo suave */
        border-left: 4px solid #FF8C32 ; /* Borda à esquerda para destaque */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        cursor: pointer;
    }

    .arrow-iconA, .arrow-iconB, .arrow-iconC, .arrow-iconD {
        float: right; /* Empurra o ícone para a direita */
        transition: transform 0.3s; /* Transição suave para a rotação */
    }

    .dashboard-link {
        text-decoration: none;
        color: black;
        font-size: 16px;
        display: block;
        text-align: left;
        margin-left: 15px;
        margin-bottom: 5px;
        padding: 5px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .dashboard-link:hover {
        background-color: #f0f0f0; /* Cor de fundo ao passar o mouse */
    }

    .dashboard-link.active {
        color: #FF8C32; /* Cor do link ativo */
        /*font-weight: bold; /* Destacar o link ativo */
        /*background-color: #e0e0ff; /* Cor de fundo para o link ativo */
    }
</style>
