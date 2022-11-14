@extends('layouts.app')
@section('title')
    <title>Career Counselling Attendance</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                {{--start loader--}}
                <div class="loader loader-default" id="loader"></div>
                {{--end loader--}}
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        {!! Form::open(['url' => 'attendance','method' => 'GET']) !!}
                        <div class="filter-btnwrap mt-4">
                            <div class="col-md-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="bi bi-grid"></i>
                                            </span>
                                            <select class="form-select" aria-label="Default select example" name="batch_id">
                                                <option selected disabled value="" id="batch-reset">Search by Batch</option>
                                                @foreach($batches as $bat)
                                                    <option value="{{$bat->id}}">{{$bat->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <div class="filter-group mx-2">
                                                <span>
                                                    <img src="{{url('icons/filter-icon.svg')}}" alt="" class="img-flud">
                                                </span>
                                            <button class="fltr-btn" type="submit">Filter</button>
                                        </div>
                                        <div class="refresh-group mx-2">
                                            <a onclick="getReset('{{Request::segment(1)}}')">
                                                <img src="{{url('icons/refresh-top-icon.svg')}}" alt="" class="img-flud">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <ul class="admin-breadcrumb">
                                    <li><a href="/" class="card-heading-link">Home</a></li>
                                    <li>Attendance</li>
                                </ul>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                                <div class="card-wrap form-block p-0 pt-4">
                                    <div class="block-header bg-header d-flex justify-content-between p-4 py-0">
                                        <div class="col-md-11 d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column">
                                                <h3>Career Counselling Attendance</h3>
                                            </div>
                                            <div class="d-flex attendance-toggle">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" onclick="getAttendance(1)">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="form-check mx-4">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" onclick="getAttendance(2)">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Absent
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="attendance-calender mx-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text igt-calender">
                                                            <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                                        </div>
                                                    </div>
                                                    <input name="date" type="text" id="fromDateToDate" class="form-control default-carrier-date"   placeholder="" required onchange="getDatewiseBatchAttendance()"/>
                                                    <span>
                                                        <i class="fa-solid fa-caret-down"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                            <div class="card-wrap card-wrap-bs-none form-block p-4">
                                                <div class="row">
                                                    <div class="col-12 table-responsive table-details" id="mytable">
                                                        @include('admin.counselling.attendance.table.table_without_status')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        $(".default-carrier-date").flatpickr({
            dateFormat: "Y-m-d",
            maxDate : "<?php echo date('Y-m-d');?>",
            defaultDate: "<?php echo date('Y-m-d');?>",
        });
        var select_all = document.getElementById("select_all"); //select all checkbox
        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

        //select all checkboxes
        select_all.addEventListener("change", function(e){
            for (i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = select_all.checked;
                if(this.checked == true){
                    var id = checkboxes[i].value;
                    $('#student_row'+id).addClass('student active')
                }
                if(this.checked == false){
                    var id = checkboxes[i].value;
                    $('#student_row'+id).removeClass('student active')
                }
                // console.log(checkboxes[i].value)
            }
        });


        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if(this.checked == false){
                    select_all.checked = false;
                    var id = $(this).val()
                    $('#student_row'+id).removeClass('student active')
                }
                //check "select all" if all checkbox items are checked
                if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                    select_all.checked = true;
                }
                if(this.checked == true){
                    var id = $(this).val()
                    $('#student_row'+id).addClass('student active')
                }
            });
        }

        function getAttendance(att_status) {
            var arr = [];
            if(att_status === 1){
                var checked_status = 1;
                var unchecked_status = 2;
                var checked_symbol = 'Present';
                var unchecked_symbol = 'Absent';
            }
            if(att_status === 2){
                var checked_status = 2;
                var unchecked_status = 1;
                var checked_symbol = 'Absent';
                var unchecked_symbol = 'Present';
            }

            for (var i = 0; i < checkboxes.length; i++) {
                var id = checkboxes[i].id;
                if($('#'+id).is(':checked')){
                    var student_id = checkboxes[i].value;
                    var symbol = checked_symbol;
                    var status = checked_status;
                    arr.push({student_id,status,symbol});
                }else {
                    var student_id = checkboxes[i].value;
                    var symbol = unchecked_symbol;
                    var status = unchecked_status;
                    arr.push({student_id,status,symbol});
                }
            }
            if(arr.length > 0){
                //start  confirmation for attendance
                $.confirm({
                    title: 'Do you sure want to make attendance?',
                    content: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Yes',
                            btnClass: 'btn-red',
                            action: function(){
                                start_loader();
                                var formData = new FormData();
                                var myJson = JSON.stringify(arr);
                                var attendance_date  = $('#fromDateToDate').val();
                                formData.append('attendance', myJson);
                                formData.append('attendance_date', attendance_date);
                                //start ajax call
                                $.ajax({
                                    /* the route pointing to the post function */
                                    type: 'POST',
                                    url: Laravel.url +"/counsellings/group-attendance",
                                    dataType: 'json',
                                    data: formData,
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,
                                    /* remind that 'data' is the response of the AjaxController */
                                    success: function (data) {
                                        end_loader();
                                        if(data['success']){
                                            $('#attendance_table').remove();
                                            $('#mytable').append(data['html']);
                                            mySelectAllInitiate();
                                        }else {
                                            errorDisplay(data['message']);
                                        }
                                    },
                                    error: function(error) {
                                        end_loader();
                                        errorDisplay('Something went wrong !');

                                    }
                                });
                                //end ajax call
                            }
                        },
                        close: function () {
                        }
                    }
                });
                //end confirmation for attendance
            }else {
                errorDisplay('Please select student for attendance!');
            }
        }

        //update single student attendance
        function singleAttendance(attendance_id,status) {
            //start  confirmation for single attendance
            $.confirm({
                title: 'Do you sure want to make attendance?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){
                            if(status == 1){
                                //if present(1) then make absent(2)
                                var new_status = 2;
                                var symbol = 'Absent';
                            }
                            if(status == 2){
                                //if absent(2) then make present(1)
                                var new_status = 1;
                                var symbol = 'Present';
                            }
                            start_loader();
                            var formData = new FormData();
                            formData.append('status', new_status);
                            formData.append('symbol', symbol);
                            //start ajax call
                            $.ajax({
                                /* the route pointing to the post function */
                                type: 'POST',
                                url: Laravel.url +"/counsellings/group-attendance/"+attendance_id,
                                dataType: 'json',
                                data: formData,
                                processData: false,  // tell jQuery not to process the data
                                contentType: false,
                                /* remind that 'data' is the response of the AjaxController */
                                success: function (data) {
                                    end_loader();
                                    $('#att_btn'+data['data']['id']).remove();
                                    $('#td_status'+data['data']['id']).append(data['html']);
                                    mySelectAllInitiate();
                                    successDisplay(data['message']);
                                },
                                error: function(error) {
                                    end_loader();
                                    errorDisplay('Something went wrong !');
                                }
                            });
                            //end ajax call
                        }
                    },
                    close: function () {
                    }
                }
            });
            //end confirmation for  single attendance
        }

        function getDatewiseBatchAttendance() {
            var attendance_date = $('#fromDateToDate').val();
            start_loader();
            var formData = new FormData();
            formData.append('attendance_date', attendance_date);
            //start ajax call
            $.ajax({
                /* the route pointing to the post function */
                type: 'POST',
                url: Laravel.url +"/counsellings-attendance-by-date",
                dataType: 'json',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    end_loader();
                    $('#attendance_table').remove();
                    $('#mytable').append(data['html']);
                    mySelectAllInitiate();
                },
                error: function(error) {
                    end_loader();
                    errorDisplay('Something went wrong !');
                }
            });
        }



        function mySelectAllInitiate() {
            var select_all = document.getElementById("select_all"); //select all checkbox
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

            //select all checkboxes
            select_all.addEventListener("change", function(e){
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = select_all.checked;
                }
            });


            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all.checked = false;
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                        select_all.checked = true;
                    }
                });
            }
        }

    </script>
@endsection
