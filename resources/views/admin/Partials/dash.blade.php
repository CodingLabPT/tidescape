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
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/reservations') {
                        ?>
                        <h6> <a class="active" style=""  href="{{ route('admin.dashboard.reservations') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/sidebar.booking') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('admin.dashboard.reservations') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/sidebar.booking') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/calendary') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.calendary') }}"><i class="fas fa-calendar"></i> {{ __('backend/sidebar.Calendar') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('admin.dashboard.calendary') }}"><i class="fas fa-calendar"></i> {{ __('backend/sidebar.Calendar') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard">{{ __('backend/sidebar.Users') }}</h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/admins') {
                        ?>
                        <h6> <a class="active"  href="{{ route('admin.dashboard.admins') }}"><i class="fas fa-user-shield"></i> {{ __('backend/sidebar.Admins') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('admin.dashboard.admins') }}"><i class="fas fa-user-shield"></i> {{ __('backend/sidebar.Admins') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/clients') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.clients') }}"><i class="fas fa-users"></i> {{ __('backend/sidebar.Users') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.clients') }}"><i class="fas fa-users"></i> {{ __('backend/sidebar.Users') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/newsletters') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.newsletters') }}"><i class="fas fa-envelope"></i> {{ __('backend/sidebar.Newsletter') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.newsletters') }}"><i class="fas fa-envelope"></i> {{ __('backend/sidebar.Newsletter') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/contacts') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.contacts') }}"><i class="fas fa-comments"></i> {{ __('backend/sidebar.Messages') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.contacts') }}"><i class="fas fa-comments"></i> {{ __('backend/sidebar.Messages') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours') }} </h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/tours') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.tours') }}"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours2') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.tours') }}"><i class="fas fa-route"></i> {{ __('backend/sidebar.Tours2') }}</a> </h6>
                        <?php
                        }
                        ?>
                    </li>

                    <br>

                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="#"><i class="fas fa-list"></i> {{ __('backend/sidebar.Categories') }} </h6>
                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/locals') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.locals') }}"><i class="fas fa-map-marker-alt"></i> {{ __('backend/sidebar.Local') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.locals') }}"><i class="fas fa-map-marker-alt"></i> {{ __('backend/sidebar.Local') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/durations') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.durations') }}"><i class="fas fa-clock"></i> {{ __('backend/sidebar.Duration') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.durations') }}"><i class="fas fa-clock"></i> {{ __('backend/sidebar.Duration') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/configs') {
                        ?>
                        <h6> <a class="active" href="{{ route('admin.dashboard.configs') }}"><i class="fas fa-tasks"></i> {{ __('backend/sidebar.Management') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px" href="{{ route('admin.dashboard.configs') }}"><i class="fas fa-tasks"></i> {{ __('backend/sidebar.Management') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/admin/dashboard/configs/brands') {
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
