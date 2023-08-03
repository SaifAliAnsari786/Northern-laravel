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
    <li class="nav-item @if(Request::segment(2) == 'seo') active @endif">
        <a class="nav-link" href="{{url('super-admin/seo')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-download"></i>
                <span class="menu-title">Seo</span>
            </div>
        </a>
    </li>



    <li class="nav-item @if(Request::segment(2) == 'testimonials') active @endif">
        <a class="nav-link" href="{{url('super-admin/service')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-bell"></i>
                <span class="menu-title">Service</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'contacts') active @endif ">
        <a class="nav-link" href="{{url('super-admin/contact')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon w-100" >
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-title w-100">Contact</span>
            </div>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'working_nds') active @endif ">
        <a class="nav-link" href="{{url('super-admin/workingatNDS')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon w-100" >
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-title w-100">Working At NDS Form</span>
            </div>
        </a>
    </li>

    <li class="nav-item @if(Request::segment(2) == 'forms') active @endif ">
        <a class="nav-link" href="{{url('super-admin/form')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon w-100" >
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-title w-100">Enquiry Form</span>
            </div>
        </a>
    </li>


</ul>


