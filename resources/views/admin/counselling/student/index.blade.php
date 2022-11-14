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
                                            @if($setting->sCounselling)
                                                <div class="progress-bar bg-success pb" style="width: {{$setting->sCounselling->studentCounsellingStatuses->count() * 20}}% " id='my-progressbar' role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            @else
                                                <div class="progress-bar bg-success pb" id='my-progressbar' role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            @endif
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
                            <div class="col-12 career-table table-responsive grid-margin mt-2x">
                                <div class="block-header">
                                    <h3>Attendance</h3>
                                </div>
                                <table class="table mt-2">
                                    <thead class="tbl-light-head">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($setting->sCounselling)
                                            @if($setting->sCounselling->s_counselling_attendances->count() > 0)
                                                @foreach($setting->sCounselling->s_counselling_attendances_orderByDate as $s_counselling_attendance)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$s_counselling_attendance->date}}</td>
                                                        <td>
                                                            @if($s_counselling_attendance->status == 2)
                                                                <div class="td-pblock" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Absent">
                                                                    <label class="form-check-label" for="flexRadioDefault1">Absent</label>
                                                                    <i class="fa-solid fa-user-check absent"></i>
                                                                </div>
                                                            @else
                                                                <div class="td-pblock" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Present">
                                                                    <label class="form-check-label" for="flexRadioDefault1">Present</label>
                                                                    <i class="fa-solid fa-user-check present"></i>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endif
                                    </tbody>
                                </table>
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
            var percentange = parseInt(id * 20)+'%';
            $("#my-progressbar").css( "width", percentange);
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
        @if(isset($sMinDate))
            $("#sDate").flatpickr({
                minDate : "<?php echo $sMinDate; ?>",
                maxDate : "<?php echo date('Y-m-d');?>",
                dateFormat: "Y-m-d",
            });
        @else
            $("#sDate").flatpickr({
                maxDate : "<?php echo date('Y-m-d');?>",
                dateFormat: "Y-m-d",
            });
        @endif

    </script>
@endsection
