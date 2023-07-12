<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{url('super-admin')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-speedometer"></i>
                <span class="menu-title">Dashboard</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'settings') active @endif">
        <a class="nav-link" href="{{url('super-admin/settings')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-gear"></i>
                <span class="menu-title">Settings</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'sliders') active @endif">
        <a class="nav-link" href="{{url('super-admin/sliders')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-sliders"></i>
                <span class="menu-title">Sliders</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'pages') active @endif">
        <a class="nav-link" href="{{url('super-admin/pages')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-images"></i>
                <span class="menu-title">Pages</span>
            </div>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'testimonials') active @endif">
        <a class="nav-link" href="{{url('super-admin/testimonials')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-bell"></i>
                <span class="menu-title">Testimonials</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'home-designs') active @endif">
        <a class="nav-link" href="{{url('super-admin/home-designs')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-tools"></i>
                <span class="menu-title">New Home Design</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'display-homes') active @endif">
        <a class="nav-link" href="{{url('super-admin/display-homes')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-tools"></i>
                <span class="menu-title">Display Home</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'faqs') active @endif">
        <a class="nav-link" href="{{url('super-admin/faqs')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-tools"></i>
                <span class="menu-title">FAQ's</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'blogs') active @endif">
        <a class="nav-link" href="{{url('super-admin/blogs')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-file-post"></i>
                <span class="menu-title">Blog</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'seo') active @endif">
        <a class="nav-link" href="{{url('super-admin/seo')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-download"></i>
                <span class="menu-title">Seo</span>
            </div>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'user') active @endif">
        <a class="nav-link" href="{{url('super-admin/user')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-person-fill"></i>
                <span class="menu-title">Wish List User</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'contacts' || Request::segment(2) == 'enquiries' || Request::segment(2) == 'subscribes') active @endif ">
        <a class="nav-link" href="#">
            <div class="sidebar-icon w-100" id="myContactFormBtn">
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-title w-100">Contact/Enquiry<i class="fa-solid fa-angle-down"
                                                                 id="icon-toggle-report"></i></span>
            </div>
        </a>
        <div class="collapse" id="myContactForm">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/contacts')}}">
                        <i class="bi bi-file-earmark-person"></i>Contact List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/enquiries')}}">
                        <i class="bi bi-file-earmark-text"></i>Enquiry List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/subscribes')}}">
                        <i class="bi bi-file-earmark-text"></i>Subscribe List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/designs')}}">
                        <i class="bi bi-file-earmark-person"></i>Home Design List
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'reports') active @endif ">
        <a class="nav-link" href="#">
            <div class="sidebar-icon w-100" id="myReportBtn">
                <i class="bi bi-file-earmark-person"></i>
                <span class="menu-title w-100">Reports<i class="fa-solid fa-angle-down"
                                                         id="icon-toggle-report"></i></span>
            </div>
        </a>
        <div class="collapse" id="myReport">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/reports/contacts')}}">
                        <i class="bi bi-file-earmark-text"></i>Contact Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/reports/enquiries')}}">
                        <i class="bi bi-file-earmark-person"></i>Enquiry Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/reports/subscribes')}}">
                        <i class="bi bi-file-earmark-person"></i>Subscribe Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('super-admin/reports/designs')}}">
                        <i class="bi bi-file-earmark-person"></i>Home Design Report
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'log-viewer') active @endif">
        <a class="nav-link" href="{{url('log-viewer')}}" aria-expanded="false" aria-controls="ui-basic" target="_blank">
            <div class="sidebar-icon">
                <i class="bi bi-tools"></i>
                <span class="menu-title">Log Viewer</span>
            </div>
        </a>
    </li>
</ul>


