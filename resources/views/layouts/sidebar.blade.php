<nav class="main-sidebar ps-menu">
    <!-- <div class="sidebar-toggle action-toggle">
        <a href="#">
            <i class="fas fa-bars"></i>
        </a>
    </div> -->
    <!-- <div class="sidebar-opener action-toggle">
        <a href="#">
            <i class="ti-angle-right"></i>
        </a>
    </div> -->
    <div class="sidebar-header">
        <div class="text">CODEASY</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="active">
                <a href="index.html" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @foreach (menus() as $category => $menus)
                @php
                    $showCategory = true;
                @endphp
                @foreach ($menus as $mm)
                    @can('read '. $mm->url)
                        @if ($showCategory)
                            <li class="menu-category">
                                <span class="text-uppercase">{{ $category }}</span>
                            </li>
                            @php
                                $showCategory = false;
                            @endphp
                        @endif
                        <li @class(['active open' => str_contains(request()->path(), $mm->url)])>
                            @if (count($mm->subMenus))
                                <a href="#" class="main-menu has-dropdown">
                                    <i class="ti-{{ $mm->icon }}"></i>
                                    <span>{{ $mm->name }}</span>
                                </a>
                                <ul @class(['sub-menu', 'expand' => str_contains(request()->path(), $mm->url)])>
                                    @foreach ($mm->subMenus as $sm)
                                        @can('read '. $sm->url)
                                            <li @class(['active' => str_contains(request()->path(), $sm->url)])><a href="{{ url($sm->url) }}" class="link"><span>{{ $sm->name }}</span></a></li>
                                        @endcan
                                    @endforeach
                                    
                                </ul>
                            @else
                                <a href="{{ url($mm->url) }}" class="link">
                                    <i class="ti-{{ $mm->icon }}"></i>
                                    <span>{{ $mm->name }}</span>
                                </a>
                            @endif
                        </li>
                    @endcan   
                @endforeach
            @endforeach
            
            
            {{-- <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Form</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="form-element.html" class="link">
                            <span>Form Element</span></a>
                    </li>
                    <li><a href="form-datepicker.html" class="link">
                            <span>Datepicker</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Select2</span></a>
                    </li>
                </ul>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Utilities</span>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-notepad"></i>
                    <span>Utilities</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="error-404.html" target="_blank" class="link"><span>Error 404</span></a></li>
                    <li><a href="error-403.html" target="_blank" class="link"><span>Error 403</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Error 500</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-layers-alt"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="pages-blank.html" class="link"><span>Blank</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-hummer"></i>
                    <span>Auth</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="auth-login.html" target="_blank" class="link"><span>Login</span></a></li>
                    <li><a href="auth-register.html" target="_blank" class="link"><span>Register</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-write"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="table-basic.html" class="link"><span>Table Basic</span></a></li>
                    <li><a href="table-datatables.html" class="link"><span>DataTables</span></a></li>
                </ul>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Extra</span>
            </li>
            <li>
                <a href="charts.html" class="link">
                    <i class="ti-bar-chart"></i>
                    <span>Charts</span>
                </a>
            </li>
            <li>
                <a href="fullcalendar.html" class="link">
                    <i class="ti-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>