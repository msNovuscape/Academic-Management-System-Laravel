<div class="container-fluid">
    <div class="row quiz-section">
        <div class="col-md-12 quiz-left">
            <div class="available-exams">
                <h1>Assigned Exams</h1>
                <div class="row">
                    <div class="col-12 table-responsive sd-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Quiz Name</th>
                                <th>No.Ques</th>
                                <th>Duration</th>
                                <th>Assigned By</th>
                                <th>Assigned date</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach($batchQuizzes as $quiz_batch)
                                    <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$quiz_batch->quiz->name}}
                                            </td>
                                            <td>{{$quiz_batch->quiz->QuizQuestions->count()}}</td>
                                            <td>{{gmdate('H:i:s', $quiz_batch->quiz->time_period*60)}}</td>
                                            <td>{{$quiz_batch->user->name}}</td>
                                            <td>{{$quiz_batch->created_at}}</td>
                                        </tr>
                                @endforeach
                                @foreach($individualQuizzes as $quiz_individual)
                                        <tr>
                                            <td>{{$batchQuizzesCount + $loop->iteration}}</td>
                                            <td>
                                                {{$quiz_individual->quiz->name}}
                                            </td>
                                            <td>{{$quiz_individual->quiz->QuizQuestions->count()}}</td>
                                            <td>{{gmdate('H:i:s', $quiz_individual->quiz->time_period *60)}}</td>
                                            <td>{{$quiz_individual->user->name}}</td>
                                            <td>{{$quiz_individual->created_at}}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="completed-exams">
                <h1>Completed Exams</h1>
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
                                <th>No. of Attempted</th>
                                <th>Score</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($batchQuizResults as $batchQuizResult)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$batchQuizResult->student_quiz_batch->created_at}}</td>
                                    <td>{{$batchQuizResult->student_quiz_batch->quiz_batch->quiz->name}}</td>
                                    <td>{{$batchQuizResult->student_quiz_batch->quiz_batch->quiz->QuizQuestions->count()}}</td>
                                    <td>{{gmdate('H:i:s', $batchQuizResult->student_quiz_batch->quiz_batch->quiz->time_period *60)}}</td>
                                    <td>{{$batchQuizResult->total_question_attempted}}</td>
                                    <td>{{$batchQuizResult->score}}</td>
                                </tr>
                            @endforeach
                            @foreach($individualQuizResults as $individualQuizResult)
                                <tr>
                                    <td>{{$batchQuizResultCount + $loop->iteration}}</td>
                                    <td>{{$individualQuizResult->student_quiz_individual->created_at}}</td>
                                    <td>{{$individualQuizResult->student_quiz_individual->quiz_individual->quiz->name}}</td>
                                    <td>{{$individualQuizResult->student_quiz_individual->quiz_individual->quiz->QuizQuestions->count()}}</td>
                                    <td>{{gmdate('H:i:s', $individualQuizResult->student_quiz_individual->quiz_individual->quiz->time_period *60)}}</td>
                                    <td>{{$individualQuizResult->total_question_attempted}}</td>
                                    <td>{{$individualQuizResult->score}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

