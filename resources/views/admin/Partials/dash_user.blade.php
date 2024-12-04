    <div class="dashboard-left-content">
        <div class="dashboard-close-main">
            <div class="close-bars"> <i class="las la-times"></i> </div>
            <div class="dashboard-bottom">
                <ul class="dashboard-list list-style-none">
                    <li class="list active">
                        <a style="text-decoration:none;" href="/dashboard"><i class="fas fa-tachometer-alt"></i> User Dashboard </a>
                    </li>

                    <br>
                    @php
                    $actual_link = url()->current();
                    $links = [
                        [
                            'route' => 'myreservations.show',
                            'icon' => 'fas fa-calendar-check',
                            'label' => __('backend/userSidebar.my_booking'),
                            'url' => 'https://tidescape.pt/dashboard/myreservations'
                        ],
                        [
                            'route' => 'mycalendarys.show',
                            'icon' => 'fas fa-calendar',
                            'label' => __('backend/userSidebar.calendar'),
                            'url' => 'https://tidescape.pt/dashboard/mycalendary'
                        ]
                    ];
                @endphp

                <li>
                    <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold">
                        <i class="fas fa-calendar-check"></i> {{ __('backend/userSidebar.booking_management') }}
                    </h6>

                    @foreach ($links as $link)
                        <h6>
                            <a class="{{ $actual_link === $link['url'] ? 'active' : '' }}"
                               style="text-decoration: none; color: {{ $actual_link === $link['url'] ? 'blue' : 'black' }}; font-size: 16px; display: block; text-align: left; margin-left: 15px;"
                               href="{{ route($link['route']) }}">
                                <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                            </a>
                        </h6>
                    @endforeach
                </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard"><i class="fas fa-comments"></i> {{ __('backend/userSidebar.contacts') }} </h6>
                        <?php
                        if ($actual_link === 'https://tidescape.pt/dashboard/mycontacts') {
                        ?>
                        <h6> <a class="active" style=""  href="{{ route('mycontacts.show') }}"><i class="fas fa-comments"></i> {{ __('backend/userSidebar.my_messages') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('mycontacts.show') }}"><i class="fas fa-comments"></i> {{ __('backend/userSidebar.my_messages') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

