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
                <i class="bi bi-gear"></i>
                <span class="menu-title">Sliders</span>
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



    <li class="nav-item @if(Request::segment(2) == 'testimonials') active @endif">
        <a class="nav-link" href="{{url('super-admin/testimonials')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-bell"></i>
                <span class="menu-title">Testimonials</span>
            </div>
        </a>
    </li>


</ul>


