<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{url('')}}" aria-expanded="false" aria-controls="ui-basic">
            <div class="sidebar-icon">
                <i class="bi bi-speedometer"></i>
                <span class="menu-title">Dashboard</span>
            </div>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar-icon @if(Request::segment(1) == 'settings') active @endif w-100" id="mySettingsBtn">
                <i class="bi bi-gear"></i>
                <span class="menu-title w-100">Settings<i class="fa-solid fa-angle-down" id="icon-toggle-settings"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseSettings">
            <ul class="nav sub-nav sub-menu">
                <li class="nav-item sub-nav-item">
                    <a class="nav-link" href="{{url('fiscal-years')}}">
                        <div class="sidebar-icon @if(Request::segment(1) == 'fiscal-years') active @endif w-100" id="myBtnFiscalyear">
                            <i class="bi bi-calendar4-week"></i>
                            <span class="menu-title w-100">Fiscal Year</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item sub-nav-item">
                    <a class="nav-link" href="{{url('courses')}}">
                        <div class="sidebar-icon w-100" id="myBtnSettingsCourse">
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="menu-title w-100">Course</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item sub-nav-item" >
                    <a class="nav-link" href="{{url('timetables')}}">
                        <div class="sidebar-icon @if(Request::segment(1) == 'timetables') active @endif w-100" id="myBtnTimetable">
                            <i class="bi bi-calendar4"></i>
                            <span class="menu-title w-100">Time Tables</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item sub-nav-item">
                    <a class="nav-link" href="{{url('timeslots')}}">
                        <div class="sidebar-icon @if(Request::segment(1) == 'timeslots') active @endif w-100" id="myBtnTimeslot">
                            <i class="bi bi-stopwatch"></i>
                            <span class="menu-title w-100">Time Slots</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </li> -->
    <li class="nav-item @if(Request::segment(1) == 'fiscal-years' || Request::segment(1) == 'courses' || Request::segment(1) == 'timetables' || Request::segment(1) == 'timeslots' ) active @endif ">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="mySettingsBtn">
                <i class="bi bi-gear"></i>
                <span class="menu-title w-100">Settings<i class="fa-solid fa-angle-down" id="icon-toggle-settings"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseSettings">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('fiscal-years')}}"><i class="bi bi-calendar4-week"></i>Fiscal Year</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('courses')}}"><i class="bi bi-file-earmark-text"></i>Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('timetables')}}"><i class="bi bi-calendar4"></i>Time Tables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('timeslots')}}"><i class="bi bi-stopwatch"></i>Time Slots</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'batches') active @endif">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="myBtnBatch">
            <i class="bi bi-grid"></i>
                <span class="menu-title w-100">Batch<i class="fa-solid fa-angle-down" id="icon-toggle-batch"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseBatch">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('batches')}}"><i class="fa-solid fa-list fa-sm"></i> List of Batch</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'admissions') active @endif ">
        <a class="nav-link" >
            <div class="sidebar-icon w-100" id="myBtnAdmission">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-title w-100">Admission<i class="fa-solid fa-angle-down" id="icon-toggle-admission"></i></span>
            </div>
        </a>
        <div class="collapse" id="myAdmission">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" >
                    <a class="nav-link" href="{{url('admissions')}}">
                        <i class="fa-solid fa-list-check fa-sm"></i>Admission List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admissions/create')}}">
                        <i class="fa-solid fa-user-plus fa-sm"></i>Add Admission
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'finances') active @endif ">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="myFinanceBtn">
                <i class="fa-solid fa-cash-register"></i>
                <span class="menu-title w-100">Finance List<i class="fa-solid fa-angle-down" id="icon-toggle-finance"></i></span>
            </div>
        </a>
        <div class="collapse" id="myFinance">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" >
                    <a class="nav-link" href="{{url('finances')}}">
                        <i class="fa-solid fa-coins"></i>Finance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('reports/finance')}}">
                        <i class="bi bi-file-earmark-text"></i>Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('reports/due_finance')}}">
                        <i class="fa-solid fa-bell-slash"></i>Due List
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'course-materials' || Request::segment(1) == 'batch-course-materials') active @endif">
        <a class="nav-link">
            <div class="sidebar-icon  w-100" id="myMaterialsBtn">
                <i class="fa-solid fa-book"></i>
                <span class="menu-title w-100">Materials<i class="fa-solid fa-angle-down" id="icon-toggle-materials"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseMaterials">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('course-materials')}}">
                        <i class="bi bi-file-earmark-text"></i>Course Materials
                    </a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="{{url('batch-course-materials')}}">
                        <i class="bi bi-calendar4"></i>Batch Materials
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('zoom-links')}}">
                        <i class="bi bi-file-earmark-text"></i>Zoom Link
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse" id="myCollapseMaterials">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('course-materials')}}"><i class="bi bi-file-earmark-text"></i>Course Materials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('batch-course-materials')}}"><i class="bi bi-calendar4"></i>Batch Materials</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'attendance') active @endif">
        <a class="nav-link" href="#">
            <div class="sidebar-icon w-100" id="myBtnAttendance">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-title w-100">Attendance<i class="fa-solid fa-angle-down" id="icon-toggle-quiz"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseAttendence">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item @if(Request::segment(1) == 'attendance') active @endif">
                    <a class="nav-link " href="{{url('attendance')}}"><i class="fa-solid fa-clipboard-user"></i>List of Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{url('attendance/student')}}"><i class="fa-solid fa-user-tie"></i>Student</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'counselling') active @endif">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="myBtnCounselling">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-title w-100">Career Counselling<i class="fa-solid fa-angle-down" id="icon-toggle-quiz"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseCounselling">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item @if(Request::segment(1) == 'counselling' || Request::segment(1) == 'counsellings') active @endif">
                    <a class="nav-link " href="{{url('counselling')}}"><i class="fa-solid fa-list-check"></i>List of Career Counselling</a>
                </li>
                <li class="nav-item @if(Request::segment(1) == 'counselling-completed' || Request::segment(1) == 'counsellings') active @endif">
                    <a class="nav-link " href="{{url('counselling-completed')}}"><i class="fa-solid fa-list-check"></i>Completed Counselling</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{url('counsellings/group-attendance')}}"><i class="bi bi-card-checklist"></i> Attendance</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'quiz' || Request::segment(1) =='quiz_batch' || Request::segment(1) =='quiz_individual') active @endif">
        <a class="nav-link" href="#">
            <div class="sidebar-icon  w-100" id="myBtnQuiz">
                <i class="bi bi-trophy"></i>
                <span class="menu-title w-100">Quiz Management<i class="fa-solid fa-angle-down" id="icon-toggle-quiz"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseQuiz">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item @if(Request::segment(1) == 'quiz') active @endif">
                    <a class="nav-link " href="{{url('quiz')}}"><i class="bi bi-card-checklist"></i> List of Quiz</a>
                </li>
                <li class="nav-item  @if(Request::segment(1) == 'quiz_batch') active @endif">
                    <a class="nav-link"  href="{{url('quiz_batch')}}"><i class="fa-solid fa-users-line"></i> Quiz To Group</a>
                </li>
                <li class="nav-item @if(Request::segment(1) == 'quiz_individual') active @endif">
                    <a class="nav-link"  href="{{url('quiz_individual')}}"><i class="fa-solid fa-user-pen"></i> Quiz To Individual</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'reports') active @endif ">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="myReportBtn">
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-title w-100">Reports<i class="fa-solid fa-angle-down" id="icon-toggle-report"></i></span>
            </div>
        </a>
        <div class="collapse" id="myReport">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" >
                    <a class="nav-link" href="{{url('reports/finance')}}">
                        <i class="fa-solid fa-coins"></i> Finance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('reports/due_finance')}}">
                        <i class="fa-solid fa-bell-slash"></i> Due List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('reports/attendance')}}">
                        <i class="bi bi-card-checklist"></i> Attendance
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item @if(Request::segment(1) == 'role') active @endif ">
        <a class="nav-link" href="{{url('roles')}}">
            <div class="sidebar-icon w-100" id="myRoleBtn">
                <i class="fa-solid fa-user-gear"></i>
                <span class="menu-title w-100">Roles</span>
            </div>
        </a>
        {{-- <div class="collapse" id="myRole">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item" >
                    <a class="nav-link" href="{{url('roles/role')}}">
                        <i class="fa-solid fa-user-pen"></i> Role
                    </a>
                </li>
            </ul>
        </div> --}}
    </li>
</ul>


