@extends('layouts.app')
@section('title')
    <title>Student Details</title>
@endsection
@section('style')
    {!! Html::style('css/student-detail.css') !!}
@endsection
@section('main-panel')
    <section class='attendence-section'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 profile-col">
                    <div class='profile-general'>
                        <img src={{url("images/profile.png")}} alt="profile"/>
                        <div class='profile-desc'>
                            <h1>Samir Bhandari</h1>
                            <h2>ET-20220601</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 course-col">
                    <div class="course-general">
                        <h1>Network & System Support</h1>
                        <h2>Tuesday - Wednesday - Thursday 7:00 PM - 10:00 PM </h2>
                    </div>
                </div>
                <div class='col-md-4 general-button'>
                    <button class='addstudent-btn'>
                        <img src={{url("icons/add-user-icon.svg")}} alt="add-student"/>
                        <h2>Add Student</h2>
                    </button>
                </div>
            </div>
            <section class='attendance-tab'>
                <div class='row'>
                    <nav>
                        <div class="nav nav-tabs student-nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active col" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">
                                <div class="general-section">
                                    <div>
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div>
                                        <h1>General</h1>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link col" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">
                                <div class="general-section">
                                    <div>
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div>
                                        <h1>Attendance</h1>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link col" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">
                                <div class="general-section">
                                    <div>
                                        <i class="fa-solid fa-book-open"></i>
                                    </div>
                                    <div>
                                        <h1>Quiz</h1>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link col" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-finance" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">
                                <div class="general-section">
                                    <div>
                                        <i class="fa-solid fa-credit-card"></i>
                                    </div>
                                    <div>
                                        <h1>Finance</h1>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link col general-section" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-performance" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">
                                <div class="general-section">
                                    <div>
                                        <i class="fa-solid fa-bolt"></i>
                                    </div>
                                    <div>
                                        <h1>Performance</h1>
                                    </div>
                                </div>
                            </button>
                            <button class="nav-link col general-section" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-exam" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">
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
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            {{--                        view page for student detail--}}
                            @include('student.detailview.index')
                            {{--                        edit page for student detail--}}
                            @include('student.general.general')
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @include('student.attendence.attendence')
                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            Quiz
                        </div>
                        <div class="tab-pane fade " id="nav-finance" role="tabpanel" aria-labelledby="nav-home-tab">
                            Finance
                        </div>
                        <div class="tab-pane fade" id="nav-performance" role="tabpanel"
                             aria-labelledby="nav-profile-tab">Performance
                        </div>
                        <div class="tab-pane fade" id="nav-exam" role="tabpanel" aria-labelledby="nav-contact-tab">Book
                            Exam
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>

@endsection
@section('script')
    <script>
        var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
        tabEl.addEventListener('shown.bs.tab', function (event) {
            event.target // newly activated tab
            event.relatedTarget // previous active tab
        })
    </script>
@endsection
