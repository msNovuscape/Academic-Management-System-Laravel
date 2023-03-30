@extends('layouts.app')
@section('title')
    <title>Add Technical Exam</title>
@endsection
@section('main-panel')
    <div class="main-panel" id = "physical-exams">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Add Technical Exam</h3>
                            <p class="m-4">Fill the following fields to add a exam</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li class="m-0">
                                        <a href="{{url('fiscal-years')}}">
                                            <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'technical_exam','method'=>'Post']) !!}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Exam type</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="exam_type" class="form-control" id="exam_type" onchange="getLocations()" required>
                                                                    <option value="" selected disabled>Please select exam type</option>
                                                                    @foreach(config('custom.exam_types') as $index => $value)
                                                                        <option value="{{$index}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="date" type="text" class="form-control" id="from_date"  placeholder="Please select exam date" required onchange="getMinDate()"/>
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 stretch-card sl-stretch-card mt-4"  id="tutor-course">
                                            <div class="row" >
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table" id="my-table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">Course</th>
                                                            <th class = "block-hide" id = "branch-block-th" scope="col">Branch</th>
                                                            <th scope="col">Timeslot</th>
                                                            <th scope="col">Capacity</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="details" id="tr_1">
                                                            <td>
                                                                <select name="course_ids[]" class="form-control">
                                                                    <option value="" selected disabled>Please Select Course Name</option>
                                                                    @foreach($courses as $course)
                                                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td class = "block-hide" id = "branch-block">
                                                                <select name="branch_ids[]" class="form-control" >
                                                                    <option value="" selected disabled>Please Select Branch</option>
                                                                    @foreach($branches as $branch)
                                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="timeslot_ids[]" class="form-control">
                                                                    <option value="" selected disabled>Please Select Timeslot</option>
                                                                    @foreach($timeslots as $timeslot)
                                                                        <option value="{{$timeslot->id}}">{{$timeslot->start_time .' - '.$timeslot->end_time}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>

                                                            <td>
                                                                <input type="number" class="form-control image" name="capacity[]" required>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger"  role="button" onclick="getDelete(1)">Delete</a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <a class="btn btn-primary"  role="button" style="float: right" onclick="getMore()">Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" selected disabled hidden>Please Select Status</option>
                                                                    @foreach(config('custom.status') as $index => $value)
                                                                        <option value="{{$index}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 mt-4 block-hide" id = "branch-block">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Branch</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="technical-exam-checkbox">
                                                                @foreach($branches as $branch)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="{{$branch->id}}">
                                                                        <label class="form-check-label" for="{{$branch->id}}">
                                                                            {{$branch->name}}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Course</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="technical-exam-checkbox">
                                                                @foreach($courses as $course)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="{{$course->id}}">
                                                                        <label class="form-check-label" for="{{$course->id}}">
                                                                            {{$course->name}}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Timeslots</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="technical-exam-checkbox">
                                                                @foreach($timeslots as $timeslot)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="{{$timeslot->id}}">
                                                                        <label class="form-check-label" for="{{$timeslot->id}}">
                                                                            {{$timeslot->start_time . '-'. $timeslot->end_time}}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" selected disabled hidden>Please Select Status</option>
                                                                    @foreach(config('custom.status') as $index => $value)
                                                                        <option value="{{$index}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="button-section d-flex justify-content-end mt-4">
                                            <a href="{{url('technical_exams')}}">
                                                <button type="button">
                                                    Skip
                                                    <i class="fa-solid fa-angles-right"></i>
                                                </button>
                                            </a>

                                            <button>
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

        function getLocations(){

               // Get a reference to the element
                var exam_type = document.getElementById("exam_type");
                var branchBlock = document.getElementById("branch-block");
                var branchBlockth = document.getElementById("branch-block-th");

                if(exam_type.value == 1){
                    // Add a CSS class to the element
                    branchBlock.classList.add("block-hide");
                    branchBlockth.classList.add("block-hide");
                }
                else{
                    // $('#tr_1').remove();
                    // Remove a CSS class from the element
                    branchBlock.classList.remove("block-hide");
                    branchBlockth.classList.remove("block-hide");
                }

        }

        function getDelete(id) {
            if($('.image').length > 1){
                $('#tr_'+id).remove();
            } else {
                errorDisplay('Please enter at least one module name!');
            }
        }

        var count = 1;
        function getMore() {
            const physicalExamRow = document.querySelector('.details').cloneNode(true);
            physicalExamRow.querySelector('select[name="course_ids[]"]').selectedIndex = 0;
            physicalExamRow.querySelector('select[name="branch_ids[]"]').selectedIndex = 0;
            physicalExamRow.querySelector('select[name="timeslot_ids[]"]').selectedIndex = 0;
            physicalExamRow.querySelector('input[name="capacity[]"]').value = '';
            const physicalExamTableBody = document.querySelector('#physical-exams tbody');
            physicalExamTableBody.appendChild(physicalExamRow);
        }
    </script>
@endsection
