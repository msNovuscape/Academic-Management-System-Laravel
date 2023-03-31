@extends('layouts.app')
@section('title')
    <title>Batch</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Edit Batch</h3>
                            <p class="ms-2">Fill the following fields to edit a Batch</p>
                            <div class="tbl-buttons">
                                <ul class="mb-0 px-2">
                                    <li>
                                        <a href="{{url('batch-lists')}}">
                                            <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin mb-4">
                                {!! Form::open(['url' => 'batches/'.$setting->id,'method'=>'Post','onsubmit' => 'return formValidation()']) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Course</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="time_slot_id" class="form-control" id="courses_type" onchange="getCourses()" required>
                                                                    <option value="" selected disabled>Please Select Your Course</option>
                                                                    @foreach($setting_courses as $courses)
                                                                        <option value="{{$courses->id}}" @if($setting->time_slot->course_id == $courses->id) selected @endif>{{$courses->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Time Slots</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="time_slot_id" class="form-control" id="time_slot_id" required>
                                                                    <option value="" class="option" selected disabled>Please Select Your Time Slots</option>
                                                                    @foreach($time_slots as $time_slot)
                                                                        <option value="{{$time_slot->id}}" @if($time_slot->id == $setting->time_slot_id) selected @endif class="option">{{$time_slot->time_table->day}}[{{$time_slot->time_table->start_time}}-{{$time_slot->time_table->end_time}}]</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Start Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="start_date" type="text" value="{{$setting->start_date}}" class="form-control" id="from_date"  placeholder="Please select course start date" required onchange="getMinDate()"/>
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text p-2">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">End Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input  name="end_date" type="text" value="{{$setting->end_date}}" id="to_date" class="form-control" placeholder="Please select course end date" onchange="getBatchCalender()"/>
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text p-2">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" selected disabled>Please Select Status</option>
                                                                    @foreach(config('custom.status') as $index => $value)
                                                                        <option value="{{$index}}" @if($setting->status == $index) selected @endif>{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Batch Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="name_other" required value="{{$setting->name_other}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4" style="display: none">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Total Fee</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="number" value="{{$setting->fee}}" readonly name="fee" class="form-control" min="1" id="total_fee" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Remark</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <textarea name="remark" rows="5" placeholder="Write your remarks here">{{$setting->remark}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="col-12 table-responsive table-details mt-4">
                                                <table class="table table-bordered table-installment" id="tableInstallment">
                                                    <thead>
                                                    <tr>
                                                        <th>S.N.</th>
                                                        <th>Installment</th>
                                                        <th>Due Date</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="student_list">
                                                        @foreach($setting->batch_installments as $installment)
                                                            <tr id="tr_{{$loop->iteration}}">
                                                                <td id="td_count_{{$loop->iteration}}">{{$loop->iteration}}</td>
                                                                <td class="table-date">
                                                                    <div class="input-group">
                                                                        <select name="installment_type[]" id="installment_type{{$loop->iteration}}" class="form-control" required readonly="">
                                                                            <option selected disabled value="">Please Select Installment</option>
                                                                            @foreach(config('custom.installment_types') as $index => $value)
                                                                                <option value="{{$index}}" @if($installment->installment_type == $index) selected @else disabled @endif>{{$value}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td class="table-date">
                                                                    <div class="input-group">
                                                                        <input type="text" name="due_date[]"  value="{{$installment->due_date}}" class="form-control batchCalender" id="batchCalender{{$loop->iteration}}" onchange="getCalenderReArrange({{$loop->iteration}})" required/>
                                                                    </div>
                                                                </td>
                                                                <td class="table-date">
                                                                    <div class="input-group">
                                                                        <input type="number" name="amount[]" value="{{$installment->amount}}" min="1" class="form-control amount" id="amount{{$loop->iteration}}" required onchange="getTotalAmount()">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr id="tr_last">
                                                                <td></td>
                                                                <td colspan="2">Total</td>
                                                                <td id="total_amount_id">{{$setting->batch_installments->sum('amount')}}</td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- start section for tutor--}}
                                        <div class="mt-4">
                                            <div class="col-12 table-responsive table-details mt-2" id="tutor">
                                                    @include('admin.batch.tutor_update')
                                            </div>
                                        </div>
                                        {{-- end section for tutor--}}

                                        <div class="button-section d-flex justify-content-end mt-4">
                                            <a href="{{url('batches')}}">
                                                <button type="button">
                                                    Skip
                                                    <i class="fa-solid fa-angles-right"></i>
                                                </button>
                                            </a>

                                            <button type="submit">
                                                Save & Continue
                                                <i class="fas fa-angle-double-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
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
        @if($setting->time_slot->course->activeUserTeachers->count() > 0)
            var select_all = document.getElementById("select_all"); //select all checkbox
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
            if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                select_all.checked = true;
            }
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
        @endif

        $("#from_date").flatpickr({
            dateFormat: "Y-m-d"
        });
        function getMinDate(){
            var min_date = $('#from_date').val();
            if(min_date != ''){
                $('#to_date').flatpickr({
                    minDate: min_date,
                    dateFormat: 'Y-m-d',
                });
            }
        }
        function getCourses(){
            var course_id = $('#courses_type').val();
            $.ajax({
                type:'GET',
                url:Laravel.url+'/batches/get_courses/'+course_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    $('.option').remove();
                    $('#tutor-table').remove();
                    $('#time_slot_id').append(data['html']);
                    if(data['tutor'] != ''){
                        $('#tutor').append(data['tutor']);
                        selectAll();
                    }
                },
                error: function (error){
                }
            });
        }
        function selectAll() {
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

        $('#batchCalender1').flatpickr({
            minDate: $('#from_date').val(),
            maxDate: $('#to_date').val(),
            dateFormat: 'Y-m-d',
        });
        $('#batchCalender2').flatpickr({
            minDate: $('#from_date').val(),
            maxDate: $('#to_date').val(),
            dateFormat: 'Y-m-d',
        });
        $('#batchCalender3').flatpickr({
            minDate: $('#from_date').val(),
            maxDate: $('#to_date').val(),
            dateFormat: 'Y-m-d',
        });

        function getMoreInstallment() {
            if($('#from_date').val() != '' && $('#to_date').val() != '') {
                var tr_no = $(".table-installment tr:nth-last-child(2) td").html();
                if($('#installment_type'+tr_no).val() != null && $('#batchCalender'+tr_no).val() != '' && $('#amount'+tr_no).val() != ''){
                    var tr_count = parseInt(tr_no) + 1;
                    var tr_dom = '<tr id="tr_' + tr_count + '">' +
                        '<td id="td_count_'+tr_count+'">' + tr_count + '</td>' +
                        '<td class="table-date">' +
                        '<div class="input-group">' +
                        '<select name="installment_type[]" id="installment_type'+tr_count+'" class="form-control" required>' +
                        '<option selected disabled value="">Please Select Installment</option>' +
                        '@foreach(config('custom.installment_types') as $index => $value)' +
                        '<option value="{{$index}}">{{$value}}</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</div>' +
                        '</td>' +
                        '<td class="table-date">' +
                        '<div class="input-group">' +
                        '<input type="text" name="due_date[]" value="{{old('date')}}" class="form-control batchCalender" id="batchCalender'+ tr_count +'" required onchange="getCalenderReArrange('+tr_count+')"/>' +
                        '</div>' +
                        '</td>' +
                        '<td class="table-date">' +
                        '<div class="input-group">' +
                        '<input type="number" name="amount[]" min="1"  class="form-control amount" id="amount'+tr_count+'" required onchange="getTotalAmount()">' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<a href="#" role="button" onclick="(deleteRow('+tr_count+'))"><i class="fa-solid fa-xmark"></i></a>' +
                        '</td>' +
                        '</tr>';
                    $(tr_dom).insertAfter($('#tr_' + tr_no));
                    $("#batchCalender"+tr_count).flatpickr({
                        minDate: $('#batchCalender'+tr_no).val(),
                        maxDate: $('#to_date').val(),
                        dateFormat: "Y-m-d",
                    });
                }else {
                    if($('#installment_type'+tr_no).val() == null){
                        errorDisplay('Please select the predecessor installment type!')
                    }
                    if($('#batchCalender'+tr_no).val() == ''){
                        errorDisplay('Please select the predecessor due date!')
                    }
                    if($('#amount1').val() == ''){
                        errorDisplay('Please select the predecessor amount!')
                    }
                }

            }else {
                if($('#from_date').val() == ''){
                    errorDisplay('Please select From Date');
                }
                if($('#to_date').val() == ''){
                    errorDisplay('Please select To Date');
                }
            }
        }

        function getCalenderReArrange(id){
            var second_last_tr = $(".table tr:last").prev().find("td").html();
            var check = parseInt(second_last_tr) - parseInt(id);
            debugger;
            if(check > 0){
                var start  = parseInt(id) +1;
                for(i= start; i <= parseInt(second_last_tr); i++){
                    if(new Date($('#batchCalender'+i).val()) < new Date($('#batchCalender'+id).val()))
                    {
                        $('#batchCalender'+i).val('');
                        $("#batchCalender"+i).flatpickr({
                            minDate: $('#batchCalender'+id).val(),
                            maxDate: $('#to_date').val(),
                            dateFormat: "Y-m-d",
                        });
                    }

                }
            }
        }

        function getTotalAmount() {
            var l = $('.amount').length;
            var total_amount = 0.0;
            for (var i = 0; i < l ; i++){
                if($('.amount')[i].value != ''){
                    total_amount = total_amount + parseFloat($('.amount')[i].value);
                }
            }
            $('#total_amount_id').html(parseFloat(total_amount));
        }

        function deleteRow(id){
            $('#tr_'+id).remove();
            getTotalAmount();
        }

        function formValidation(){
            $('#total_fee').attr('value', parseFloat($('#total_amount_id').html()));
            if($('#from_date').val() == ''){
                $('#from_date').focus();
                errorDisplay('Please select the From Date');
                return false
            }
            if($('#to_date').val() == ''){
                $('#to_date').focus();
                errorDisplay('Please select the To Date');
                return false
            }

            for(var i= 0;  i < $('.batchCalender').length; i++){
                if($('.batchCalender')[i].value == ''){
                    $('.batchCalender')[i].focus();
                    errorDisplay('Please select the Due Date');
                    return false;
                    break;
                }
            }
        }
    </script>
@endsection
