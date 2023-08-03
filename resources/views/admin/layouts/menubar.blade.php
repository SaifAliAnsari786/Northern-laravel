<nav class="light-blue navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('super-admin')}}">
            <img src="{{url('frontend/images/logo.png')}}" alt="Extratech-logo" style="max-width:50px; margin-right:109px">
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('super-admin')}}">
            <img src="{{url('frontend/images/Ruby-logo-white.png')}}" alt="logo"/>
        </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <img src="{{url('images/navigation-bar.png')}}" alt="" />
        </button>
        <div class="navbar-right d-flex">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-profile d-flex dropdown-export-menu mx-3">
                    <a class="" href="#">
                        <div class="nav-profile-img">
                            <img src="{{url('frontend/images/Ruby-logo-white.png')}}" alt="logo" />
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1">{{Auth::user()->name}}</p>

                        </div>
                        <div class="">
                            <button>
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content-export-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('logout')}}">
                                            Logout
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>










