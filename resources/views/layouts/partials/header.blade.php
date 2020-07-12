<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto"
            type="button"
            data-target="#sidebar"
            data-class="c-sidebar-show">
        <span class="c-header-toggler-icon"></span>
    </button>
    <a class="c-header-brand d-sm-none" href="/#">
        <img class="c-header-brand-full c-d-dark-none"
             src="/assets/brand/coreui-pro-base.svg"
             width="118"
             height="46" alt="CoreUI Logo">
        <img class="c-header-brand-minimized c-d-dark-none"
             src="/assets/brand/coreui-signet.svg"
             width="46"
             height="46"
             alt="CoreUI Logo">
        <img class="c-header-brand-full c-d-light-none"
             src="/assets/brand/coreui-pro-base-white.svg"
             width="118"
             height="46"
             alt="CoreUI Logo">
        <img class="c-header-brand-minimized c-d-light-none"
             src="/assets/brand/coreui-signet-white.svg"
             width="46"
             height="46"
             alt="CoreUI Logo">
    </a>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none"
            type="button"
            data-target="#sidebar"
            data-class="c-sidebar-lg-show"
            responsive="true">
        <span class="c-header-toggler-icon"></span>
    </button>

    <ul class="c-header-nav ml-auto">
        <li class="c-header-nav-item d-md-down-none mx-2">
            <a href="/locale/en" class="c-header-nav-link">
                <i class="flag-icon cif-us h1"></i>
            </a>
        </li>
        <li class="c-header-nav-item d-md-down-none mx-2">
            <a href="/locale/pl" class="c-header-nav-link">
                <i class="flag-icon cif-pl h1"></i>
            </a>
        </li>
        <li class="c-header-nav-item px-3">
            <button class="c-class-toggler c-header-nav-btn"
                    type="button"
                    id="header-tooltip"
                    data-target="body"
                    data-class="c-dark-theme"
                    data-toggle="c-tooltip"
                    data-placement="bottom"
                    title="Toggle Light/Dark Mode">
                <i class="cil-moon c-icon c-d-dark-none"></i>
                <i class="cil-sun c-icon c-d-light-none"></i>
            </button>
        </li>
    </ul>
    <ul class="c-header-nav">
        <li class="c-header-nav-item dropdown d-md-down-none mx-2">
            <a class="c-header-nav-link"
               data-toggle="dropdown"
               href="/#"
               role="button"
               aria-haspopup="true" aria-expanded="false">
                <svg class="c-icon">
                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-bell"></use>
                </svg>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                <div class="dropdown-header bg-light">
                    <strong>You have 5 notifications</strong>
                </div>
                <a class="dropdown-item" href="/#">
                    <svg class="c-icon mr-2 text-success">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-follow"></use>
                    </svg>
                    New user registered</a>
                <a class="dropdown-item" href="/#">
                    <svg class="c-icon mr-2 text-danger">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user-unfollow"></use>
                    </svg>
                    User deleted
                </a>
                <a class="dropdown-item" href="/#">
                    <svg class="c-icon mr-2 text-info">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-chart"></use>
                    </svg>
                    Sales report is ready
                </a>
                <a class="dropdown-item" href="/#">
                    <svg class="c-icon mr-2 text-success">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-basket"></use>
                    </svg>
                    New client
                </a>
                <a class="dropdown-item" href="/#">
                    <svg class="c-icon mr-2 text-warning">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-speedometer"></use>
                    </svg>
                    Server overloaded
                </a>
                <div class="dropdown-header bg-light">
                    <strong>Server</strong>
                </div>
                <a class="dropdown-item d-block" href="/#">
                    <div class="text-uppercase mb-1">
                        <small><b>CPU Usage</b></small>
                    </div>
                    <span class="progress progress-xs">
                            <div class="progress-bar bg-info"
                                 role="progressbar"
                                 style="width: 25%"
                                 aria-valuenow="25"
                                 aria-valuemin="0"
                                 aria-valuemax="100">
                            </div>
                        </span>
                    <small class="text-muted">348 Processes. 1/4 Cores.</small>
                </a>
                <a class="dropdown-item d-block" href="/#">
                    <div class="text-uppercase mb-1">
                        <small><b>Memory Usage</b></small>
                    </div>
                    <span class="progress progress-xs">
                            <div class="progress-bar bg-warning"
                                 role="progressbar"
                                 style="width: 70%"
                                 aria-valuenow="70"
                                 aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </span>
                    <small class="text-muted">11444GB/16384MB</small>
                </a>
                <a class="dropdown-item d-block" href="/#">
                    <div class="text-uppercase mb-1">
                        <small><b>SSD 1 Usage</b></small>
                    </div>
                    <span class="progress progress-xs">
                        <div class="progress-bar bg-danger"
                             role="progressbar"
                             style="width: 95%"
                             aria-valuenow="95"
                             aria-valuemin="0"
                             aria-valuemax="100"></div>
                    </span>
                    <small class="text-muted">243GB/256GB</small>
                </a>
            </div>
        </li>
        <li class="c-header-nav-item dropdown d-md-down-none mx-2">
            <a class="c-header-nav-link"
               data-toggle="dropdown"
               href="/#" role="button"
               aria-haspopup="true"
               aria-expanded="false">
                <svg class="c-icon">
                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                </svg>
                <span class="badge badge-pill badge-info">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                <div class="dropdown-header bg-light">
                    <strong>You have 4 messages</strong>
                </div>
                <a class="dropdown-item" href="/#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="c-avatar">
                                <img class="c-avatar-img"
                                     src="/assets/img/avatars/7.jpg"
                                     alt="user@email.com">
                                <span class="c-avatar-status bg-success"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">Just now</small>
                        </div>
                        <div class="text-truncate font-weight-bold"><span class="text-danger">!</span>
                            Important message
                        </div>
                        <div class="small text-muted text-truncate">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt...
                        </div>
                    </div>
                </a><a class="dropdown-item" href="/#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="c-avatar">
                                <img class="c-avatar-img"
                                     src="/assets/img/avatars/6.jpg"
                                     alt="user@email.com">
                                <span class="c-avatar-status bg-warning"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">5 minutes ago</small></div>
                        <div class="text-truncate font-weight-bold">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="small text-muted text-truncate">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt...
                        </div>
                    </div>
                </a><a class="dropdown-item" href="/#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="c-avatar">
                                <img class="c-avatar-img"
                                     src="/assets/img/avatars/5.jpg"
                                     alt="user@email.com">
                                <span class="c-avatar-status bg-danger"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">1:52 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="small text-muted text-truncate">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="/#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="c-avatar">
                                <img class="c-avatar-img"
                                     src="/assets/img/avatars/4.jpg"
                                     alt="user@email.com">
                                <span class="c-avatar-status bg-info"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">4:03 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            Lorem ipsum dolor sit amet
                        </div>
                        <div class="small text-muted text-truncate">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center border-top" href="/#">
                    <strong>View all messages</strong>
                </a>
            </div>
        </li>
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="/#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img"
                         src="{{ asset(auth()->user()->avatar_url) }}"
                         alt="{{ auth()->user()->email }}">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">

                <div class="dropdown-header bg-light py-2">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="{{ route('profile.show') }}">
                    <i class="cil-user c-icon mr-2"> </i>
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('profile.history') }}">
                    <i class="cil-animal c-icon mr-2"> </i>
                    Login History
                </a>
                <a class="dropdown-item" href="{{ route('password.edit') }}">
                    <i class="cil-lock-locked c-icon mr-2"> </i>
                    Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"
                   href="#"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="cil-account-logout c-icon mr-2"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li class="c-header-nav-item px-3">
            <button class="c-class-toggler c-header-nav-btn"
                    type="button"
                    data-target="#aside"
                    data-class="c-sidebar-show">
                <i class="cil-applications-settings c-icon c-icon-lg mr-2">
                </i>
            </button>
        </li>
    </ul>


    <div class="c-subheader px-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
        @yield('breadcrumb')
        <!-- Breadcrumb Menu-->
        </ol>
        <div class="c-header-nav ml-auto d-md-down-none mr-2">
            @yield('toolbar')
        </div>
    </div>
</header>
