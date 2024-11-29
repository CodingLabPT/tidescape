<style>

    .fa-solid  {
        color: red;
    }

    .active {
        color: #FF8C32;
        text-decoration: none; font-size:16px; display:block; text-align:left; margin-left:15px
    }

    </style>

    <div class="dashboard-left-content">
        <div class="dashboard-close-main">
            <div class="close-bars"> <i class="las la-times"></i> </div>
            <div class="dashboard-bottom">
                <ul class="dashboard-list list-style-none">
                    <li class="list active">
                        <a style="text-decoration:none;" href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                    </li>

                    <br>
                         @php
                            $actual_link = url()->current();
                        @endphp
                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard"><i class="fas fa-calendar-check"></i> {{ __('backend/sidebar.booking_management') }}</h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/reservations') {
                        ?>
                        <h6> <a class="active" style=""  href="{{ route('reservations.show') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/sidebar.booking') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('reservations.show') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/sidebar.booking') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/calendary') {
                        ?>
                        <h6> <a class="active" href="{{ route('calendarys.show') }}"><i class="fas fa-calendar"></i> {{ __('backend/sidebar.Calendar') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('calendarys.show') }}"><i class="fas fa-calendar"></i> {{ __('backend/sidebar.Calendar') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard">{{ __('backend/sidebar.Users') }}</h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admins') {
                        ?>
                        <h6> <a class="active"  href="{{ route('admins.show') }}"><i class="fas fa-user-shield"></i> {{ __('backend/sidebar.Admins') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('admins.show') }}"><i class="fas fa-user-shield"></i> {{ __('backend/sidebar.Admins') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/clients') {
                        ?>
                        <h6> <a class="active" href="{{ route('clients.show') }}"><i class="fas fa-users"></i> {{ __('backend/sidebar.Users') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('clients.show') }}"><i class="fas fa-users"></i> {{ __('backend/sidebar.Users') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/newsletters') {
                        ?>
                        <h6> <a class="active" href="{{ route('newsletters.show') }}"><i class="fas fa-envelope"></i> {{ __('backend/sidebar.Newsletter') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('newsletters.show') }}"><i class="fas fa-envelope"></i> {{ __('backend/sidebar.Newsletter') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/contacts') {
                        ?>
                        <h6> <a class="active" href="{{ route('contacts.show') }}"><i class="fas fa-comments"></i> {{ __('backend/sidebar.Messages') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('contacts.show') }}"><i class="fas fa-comments"></i> {{ __('backend/sidebar.Messages') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours') }} </h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/tours') {
                        ?>
                        <h6> <a class="active" href="{{ route('tours.show') }}"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours2') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('tours.show') }}"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours2') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="#"><i class="fas fa-list"></i> {{ __('backend/sidebar.Categories') }} </h6>
                        <?php
                        if ($actual_link === 'https://tidescape.pt/locals') {
                        ?>
                        <h6> <a class="active" href="{{ route('locals.show') }}"><i class="fas fa-map-marker-alt"></i> {{ __('backend/sidebar.Local') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('locals.show') }}"><i class="fas fa-map-marker-alt"></i> {{ __('backend/sidebar.Local') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/durations') {
                        ?>
                        <h6> <a class="active" href="{{ route('durations.show') }}"><i class="fas fa-clock"></i> {{ __('backend/sidebar.Duration') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('durations.show') }}"><i class="fas fa-clock"></i> {{ __('backend/sidebar.Duration') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/boats') {
                        ?>
                        <h6> <a class="active" href="{{ route('boats.show') }}"><i class="fas fa-tasks"></i> {{ __('backend/sidebar.Management') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('boats.show') }}"><i class="fas fa-tasks"></i> {{ __('backend/sidebar.Management') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/brands') {
                        ?>
                        <h6> <a class="active" href="{{ route('brands.show') }}"><i class="fas fa-tag"></i> Brands </a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('brands.show') }}"><i class="fas fa-tag"></i> Brands </a> </h6>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
