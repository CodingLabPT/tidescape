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
                    ],
                    [
                        'route' => 'mycontacts.show',
                        'icon' => 'fas fa-comments',
                        'label' => __('backend/userSidebar.contacts'),
                        'url' => 'https://tidescape.pt/dashboard/mycontacts'
                    ],
                ];
                @endphp

                <li>
                    @foreach ($links as $link)
                        <h6>
                            <a class="{{ $actual_link === $link['url'] ? 'active' : '' }}"
                               style="text-decoration: none; color: {{ $actual_link === $link['url'] ? 'blue' : 'black' }}; font-size: 16px; display: block; text-align: left; margin-left: 15px; margin-bottom: 5px"
                               href="{{ route($link['route']) }}">
                                <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
                            </a>
                        </h6>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>
