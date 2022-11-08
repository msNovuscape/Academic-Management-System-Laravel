@extends('layouts.app')
@section('title')
    <title>Attendance</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Student Details</h4>
                        </div>
                        <ul class="admin-breadcrumb">
                            <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                            <li>Student</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4 attendence-nav-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link " id="student-tab" data-toggle="tab" href="student" role="tab" aria-controls="home" aria-selected="true">Student Details</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="finance-tab" data-toggle="tab" href="finance" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="quiz-tab" data-toggle="tab" href="quiz" role="tab" aria-controls="messages" aria-selected="false">Quiz</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="counselling-tab" data-toggle="tab" href="career" role="tab" aria-controls="settings" aria-selected="false">Career Counselling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="tech-tab" data-toggle="tab" href="technical" role="tab" aria-controls="settings" aria-selected="false">Technical Exam</a>
                              </li>
                          </ul>
                          
                          {{-- <div class="tab-content">
                            <div class="tab-pane active" id="student" role="tabpanel" aria-labelledby="student-tab"><h1>Test</h1></div>
                            <div class="tab-pane" id="finance" role="tabpanel" aria-labelledby="finance-tab">...</div>
                            <div class="tab-pane" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">...</div>
                            <div class="tab-pane" id="career" role="tabpanel" aria-labelledby="counselling-tab">...</div>
                            <div class="tab-pane" id="technical" role="tabpanel" aria-labelledby="tech-tab">...</div>
                          </div> --}}

                          {{-- test nav --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('script')
    <script>
        $('#myTab a').on('click', function (e) {
            $(this).tab('show')
        })
  </script>
@endsection --}}