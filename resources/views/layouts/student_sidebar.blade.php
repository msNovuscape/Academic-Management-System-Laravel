<ul class="nav">
    <li class="nav-item @if(Request::segment(1) === 'student') active @endif">
        <a class="nav-link" href="{{url('/')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <img src="{{url('images/batch-icon.png')}}" alt="sidebar-icon"/>
                <span class="menu-title">Student Details</span>
            </div>
        </a>
    </li>
    <li class="nav-item @if(Request::segment(2) === 'materials') active @endif">
        <a class="nav-link"  href="{{url('student/materials')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <img src="{{url('images/course-icon.png')}}" alt="sidebar-icon"/>
                <span class="menu-title">Materials</span>
            </div>
        </a>
    </li>
</ul>
