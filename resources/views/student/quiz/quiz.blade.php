<div class="container-fluid">
    <div class="row quiz-section">
        <div class="col-md-12 quiz-left">
            <div class="available-exams">
                <h1>Available Exams</h1>
                <p>Attempt all questions.  Click on take exam button to start .</p>
                <div class="row">
                    <div class="col-12 table-responsive sd-table">
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
                                    @if($quiz_batch->student_quiz_batches->count() <= $quiz_batch->no_of_attempt)
                                        @php
                                            $sn = $sn + $loop->iteration;
                                        @endphp
                                        <tr>
                                            <td>{{$sn}}</td>
                                            <td>
                                                {{$quiz_batch->quiz->name}}
                                                @if($quiz_batch->student_quiz_batches_list->count() > 0)
                                                    @if($quiz_batch->student_quiz_batches_list->first()->end_time > date('Y-m-d h:i:s') && $quiz_batch->student_quiz_batches_list->first()->status != '1')
                                                        [ In going Quiz ]
                                                    @endif
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
                                    @endif
                                @endforeach
                                @foreach($setting->admission->quiz_individuals->where('status',1) as $quiz_individual)
                                    @php
                                        $sn = count($setting->admission->batch->quiz_batches->where('status',1)) + $loop->iteration;
                                    @endphp
                                    @if($quiz_individual->student_quiz_individuals->count() <= $quiz_individual->no_of_attempt)
                                        <tr>
                                            <td>{{$sn}}</td>
                                            <td>
                                                {{$quiz_individual->quiz->name}}
                                                @if($quiz_individual->student_quiz_individuals_list->count() > 0)
                                                    @if($quiz_individual->student_quiz_individuals_list->first()->end_time > date('Y-m-d h:i:s') && $quiz_individual->student_quiz_individuals_list->first()->status != '1')
                                                        [ In going Quiz ]
                                                    @endif
                                                @endif

                                            </td>
                                            <td>{{$quiz_individual->quiz->QuizQuestions->count()}}</td>
                                            <td>{{gmdate('H:i:s', $quiz_individual->quiz->time_period *60)}}</td>
                                            <td>
                                                <button onclick="validateClickForIndividualQuiz({{$quiz_individual->id}},{{$setting->admission->id}})" class="take-exam">
                                                    Take Exam
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="completed-exams">
                <h1>Completed Exams</h1>
                <p>Attempt all questions.  Click on take exam button to start .</p>
                <div class="row">
                    <div class="col-12 table-responsive sd-table">
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
                                @if($student_quiz_batch->end_time < date('Y-m-d h:i:s') || $student_quiz_batch->status == '1')
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student_quiz_batch->date}}</td>
                                        <td>{{$student_quiz_batch->quiz_batch->quiz->name}}</td>
                                        <td>{{$student_quiz_batch->quiz_batch->quiz->QuizQuestions->count()}}</td>
                                        <td>{{gmdate('H:i:s', $student_quiz_batch->quiz_batch->quiz->time_period *60)}}</td>

                                        <td>
                                            <a class="dropdown-item unpaid-email" href="{{url('student/quiz_batch/'.$student_quiz_batch->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
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
                                            <a class="dropdown-item unpaid-email" href="{{url('student/quiz_individual/'.$student_quiz_individual->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

