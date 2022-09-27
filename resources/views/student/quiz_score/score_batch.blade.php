@extends('layouts.app')
@section('title')
    <title>Student Quiz</title>
@endsection
@section('style')
    {!! Html::style('css/student-detail.css') !!}
@endsection
@section('main-panel')
    <div class="main-panel">
        <section class="score-section" >
            <div class="container-fluid">
                <div class="row gx-3">
                    <div class="col">
                        <div class="d-flex justify-content-between total-score">
                            <div class="obtained-score">
                                <h1>Your Score</h1>
                                <p>{{$setting->batch_quiz_result->score}}/{{$setting->student_quiz_question_batches_list->count()}}</p>
                            </div>
                            <div class="award">
                                <img src="{{url('icons/award.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-between total-score">
                            <div class="obtained-score">
                                <h1>Questions in this exam</h1>
                                <h2>Total Questions</h2>
                                <p>{{$setting->student_quiz_question_batches_list->count()}}</p>
                            </div>
                            <div class="award">
                                <img src="{{url('icons/questions.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="total-score">
                            <div class="obtained-score">
                                <h1>All Examination Report</h1>
                                <p>Your updated complete examination report</p>
                            </div>
                            <table class="table table-borderless report-table">
                                <tr>
                                    <th>Total Questions</th>
                                    <th>:</th>
                                    <th>{{$setting->quiz_batch->quiz->QuizQuestions->count()}}</th>
                                </tr>
                                <tr>
                                    <th>Correct Answers</th>
                                    <th>:</th>
                                    <th>{{$setting->batch_quiz_result->score}}</th>
                                </tr>
                                <tr>
                                    <th>Wrong Answers</th>
                                    <th>:</th>
                                    <th>{{$setting->student_quiz_question_batches_list->count() - $setting->batch_quiz_result->score}}</th>
                                </tr>
                                <tr>
                                    <th>Attempted</th>
                                    <th>:</th>
                                    <th>{{$setting->student_quiz_question_batches_list->count()}}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        @foreach($my_settings as $student_quiz_question)
                            @if ($loop->odd)
                                <div class="test-body">
                                    <div class="question-title">
                                        <h1>Question {{$my_settings->firstItem() + $loop->index}}</h1>
                                    </div>
                                    <div class="question-section">
                                        <h1>{{$student_quiz_question->quiz_question->question}}</h1>
                                        @if($student_quiz_question->quiz_question->question_type == 2)
                                            <img src="{{url($student_quiz_question->quiz_question->quiz_question_image->image)}}" alt="" width="100px;">
                                        @endif
                                        <div class="score-questions-lists">
                                            @foreach($student_quiz_question->quiz_question->quiz_options as $option)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">{{$option->label}} )   {{$option->option}} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="answers-section">
                                        <div class="correct-answer">
                                            <div>
                                                <h1>Correct Answer:</h1>
                                            </div>
                                            <div class="hide-show-ans">
                                                <div>
                                                    <button class="revail-btn" onclick="revailAns({{$my_settings->firstItem() + $loop->index}})">Reveal Answer</button>
                                                </div>
                                                <span id="correct-ans{{$my_settings->firstItem() + $loop->index}}" class="correct-ans">
                                                    @foreach($student_quiz_question->quiz_question->quiz_question_answers as $an)
                                                        {{$an->quiz_option->label}}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="provided-answer">
                                            <div>
                                                <h1>Your Answer:</h1>
                                            </div>
                                            <div class="hide-show-ans">
                                                @if(\App\Models\StudentQuizQuestionBatch::ans_right_or_wrong($student_quiz_question->id) == 'Correct')
                                                    @foreach($student_quiz_question->student_quiz_question_batch_answers as $answer)
                                                        <span class="given-correct-answer">
                                                        {{$answer->quiz_option->label}}
                                                    </span>
                                                    @endforeach
                                                @else
                                                    @foreach($student_quiz_question->student_quiz_question_batch_answers as $answer)
                                                        <span class="given-incorrect-answer">
                                                        {{$answer->quiz_option->label}}
                                                    </span>
                                                    @endforeach
                                                @endif
                                                <div>
                                                    <h1>{{\App\Models\StudentQuizQuestionBatch::ans_right_or_wrong($student_quiz_question->id)}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        @foreach($my_settings as $student_quiz_question)
                            @if ($loop->even)
                                <div class="test-body">
                                    <div class="question-title">
                                        <h1>Question {{$my_settings->firstItem() + $loop->index}}</h1>
                                    </div>
                                    <div class="question-section">
                                        <h1>{{$student_quiz_question->quiz_question->question}}</h1>
                                        @if($student_quiz_question->quiz_question->question_type == 2)
                                            <img src="{{url($student_quiz_question->quiz_question->quiz_question_image->image)}}" alt="" width="100px;">
                                        @endif
                                        <div class="score-questions-lists">
                                            @foreach($student_quiz_question->quiz_question->quiz_options as $option)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">{{$option->label}} )   {{$option->option}} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="answers-section">
                                        <div class="correct-answer">
                                            <div>
                                                <h1>Correct Answer:</h1>
                                            </div>
                                            <div class="hide-show-ans">
                                                <div>
                                                    <button class="revail-btn" onclick="revailAns({{$my_settings->firstItem() + $loop->index}})">Reveal Answer</button>
                                                </div>
                                                <span id="correct-ans{{$my_settings->firstItem() + $loop->index}}" class="correct-ans">
                                                    @foreach($student_quiz_question->quiz_question->quiz_question_answers as $an)
                                                        {{$an->quiz_option->label}}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <div class="provided-answer">
                                            <div>
                                                <h1>Your Answer:</h1>
                                            </div>
                                            <div class="hide-show-ans">
                                                @if(\App\Models\StudentQuizQuestionBatch::ans_right_or_wrong($student_quiz_question->id) == 'Correct')
                                                    @foreach($student_quiz_question->student_quiz_question_batch_answers as $answer)
                                                        <span class="given-correct-answer">
                                                        {{$answer->quiz_option->label}}
                                                    </span>
                                                    @endforeach
                                                @else
                                                    @foreach($student_quiz_question->student_quiz_question_batch_answers as $answer)
                                                        <span class="given-incorrect-answer">
                                                        {{$answer->quiz_option->label}}
                                                    </span>
                                                    @endforeach
                                                @endif
                                                <div>
                                                    <h1>{{\App\Models\StudentQuizQuestionBatch::ans_right_or_wrong($student_quiz_question->id)}}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="pagination-section">
                        {{$my_settings->links()}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        function revailAns(id){
            var ans = document.getElementById('correct-ans'+id);
            // var ans = $('#correct-ans'+id);
            ans.classList.remove("correct-ans")
            setTimeout(function (){
                ans.classList.add("correct-ans")
            }, 2000)
        }
    </script>
@endsection
