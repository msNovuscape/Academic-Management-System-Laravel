<div class="container-fluid page-body-wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        @if(Auth::user()->user_type == array_search('Student',config('custom.user_types')))
            @if(Request::segment(2) != 'quiz_exam')
                @include('layouts.student_sidebar')
            @endif
        @elseif(Auth::user())
            @include('layouts.admin_sidebar')
        @endif

    </nav>
    @yield('main-panel')
</div>
