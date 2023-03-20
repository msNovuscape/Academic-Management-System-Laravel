@extends('layouts.app')
@section('title')
    <title>Attendance Report</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header d-flex justify-content-between p-4">
                            <h3>Attendance Report</h3>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Attendance Report</li>
                            </ul>
                        </div>
                        <div class="row p-4">
                            {!! Form::open(['url' => 'reports/attendance','method' => 'POST', 'onsubmit' => 'return validateForm()']) !!}
                                <div class="col-12 grid-margin">
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row g-2 align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Course</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="course_id" class="form-control" id="course_id" onchange="getBatch()">
                                                                    <option value="" selected disabled>Please Select Your Course</option>
                                                                    @foreach($courses as $course)
                                                                        <option value="{{$course->id}}" @if(request('course_id') == $course->id) selected @endif>{{$course->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row g-2 align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Batch</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                            <select class="form-control" aria-label="Default select example" name="batch_id" id="batch_id" onchange="getStudent()" required>
                                                                <option selected="" disabled value="" class="option">Please select the batch</option>
                                                                @foreach($batches as $batch)
                                                                    <option value="{{$batch->id}}" class="option" @if(request('batch_id') == $batch->id) selected @endif>{{$batch->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row g-2 align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="name" class="form-control" id="student_id">
                                                                    <option value="" selected disabled class="option-student">Please Select Your Name</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row g-2 align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">From Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="from_date" type="text" class="form-control flatpickr-input" id="from_date" placeholder="Please select course start date" onchange="getMinDate()">
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text p-2">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row g-2 align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">To Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="to_date" type="text" id="to_date" class="form-control" placeholder="Please select course end date">
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text p-2">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card mt-4">
                                            <div class="row border border-1 border-grey rounded-1 p-4 m-1">
                                                <div class="col-12 table-responsive">
                                                    <div class="row justify-content-center">
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="1" type="radio" name="report_type" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                <i class="fa-solid fa-eye"></i>
                                                                Show
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" value="3" type="radio" name="report_type" id="flexRadioDefault3">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                <i class="fa-solid fa-file-excel"></i>
                                                                Excel
                                                            </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-section d-flex justify-content-center mt-4">
                                            <div class="row col-md-2">
                                                <div class="w-100 button-section d-flex justify-content-end mt-2 mb-2">
                                                    <button type="submit" class="w-100">
                                                        Report
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <script>
    $("#from_date").flatpickr({
            maxDate: "<?php echo date('Y-m-d');?>",
            dateFormat: "Y-m-d"
        });
    function getMinDate(){
            var min_date = $('#from_date').val();
            if(min_date != ''){
                $('#to_date').flatpickr({
                    minDate: min_date,
                    maxDate: "<?php echo date('Y-m-d');?>",
                    dateFormat: 'Y-m-d',
                });
            }else {
                $('#to_date').focus();
            }
        }

    function getBatch() {
        var course_id = $('#course_id').val();
        $.ajax({
            type:'GET',
            url:Laravel.url+'/reports/attendance/batch/'+course_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            success:function (data){
                $('.option').remove();
                $('#batch_id').append(data['html'])
            },
            error: function (error){
                errorDisplay('Something went worng !');
            }
        });

    }
    function getStudent() {
        var batch_id = $('#batch_id').val();
        $.ajax({
            type:'GET',
            url:Laravel.url+'/reports/attendance/student/'+batch_id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            success:function (data){
                $('.option-student').remove();
                $('#student_id').append(data['html'])
            },
            error: function (error){
                errorDisplay('Something went worng !');
            }
        });

    }

    function validateForm() {
        var show = $('#flexRadioDefault1').val();
        var pdf = $('#flexRadioDefault2').val();
        var excel = $('#flexRadioDefault3').val();
        if($('#flexRadioDefault1').is(':checked') || $('#flexRadioDefault2').is(':checked') || $('#flexRadioDefault3').is(':checked')){
            return true;
        }else {
            errorDisplay('Please select report type to view!');
            return false;
        }
    }
  </script>
@endsection
