<style>

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
                        <a style="text-decoration:none;" href="/dashboard"><i class="fas fa-tachometer-alt"></i> {{ GoogleTranslate::trans('Dashboard de utilizador', app()->getLocale()) }} </a>
                    </li>

                    <br>
                         @php
                            $actual_link = url()->current();
                        @endphp
                    <li class="">
                        <h6 style="display:block; text-align:left; padding: 2px 15px; font-size: 16px; font-weight:bold" href="/dashboard"><i class="fas fa-calendar-check"></i> {{ __('backend/userSidebar.booking_management') }}</h6>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/dashboard/myreservations') {
                        ?>
                        <h6> <a class="active" style=""  href="{{ route('myreservations.show') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/userSidebar.my_booking') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('myreservations.show') }}"><i class="fas fa-calendar-check"></i> {{ __('backend/userSidebar.my_booking') }}</a> </h6>
                        <?php
                        }
                        ?>

                        <?php
                        if ($actual_link === 'https://tidescape.pt/dashboard/mycalendary') {
                        ?>
                        <h6> <a class="active" style=""  href="{{ route('mycalendarys.show') }}"><i class="fas fa-calendar"></i> {{ __('backend/userSidebar.calendar') }}</a> </h6>
                        <?php
                        } else {
                        ?>
                        <h6> <a style="text-decoration: none; color:black; font-size:16px; display:block; text-align:left; margin-left:15px"  href="{{ route('mycalendarys.show') }}"><i class="fas fa-calendar"></i> {{ __('backend/userSidebar.calendar') }}</a> </h6>
                        <?php
                        }
                        ?>


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

