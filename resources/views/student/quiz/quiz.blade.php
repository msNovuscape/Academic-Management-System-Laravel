<div class="container-fluid">
    <div class="row quiz-section">
        <div class="col-md-8 quiz-left">
            <div class="available-exams">
                <h1>Available Exams</h1>
                <p>Attempt all questions.  Click on take exam button to start .</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Quiz Name</th>
                            <th>No.Ques</th>
                            <th>Duration</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @php
                            $sn = 0;
                        @endphp
                        @foreach($setting->admission->batch->quiz_batches->where('status',1) as $quiz_batch)
                            <tr>
                                <td>{{$sn + $loop->iteration}}</td>
                                <td>
                                    {{$quiz_batch->quiz->name}}
                                    @if($quiz_batch->student_quiz_batches->where('admission_id',Auth::user()->admission->id)->where('status','!=','1')->count() > 0)
                                        [ In going Quiz ]
                                    @endif
                                </td>
                                <td>{{$quiz_batch->quiz->QuizQuestions->count()}}</td>
                                <td>{{gmdate('H:i:s', $quiz_batch->quiz->time_period*60)}}</td>
                                <td>
                                    <button onclick="validateClickForBatchQuiz({{$quiz_batch->id}},{{$setting->admission->id}})" class="take-exam">
                                        Take Exam
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($setting->admission->quiz_individuals->where('status',1) as $quiz_individual)
                            <tr>
                                <td>{{$sn + $loop->iteration}}</td>
                                <td>{{$quiz_individual->quiz->name}}</td>
                                <td>{{$quiz_individual->quiz->QuizQuestions->count()}}</td>
                                <td>{{gmdate('H:i:s', $quiz_individual->quiz->time_period *60)}}</td>
                                <td>
                                    <button onclick="validateClickForIndividualQuiz({{$quiz_individual->id}},{{$setting->admission->id}})" class="take-exam">
                                        Take Exam
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="completed-exams">
                <h1>Completed Exams</h1>
                <p>Attempt all questions.  Click on take exam button to start .</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>No.Ques</th>
                            <th>Duration</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($setting->admission->student_quiz_batches as $student_quiz_batch)
                        @if($student_quiz_batch->end_time < date('Y-m-d h:i:s'))
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student_quiz_batch->date}}</td>
                                <td>{{$student_quiz_batch->quiz_batch->quiz->name}}</td>
                                <td>{{$student_quiz_batch->quiz_batch->quiz->QuizQuestions->count()}}</td>
                                <td>{{gmdate('H:i:s', $student_quiz_batch->quiz_batch->quiz->time_period *60)}}</td>
{{--                                <td>{{\App\Models\Student::getMarks($student_quiz_batch)}}</td>--}}
                                <td>
                                    <a class="dropdown-item unpaid-email" href="{{url('')}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @foreach($setting->admission->student_quiz_individuals as $student_quiz_individual)
                        @if($student_quiz_individual->end_time < date('Y-m-d h:i:s') || $student_quiz_individual->status == '1')
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student_quiz_individual->date}}</td>
                                <td>{{$student_quiz_individual->quiz_individual->quiz->name}}</td>
                                <td>{{$student_quiz_individual->quiz_individual->quiz->QuizQuestions->count()}}</td>
                                <td>{{gmdate('H:i:s', $student_quiz_individual->quiz_individual->quiz->time_period *60)}}</td>
                                {{--                                <td>{{\App\Models\Student::getMarks($student_quiz_batch)}}</td>--}}
                                <td>
                                    <a class="dropdown-item unpaid-email" href="{{url('student/quiz_individual/'.$student_quiz_individual->id)}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 quiz-right">
            <div class="d-flex justify-content-between quiz-detail">
                <div class="quiz-score mt-2">
                    <h1>Your Score</h1>
                    <p>600 / 1200</p>
                </div>
                <div class="quiz-award">
                    <img src="{{url('icons/award.svg')}}">
                </div>
            </div>
            <div class="d-flex mt-4 justify-content-between quiz-questions">
                <div class="quiz- mt-2">
                    <h1>Questions</h1>
                    <p>600 / 1200</p>
                </div>
                <div class="question-icon">
                    <img src="{{url('icons/questions.svg')}}">
                </div>
            </div>
            <div class="examination-report mt-4">
                <h1>All Examination Report</h1>
                <p>Your updated complete examination report</p>
                    <div class="examination-middle">
                        <table class="table table-borderless">
                            <tr>
                                <th>Total Questions</th>
                                <th>:</th>
                                <th>1200</th>
                            </tr>
                            <tr>
                                <th>Correct Answers</th>
                                <th>:</th>
                                <th>60</th>
                            </tr>
                            <tr>
                                <th>Wrong Answers</th>
                                <th>:</th>
                                <th>400</th>
                            </tr>
                            <tr>
                                <th>Attempted</th>
                                <th>:</th>
                                <th>1000</th>
                            </tr>
                            <tr>
                                <th>Unattempted</th>
                                <th>:</th>
                                <th>200</th>
                            </tr>
                        </table>
                    </div>
                <div class="remarks mt-2">
                    <h2>Remarks</h2>
                    <p>We advise you to enhance your effort for better results. Good Luck!</p>
                </div>
            </div>
        </div>
    </div>
</div>

