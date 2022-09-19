@extends('layouts.app')
@section('title')
    <title>Student Test</title>
@endsection
@section('style')
    {!! Html::style('css/student-detail.css') !!}
@endsection
@section('main-panel')
    <div class="main-panel">
        <section class='tests-section'>
            <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="test-title">
                            <h1>Network & System Supports CCNA May Questions</h1>
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
                <div id="new_quiz_dom">
                    <div class="row" id="recent_quiz_dom">
                        <div class="col-md-8">
                            <div class="test-body">
                                <div class="question-title">
                                    <h1>Question 1</h1>
                                </div>
                                <div class="question-section">
                                    <div class="questions mb-2">
                                        <img src="{{url('/images/question.png')}}" class="img-fluid">
                                    </div>
                                    <h1>Refer to the exhibit. R1 has just received a packet from host A that is destined to host B. Which
                                        route in the routing table is used by R1 to reach host B?</h1>
                                    <div class="questions-lists">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">B )   10.10.13.0/25 [108/0] via 10.10.10.10 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">D )   10.10.13.0/25 [110/2] via 10.10.10.2</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                        <h1>1</h1>
                                        <h1>: </h1>
                                        <h1>20</h1>
                                        <h1>: </h1>
                                        <h1>00</h1>
                                    </div>
                                </div>

                                <div class="record-bottom">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Total Time</td>
                                            <td>:</td>
                                            <td>1:20:00</td>
                                        </tr>
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
                </div>
                <button class="next-button mt-4" type="submit">Next <i class="fa-solid fa-angles-right"></i></button>
            </div>
        </section>
    </div>

@endsection



