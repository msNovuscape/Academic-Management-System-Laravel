@extends('layouts.app')
@section('title')
    <title>Finance Report</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header d-flex justify-content-between p-4">
                            <h3>Finance Report</h3>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Finance Report</li>
                            </ul>
                        </div>
                        <div class="row p-4">
                            {!! Form::open(['url' => 'reports/finance','method' => 'POST', 'onsubmit' => 'return validateForm()']) !!}
                                <div class="col-12 grid-margin">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Fiscal Year</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select id='date-dropdown' class="w-100 form-control" name="fiscal_year_id">
                                                                    <option value="" selected disabled>Please select fiscal year</option>
                                                                    @foreach($fiscal_years as $fiscal_year)
                                                                        <option value="{{$fiscal_year->id}}" @if(request('fiscal_year_id') == $fiscal_year->id) selected @endif>{{$fiscal_year->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Branch</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="branch_id" class="form-control" id="branch_id">
                                                                    <option value="" selected disabled>Please Select Your Branch</option>
                                                                    @foreach($branches as $branch)
                                                                        <option value="{{$branch->id}}" @if(request('branch_id') == $branch->id) selected @endif>{{$branch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
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
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label>Batch</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                            <select class="form-control" aria-label="Default select example" name="batch_id" id="batch_id" onchange="getStudent()">
                                                                <option selected="" disabled value="" class="option">Search by Batch</option>
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
                                                    <div class="row align-items-baseline">
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
                                                    <div class="row align-items-baseline">
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
                                                    <div class="row align-items-baseline">
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
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Payment</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="payment_status" id="payment_status" class="form-control" >
                                                                    <option value="" selected="" disabled="">Please Select the Payment Status</option>
                                                                    @foreach(config('custom.payment_status') as $index => $value)
                                                                        <option value="{{$index}}" @if(request('payment_status') == $index) selected @endif>{{$value}}</option>
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
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Bank Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="bank_status" id="bank_status" class="form-control">
                                                                    <option value="" selected="" disabled="">Please Select the Bank Status</option>
                                                                    @foreach(config('custom.bank_status') as $index1 => $value1)
                                                                        <option value="{{$index1}}" @if(request('bank_status') == $index1) selected @endif>{{$value1}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card mt-4">
                                            <div class="row border border-1 border-grey rounded-1 p-4 m-1">
                                                <div class="col-12 table-responsive">
                                                    <div class="row p-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="all" type="checkbox" value="all" id="select_all">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                All
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex">
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="s_name" class="form-check-input checkbox" type="checkbox" value="s_name">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Name
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="student_id" class="form-check-input checkbox" type="checkbox" value="student_id">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Student Id
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input  name="email" class="form-check-input checkbox" type="checkbox" value="email">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Email
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="mobile_no" class="form-check-input checkbox" type="checkbox" value="mobile_no">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Mobile No.
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="course" class="form-check-input checkbox" type="checkbox" value="course">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Course
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="batch" class="form-check-input checkbox" type="checkbox" value="batch">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Batch
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="installment1" class="form-check-input checkbox" type="checkbox" value="installment1">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Installment 1
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="installment2" class="form-check-input checkbox" type="checkbox" value="installment2">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Installment 2
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-check">
                                                                <input name="installment3" class="form-check-input checkbox" type="checkbox" value="installment3">
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                    Installment 3
                                                                </label>
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
                                                            <input class="form-check-input" value="2" type="radio" name="report_type" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                <i class="fa-solid fa-file-pdf"></i>
                                                                Pdf
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
            url:Laravel.url+'/reports/finance/batch/'+course_id,
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
            url:Laravel.url+'/reports/finance/student/'+batch_id,
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
