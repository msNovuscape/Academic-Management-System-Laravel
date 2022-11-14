<ul class="nav">
    <li class="nav-item @if(Request::segment(1) == 'student' && Request::segment(2) == null) active @endif">
        <a class="nav-link" href="{{url('')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <img src="{{url('images/dashboard-icon.png')}}" alt="sidebar-icon"/>
                <span class="menu-title">Dashboard</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'materials') active @endif">
        <a class="nav-link"  href="{{url('student/materials')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <img src="{{url('images/course-icon.png')}}" alt="sidebar-icon"/>
                <span class="menu-title">Materials</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) == 'zoom-links') active @endif">
        <a class="nav-link"  href="{{url('student/zoom-links')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <img src="{{url('images/course-icon.png')}}" alt="sidebar-icon"/>
                <span class="menu-title">Zoom Links</span>
            </div>
        </a>
    </li>
    <li class="nav-item students-logout">
        <a class="nav-link" href="{{url('logout')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="menu-title">Logout</span>
            </div>
        </a>
    </li>
</ul>
