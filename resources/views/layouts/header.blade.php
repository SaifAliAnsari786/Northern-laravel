<div id="wrapper">
    <header id="header">
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt="Northern Disability"></a>
                </div>
                <nav id="nav">
                    <a href="#" class="nav-opener"><span>Menu</span></a>
                    <div class="nav-drop" style="margin-top:20px;">
                        <ul>
                            <li><a href="/" class="opener active">Home</a>
                            </li>
                            <li><a href="{{ url('about') }}" class="opener">About</a>
                            </li>
                            <li><a href="#" class="opener">Services</a>

                                <ul>
                                    <li><a href="{{ route('service', ['slug' => 'daily-living-support']) }}">Daily Living Support</a></li>
                                    <li><a href="{{ route('service', ['slug' => 'support-coordination']) }}">Support Coordination</a></li>
                                    <li><a href="{{ route('service', ['slug' => 'community-participation']) }}">Community Participation</a></li>
                                    <li><a href="{{ route('service', ['slug' => 'plan-management']) }}">Plan Management</a></li>
                                    <li><a href="{{ route('service', ['slug' => 'household-tasks']) }}">Household Task</a></li>
                                    <li><a href="{{ route('service', ['slug' => 'respite-care']) }}">Respite Care</a></li>
                                </ul>
                            </li>
                            <li><a href="workingatNDS" class="opener">Working At NDS</a></li>
                            <li><a href="gallery" class="opener">Gallery</a>
                            </li>
                            <li>
                                <a href="{{ url ('contact') }}">Contact</a>
                            </li>
                            <li class="tp-enquiry"><a href="{{ url ('form') }}" class="btn">Make an Enquiry</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
