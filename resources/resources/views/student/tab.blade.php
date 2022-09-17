<section class='attendance-tab'>
    <div class='row'>
        <nav>
            <div class="nav nav-tabs student-nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active col" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <h1>General</h1>
                        </div>
                    </div>
                </button>
                <button class="nav-link col" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div>
                            <h1>Attendance</h1>
                        </div>
                    </div>
                </button>
                <button class="nav-link col" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <div>
                            <h1>Quiz</h1>
                        </div>
                    </div>
                </button>
                <button class="nav-link col" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-finance" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <div>
                            <h1>Finance</h1>
                        </div>
                    </div>
                </button>
                <button class="nav-link col general-section" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-performance" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h1>Performance</h1>
                        </div>
                    </div>
                </button>
                <button class="nav-link col general-section" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-exam" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <div class="general-section">
                        <div>
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h1>Book Exam</h1>
                        </div>
                    </div>
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                {{--                        view page for student detail--}}
                @include('student.detailview.index')
                {{--                            --}}{{--                        edit page for student detail--}}
                @include('student.general.index')
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @include('student.attendence.attendence')
            </div>

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                @include('student.quiz.quiz')
            </div>
            <div class="tab-pane fade " id="nav-finance" role="tabpanel" aria-labelledby="nav-home-tab">
                @include('student.finance.index')
            </div>
            <div class="tab-pane fade" id="nav-performance" role="tabpanel" aria-labelledby="nav-profile-tab">Performance</div>
            <div class="tab-pane fade" id="nav-exam" role="tabpanel" aria-labelledby="nav-contact-tab">Book Exam</div>
        </div>
    </div>
</section>
