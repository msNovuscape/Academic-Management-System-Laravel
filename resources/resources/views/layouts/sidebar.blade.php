<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        @if(Auth::user()->user_type == array_search('Student',config('custom.user_types')))
            @include('layouts.student_sidebar')
        @elseif(Auth::user())
            @include('layouts.admin_sidebar')
        @endif

    </nav>
    @yield('main-panel')
</div>
