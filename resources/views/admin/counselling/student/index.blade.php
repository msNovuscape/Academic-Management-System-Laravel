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
                                <h4>Student Profile</h4>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Student</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4 attendence-nav-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="student-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="finance-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="quiz-tab" data-toggle="tab" href="#" role="tab" aria-controls="messages" aria-selected="false">Quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="counselling-tab" data-toggle="tab" href="{{url('counselling/'.$setting->id)}}" role="tab" aria-controls="settings" aria-selected="false">Career Counselling</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tech-tab" data-toggle="tab" href="#" role="tab" aria-controls="settings" aria-selected="false">Technical Exam</a>
                                </li>
                            </ul>
                        </div>
                        <div class="career-section">
                            @include('success.success')
                            @include('errors.error
')
                            <div class="col-sm-12 col-md-12 mt-3 mb-3">
                                <div class="border-block">
                                    <div class="block-header">
                                        <h4>Progress Bar</h4>
                                    </div>
                                    <div class="block-body sd-progress-block">
                                        <div class="progress sd-progress mt-3">
                                            <div class="progress-bar bg-success pb" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar progress-nc" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar progress-nc" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="arrow">
                                            @foreach(config('custom.counselling_statuses') as $index => $value)
                                                <div class="arrow-block">
                                                    <div class="block"></div>
                                                    <p>{{$value}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-3 mb-3">
                                <div class="row">
                                    <!-- first column -->
                                    @include('admin.counselling.student.attendance')
                                    <!-- first column -->
                                    <!-- second column -->
                                    @include('admin.counselling.student.status')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showCommentBox(id) {
            if($('#my-status-'+id).is(':checked')){
                if($('#sp-comment-'+id).css('display') == 'none')
                {
                    $('#sp-comment-'+id).show();
                } else {
                    $('#sp-comment-'+id).hide();
                }
            } else {
                $('#sp-comment-'+id).hide();
            }
        }
        var counsellingStatus = true;
        function getVerify(id){
            var status = true;
            for(i = 1; i <=5; i++){
                if (i == 1) {
                    if(!$('#my-status-'+i).is(':checked')){
                        for(j=2; j <=5; j++){
                            if($('#my-status-'+j).is(':checked')){
                                status = false;
                                errorDisplay('Please check the status serially!');
                                break;
                            }
                        }
                    }
                } else {
                    if(status == false){
                        counsellingStatus = false;
                        // $('#my-status-'+i).prop('checked', false); // Unchecks it
                        break;
                    } else {
                        if($('#my-status-'+i).is(':checked')) {
                            for(k = 1; k < i ; k++){
                                if(!$('#my-status-'+k).is(':checked')){
                                    status = false;
                                    errorDisplay('Please check the status serially!');
                                    break;
                                }
                            }
                        } else {
                            for(s = i+1; s <= 5 ; s++){
                                if($('#my-status-'+s).is(':checked')){
                                    status = false;
                                    errorDisplay('Please check the status serially!');
                                    break;
                                }
                            }
                        }
                        if(status == false){
                            counsellingStatus = false;
                            break;
                        }else {
                            counsellingStatus = true;
                        }
                    }
                }
            }
            counsellingStatus = status ;
        }

        function validateForm(){
            if(counsellingStatus){
                return true;
            }else {
                errorDisplay('Please check the status serially!');
                return false;
            }
        }

    </script>
@endsection
