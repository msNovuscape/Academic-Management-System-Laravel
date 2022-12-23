<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header">
                    <h3>Quiz Info [Batch]</h3>
                </div>
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Quiz Name</th>
                                            <th>Assigned Date</th>
                                            <th>Exam Date</th>
                                            <th>Question Attempted</th>
                                            <th>Result</th>
                                        </tr>
                                        </thead>
                                        <tbody id="student_list">
                                        @foreach($quizBatches as $quizBatch)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$quizBatch->quiz->name}}</td>
                                                <td>{{$quizBatch->created_at->format('Y-m-d')}}</td>
                                                <td>
                                                    {{$quizBatch->list_student_quiz_batches->where('admission_id', $setting->id)->count() > 0 ? $quizBatch->list_student_quiz_batches->where('admission_id', $setting->id)->first()->created_at: '-'}}
                                                </td>
                                                <td>
                                                    {{$quizBatch->batchQuizResult ? $quizBatch->batchQuizResult->total_question_attempted : '-'}}
                                                </td>
                                                <td>
                                                    {{$quizBatch->batchQuizResult ? $quizBatch->batchQuizResult->score : '-'}}
                                                </td>
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
        </div>
    </div>
</div>
