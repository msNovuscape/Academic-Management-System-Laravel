@extends('layouts.app')
@section('title')
    <title>Student Quiz</title>
@endsection
@section('style')
    {!! Html::style('css/student-detail.css') !!}

@endsection
@section('main-panel')
    <div class="main-panel">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <section class='tests-section'>
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="test-title">
                        <h1>{{$quiz_question->quiz->name}}</h1>
                        <p>Attempt all questions. You need to obtain 60 marks to pass this exam. </p>
                    </div>
                    <div class="test-breadcrum">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quiz</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row" id="new_quiz_dom">
                        <div class="col-md-8" id="recent_quiz_dom">
                            <div class="test-body">
                                <div class="question-title">
                                    <h1>Question {{$question_count}} [Please must select {{$no_of_right_answers}} option for right answer]</h1>
                                </div>
                                <input type="hidden" value="{{$question_count}}" id="my_quiz_count">
                                <input type="hidden" value="{{$no_of_right_answers}}" id="my_quiz_answer_count">
                                @if($quiz_question->question_type == 1)
                                    <div class="question-section">
                                        <h1>{{$quiz_question->question}} </h1>
                                        <div class="questions-lists">
                                            @foreach($quiz_question->quiz_options as $quiz_option)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input student-answers" name="option_id[]" type="checkbox" id="inlineCheckbox1" value="{{$quiz_option->id}}">
                                                        <label class="form-check-label" for="inlineCheckbox1">{{$quiz_option->label}} )   {{$quiz_option->option}}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if($quiz_question->question_type == 2)
                                    <div class="question-section">
                                        <div class="questions mb-2">
                                            <img src="{{url($quiz_question->quiz_question_image->image)}}" class="img-fluid">
                                        </div>
                                        <h1>{{$quiz_question->question}} [Please must select {{$no_of_right_answers}} option for right answer]</h1>
                                        <div class="questions-lists">
                                            @foreach($quiz_question->quiz_options as $quiz_option)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input student-answers" name="option_id[]" type="checkbox" id="inlineCheckbox1" value="{{$quiz_option->id}}">
                                                        <label class="form-check-label" for="inlineCheckbox1">{{$quiz_option->label}} )   {{$quiz_option->option}}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4" id="quiz_time_section">
                            <div class="record-detail">
                                <div class="row record-top">
                                    <div class="col-md-6">
                                        <h2>Remaining Time</h2>
                                        <p>Your exam remaining time</p>
                                    </div>
                                    <div class="col-md-6 d-flex gap-4 justify-content-end">
                                        <div class="">
                                            <h2>Date</h2>
                                            <p>6/4/2022</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h1>Hours</h1>
                                        <h1>Minutes</h1>
                                        <h1>Seconds</h1>
                                    </div>
                                    <div class="d-flex justify-content-between px-4">
                                        <h1 id="hours"></h1><h1>:</h1>
                                        <h1 id="minutes"></h1><h1>: </h1>
                                        <h1 id="seconds"></h1>
                                    </div>
                                </div>

                                <div class="record-bottom">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Total Questions</td>
                                            <td>:</td>
                                            <td>69</td>
                                        </tr>
                                        <tr>
                                            <td>Pass Mark</td>
                                            <td>:</td>
                                            <td>60</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
                <div id="new_button">
                    <button class="next-button mt-4" id="old_button" type="button" onclick="getNextQuestion({{$quiz_question->id}})">Next <i class="fa-solid fa-angles-right"></i></button>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        function startTimer(duration,view_hours, view_minute, view_seconds) {
            var countdown = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt((countdown /3600)%24, 10)
                minutes = parseInt((countdown / 60)%60, 10)
                seconds = parseInt(countdown % 60, 10);
                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                view_hours.textContent = hours;
                view_minute.textContent = minutes;
                view_seconds.textContent = seconds;
                if(--countdown < 0){
                    start_loader();
                    var formData = new FormData();
                    $.ajax({
                        /* the route pointing to the post function */
                        type: 'POST',
                        url: Laravel.url +"/student/student_quiz_individual_time_out",
                        dataType: 'json',
                        data: formData,
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,
                        /* remind that 'data' is the response of the AjaxController */
                        success: function (data) {
                            end_loader();
                            debugger;
                            window.location.href =  Laravel.url+'/student';
                            // $('#attendance_table').remove();
                            // $('#mytable').append(data['html']);
                        },
                        error: function(error) {
                            end_loader();
                            debugger;
                            errorDisplay('Something went wrong !');
                        }
                    });
                    // window.local.replace('/')
                }
                // --countdown;
            }, 1000);
        }

        window.onload = function () {
            // var calculationInHours = 60;
            var calculationInHours = '<?php  echo $time_period; ?>';
            view_hours = document.querySelector('#hours');
            view_minute = document.querySelector('#minutes');
            view_seconds = document.querySelector('#seconds');
            startTimer(calculationInHours, view_hours, view_minute, view_seconds);
        };
        function getNextQuestion(quiz_question_id) {

            debugger;
            var right_answer = parseInt($('#my_quiz_answer_count').val());
            var quiz_count = parseInt($('#my_quiz_count').val());
            debugger;
            let a = [];
            $(".student-answers:checked").each(function() {
                a.push(this.value);
            });
            if(a.length > 0 && a.length == right_answer) {
                debugger;
                var myJson = JSON.stringify(a);
                var quiz_question_count = quiz_count;
                debugger;
                var formData = new FormData();
                formData.append('quiz_question_id', quiz_question_id);
                formData.append('quiz_question_count', quiz_question_count);
                formData.append('option_id', myJson);
                debugger;
                start_loader();
                $.ajax({
                    /* the route pointing to the post function */
                    type: 'POST',
                    url: Laravel.url +"/student/student_quiz_individual_next_question",
                    dataType: 'json',
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        end_loader();
                        debugger;
                        if(data['quiz_status'] == 'Yes'){
                            $('#recent_quiz_dom').remove();
                            $('#old_button').remove();
                            $('#new_quiz_dom').prepend(data['html']);
                            $('#new_button').append(data['button']);
                        }
                        if(data['quiz_status'] == 'No'){
                            window.location.href =  Laravel.url+'/student';
                        }


                        // $('#attendance_table').remove();
                        // $('#mytable').append(data['html']);
                    },
                    error: function(error) {
                        end_loader();
                        debugger;
                        errorDisplay('Something went wrong !');
                    }
                });
            }else if(a.length > 0 && a.length != right_answer){
                errorDisplay('Please select '+right_answer+' option!')
            }else if (a.length == 0) {
                debugger;
                errorDisplay('Please select '+right_answer+' option!')
            }
            debugger;
            // var formData = new FormData();
            // formData.append('quiz_question_id', quiz_question_id);
            // formData.append('quiz_question_id', quiz_question_id);
            // //start ajax call
            // $.ajax({
            //     /* the route pointing to the post function */
            //     type: 'POST',
            //     url: Laravel.url +"/student/student_quiz_batch_next_question",
            //     dataType: 'json',
            //     data: formData,
            //     processData: false,  // tell jQuery not to process the data
            //     contentType: false,
            //     /* remind that 'data' is the response of the AjaxController */
            //     success: function (data) {
            //         end_loader();
            //         debugger;
            //         window.location.href =  Laravel.url+'/student/quiz_exam';
            //         // $('#attendance_table').remove();
            //         // $('#mytable').append(data['html']);
            //     },
            //     error: function(error) {
            //         end_loader();
            //         debugger;
            //         errorDisplay('Something went wrong !');
            //     }
            // });
        }

    </script>
@endsection



