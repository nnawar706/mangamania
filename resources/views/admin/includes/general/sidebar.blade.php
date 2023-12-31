        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin-dashboard') }}">
{{--                <div class="sidebar-brand-icon rotate-n-15">--}}
{{--                    <img src="{{ asset('uploads/general/logo.png') }}" height="30" width="30">--}}
{{--                </div>--}}
                <div class="sidebar-brand-text mx-3">Mangamania</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin-dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if(auth()->guard('admin')->user()->hasPermissionTo('update website setting') || auth()->guard('admin')->user()->hasPermissionTo('banner list'))

                <div class="sidebar-heading">
                    Configurations
                </div>

                @if(auth()->guard('admin')->user()->hasPermissionTo('update website setting'))

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                @endif

                @if(auth()->guard('admin')->user()->hasPermissionTo('banner list'))

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('banner-list') }}">
                            <i class="fas fa-fw fa-image"></i>
                            <span>Banners</span>
                        </a>
                    </li>

                @endif

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if(auth()->guard('admin')->user()->hasPermissionTo('user list') ||
            auth()->guard('admin')->user()->hasPermissionTo('customer list') ||
            auth()->guard('admin')->user()->hasPermissionTo('role & permissions'))
                <!-- Heading -->
                <div class="sidebar-heading">
                    Components
                </div>

                @if(auth()->guard('admin')->user()->hasPermissionTo('user list') || auth()->guard('admin')->user()->hasPermissionTo('role & permissions'))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-id-card"></i>
                            <span>Users</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @if(auth()->guard('admin')->user()->hasPermissionTo('user list'))
                                    <a class="collapse-item" href="{{ route('admin-list') }}">User List</a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermissionTo('role & permissions'))
                                    <a class="collapse-item" href="{{ route('role-list') }}">Role & Permissions</a>
                                @endif
                            </div>
                        </div>
                    </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermissionTo('customer list'))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="true" aria-controls="collapseThree">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Customers</span>
                        </a>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @if(auth()->guard('admin')->user()->hasPermissionTo('customer list'))
                                    <a class="collapse-item" href="{{ route('user-list') }}">Customer List</a>
                                @endif
                                <a class="collapse-item" href="cards.html">Activity Log</a>
                            </div>
                        </div>
                    </li>
                @endif
            @endif

            @if(auth()->guard('admin')->user()->hasPermissionTo('genre list') ||
            auth()->guard('admin')->user()->hasPermissionTo('series list') ||
            auth()->guard('admin')->user()->hasPermissionTo('volume list') ||
            auth()->guard('admin')->user()->hasPermissionTo('expense list') ||
            auth()->guard('admin')->user()->hasPermissionTo('order list'))

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Inventory</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if(auth()->guard('admin')->user()->hasPermissionTo('genre list'))
                                <a class="collapse-item" href="{{ route('show-categories') }}">Genres</a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermissionTo('series list'))
                                <a class="collapse-item" href="{{ route('show-items') }}">Series</a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermissionTo('volume list'))
                                <a class="collapse-item" href="{{ route('show-volumes') }}">Volumes</a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermissionTo('expense list'))
                                <a class="collapse-item" href="">Expenses</a>
                            @endif
                        </div>
                    </div>
                </li>
                @if(auth()->guard('admin')->user()->hasPermissionTo('order list') ||
                auth()->guard('admin')->user()->hasPermissionTo('promo-code list') ||
                auth()->guard('admin')->user()->hasPermissionTo('pending order list'))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                            aria-expanded="true" aria-controls="collapseFive">
                            <i class="fas fa-fw fa-list"></i>
                            <span>Orders</span>
                        </a>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @if(auth()->guard('admin')->user()->hasPermissionTo('promo-code list'))
                                    <a class="collapse-item" href="">Promo Codes</a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermissionTo('order list'))
                                    <a class="collapse-item" href="{{ route('order-list') }}">Orders</a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermissionTo('pending order list'))
                                    <a class="collapse-item" href="">Pending Orders</a>
                                @endif
                            </div>
                        </div>
                    </li>
                @endif
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reports
            </div>

            @if(auth()->guard('admin')->user()->getRoleNames()->first() != 'Manager')

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubs"
                    aria-expanded="true" aria-controls="collapseSubs">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Subscriptions</span>
                </a>
                <div id="collapseSubs" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('subscriber-list') }}">Manage Subscribers</a>
                        <a class="collapse-item" href="{{ route('send-newsletter') }}">Weekly Newsletters</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messaging</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
