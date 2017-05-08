
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.html">
                    <img src="{{ asset('../assets/layouts/layout3/img/fountain.png') }}" alt="logo" class="logo-default">
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            @if($notificationCount > 0)
                                <span class="badge badge-default">{{ $notificationCount }} </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <strong>{{ $notificationCount }} new</strong> notifications</h3>
                                <a href="#">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    @foreach($notifications as $notification)
                                        <li>
                                            <a href="{{ url($notification->link) }}">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                                    <span class="label label-sm label-icon label-success">
                                                                        <i class="fa fa-plus"></i>
                                                                    </span> {{ $notification->title }} </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->

                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{ asset('../assets/layouts/layout3/img/avatar9.jpg') }}">
                            <span class="username username-hide-mobile">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li class="divider"> </li>

                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->

                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->

