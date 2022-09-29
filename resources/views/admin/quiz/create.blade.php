@extends('layouts.app')
@section('title')
    <title>Quiz</title>
@endsection
@section('style')
    <style>
        .choice-input{
            width:25px;
        }
    </style>
@endsection
@section('main-panel')
    <div class="main-panel w-100">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 stretch-card">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header p-4">
                                    <h3>Add Quiz Question</h3>
                                    <div class="tbl-buttons">
                                        <ul class="mb-0 px-2">
                                            <li>
                                                <a href="{{url('quiz')}}">
                                                    <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row p-4">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                {!! Form::open(['url' => 'quiz','method'=>'Post']) !!}
                                                <div class="row quiz-add">
                                                    <div class="col-md-6 d-flex mt-2">
                                                        <div class="col-md-3">
                                                            <label>Select Course</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                        <span>
                                                            <i class="fa-solid fa-book-open"></i>
                                                        </span>
                                                                <select class="form-select" aria-label="Default select example" name="course_id" required>
                                                                    <option value="" selected disabled>Please Select Course</option>
                                                                    @foreach($courses as $course)
                                                                        <option value="{{$course->id}}" @if(old('course_id') == $course->id) selected @endif>{{$course->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex mt-2">
                                                        <div class="col-md-3">
                                                            <label>Quiz name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Write quiz name here" name="name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex mt-4">
                                                        <div class="col-md-3">
                                                            <label>Time Period (Min)</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="time_period" min="1"  type="number" class="form-control"  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex mt-4">
                                                        <div class="col-md-3">
                                                            <label>Status</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Please Select Status</option>
                                                                    @foreach(config('custom.status') as $index => $value)
                                                                        <option value="{{$index}}" @if(old('status') == $index) selected @endif>{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 date-quiz d-flex mt-4">
                                                        <div class="col-md-3">
                                                            <label for="">Date</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="date" type="text" class="form-control flatpickr-input" id="from_date" placeholder="Please select course start date" required>
                                                                <div class="input-group-prepend d-flex">
                                                                    <div class="input-group-text p-2">
                                                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex mt-4">
                                                        <div class="col-md-3">
                                                            <label>Remark</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="Write your remarks" name="remark">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="button-section d-flex justify-content-end mt-4">
                                                        <a href="{{url('quiz')}}">
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
    </script>
@endsection




