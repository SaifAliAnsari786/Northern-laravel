<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        @if(Auth::user())
            @include('admin.layouts.admin_sidebar')
        @endif
    </nav>
    @yield('main-panel')
</div>
