<nav>
    <div class="nav nav-tabs student-nav-tabs" id="nav-tab" role="tablist">
        <a href="{{url('admissions/general/'.$setting->id)}}" class="nav-link @if(Request::segment(2) == 'general')  active @endif col" id="nav-home-tab"  aria-controls="nav-home" aria-selected="true">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div>
                    <h1>General</h1>
                </div>
            </div>
        </a>
        <a href="{{url('admissions/attendances/'.$setting->id)}}" class="nav-link @if(Request::segment(2) == 'attendances')  active @endif col"   aria-selected="false">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <h1>Attendance</h1>
                </div>
            </div>
        </a>
        <a href="{{url('admissions/quiz/'.$setting->id)}}" class="nav-link @if(Request::segment(2) == 'quiz')  active @endif col" id="nav-contact-tab"    aria-controls="nav-contact" aria-selected="false">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div>
                    <h1>Quiz</h1>
                </div>
            </div>
        </a>

        <a href="{{url('admissions/finances/'.$setting->id)}}" class="nav-link @if(Request::segment(2) == 'finances')  active @endif col"    aria-controls="nav-home" aria-selected="true">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-credit-card"></i>
                </div>
                <div>
                    <h1>Finance</h1>
                </div>
            </div>
        </a>
        <a href="{{url('admissions/counselling/'.$setting->id)}}" class="nav-link @if(Request::segment(2) == 'counselling')  active @endif col"    aria-controls="nav-home" aria-selected="true">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-credit-card"></i>
                </div>
                <div>
                    <h1>Career</h1>
                </div>
            </div>
        </a>
        <a href="" class="nav-link col general-section" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-exam" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
            <div class="general-section">
                <div>
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div>
                    <h1>Book Exam</h1>
                </div>
            </div>
        </a>
    </div>
</nav>
