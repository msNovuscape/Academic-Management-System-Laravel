<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="{{url('')}}" aria-expanded="false" aria-controls="ui-basic">
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
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar-icon @if(Request::segment(1) == 'settings') active @endif w-100" id="mySettingsBtn">
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
    <li class="nav-item">
        <a class="nav-link"  href="#">
            <div class="sidebar-icon @if(Request::segment(1) == 'batches') active @endif w-100" id="myBtnBatch">
            <i class="bi bi-grid"></i>
                <span class="menu-title w-100">Batch<i class="fa-solid fa-angle-down" id="icon-toggle-batch"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseBatch">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('batches')}}">List of Batch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#">Add Batch</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('admissions')}}">
            <div class="sidebar-icon  @if(Request::segment(1) == 'admissions') active @endif w-100" id="myBtnAdmission">
                <i class="bi bi-card-checklist"></i>
                <span class="menu-title w-100">Admission</span>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="#">
            <div class="sidebar-icon  @if(Request::segment(1) == 'students') active @endif w-100" id="myBtnStudent">
                <i class="bi bi-people"></i>
                <span class="menu-title w-100">Students<i class="fa-solid fa-angle-down" id="icon-toggle-student"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseStudent">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'students') active @endif" href="{{url('admin/students')}}">List of Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{url('admissions/create')}}">Add Student</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar-icon w-100" id="myFinanceBtn">
                <i class="fa-solid fa-cash-register"></i>
                <span class="menu-title w-100">Finance<i class="fa-solid fa-angle-down" id="icon-toggle-finance"></i></span>
            </div>
        </a>
        <div class="collapse" id="myFinance">
            <ul class="nav sub-nav">
                <li class="nav-item sub-nav-item" >
                    <a class="nav-link" href="{{url('finances')}}">
                        <div class="sidebar-icon w-100" id="myBtnTimetable">
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="menu-title w-100">finance</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item sub-nav-item" >
                    <a class="nav-link" href="{{url('reports/finance')}}">
                        <div class="sidebar-icon w-100" id="myBtnTimetable">
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="menu-title w-100">Report</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link">
            <div class="sidebar-icon w-100" id="myMaterialsBtn">
                <i class="fa-solid fa-book"></i>
                <span class="menu-title w-100">Materials<i class="fa-solid fa-angle-down" id="icon-toggle-materials"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseMaterials">
            <ul class="nav sub-nav">
                <li class="nav-item sub-nav-item">
                    <a class="nav-link" href="{{url('course-materials')}}">
                        <div class="sidebar-icon w-100 @if(Request::segment(1) == 'course-materials') active @endif" id="myBtnSettingsCourse">
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="menu-title w-100">Course Materials</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item sub-nav-item" >
                    <a class="nav-link" href="{{url('batch-course-materials')}}">
                        <div class="sidebar-icon  w-100 @if(Request::segment(1) == 'batch-course-materials') active @endif" id="myBtnTimetable">
                            <i class="bi bi-calendar4"></i>
                            <span class="menu-title w-100">Batch Materials</span>
                        </div>
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
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar-icon @if(Request::segment(1) == 'students') active @endif w-100" id="myBtnAttendance">
                <i class="bi bi-calendar2-check"></i>
                <span class="menu-title w-100">Attendance<i class="fa-solid fa-angle-down" id="icon-toggle-attendance"></i></span>

            </div>
        </a>
        <div class="collapse" id="myCollapseAttendance">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'attendance') active @endif" href="{{url('attendance')}}">List of Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{url('attendance')}}">Add Attendance</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar-icon @if(Request::segment(1) == 'quiz') active @endif w-100" id="myBtnQuiz">
                <i class="bi bi-trophy"></i>
                <span class="menu-title w-100">Quiz Management<i class="fa-solid fa-angle-down" id="icon-toggle-quiz"></i></span>
            </div>
        </a>
        <div class="collapse" id="myCollapseQuiz">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link @if(Request::segment(1) == 'quiz') active @endif" href="{{url('quiz')}}">List of Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @if(Request::segment(1) == 'quiz') active @endif"  href="{{url('quiz_batch')}}">Quiz To Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @if(Request::segment(1) == 'quiz') active @endif"  href="{{url('quiz_individual')}}">Quiz To Individual</a>
                </li>

            </ul>
        </div>
    </li>
</ul>






