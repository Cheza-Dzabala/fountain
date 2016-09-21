<!-- BEGIN HEADER MENU -->
<div class="page-header-menu">
    <div class="container">
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form" action="page_general_search.html" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="query">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a h--izontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu">
            <ul class="nav navbar-nav">
                <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="{{ route('dashboard') }}">Dashboard
                        <span class="arrow"></span>
                    </a>
                </li>
                @include('partials.global.headers.menus.loans&Services')
                @include('partials.global.headers.menus.financials')
                @include('partials.global.headers.menus.clients')
                @include('partials.global.headers.menus.systemUsers')
                @include('partials.global.headers.menus.help')
                <li class="pull-right">
                    <a href="{{ route('settings') }}">
                      System Settings
                    </a>
                </li>
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>
<!-- END HEADER MENU -->