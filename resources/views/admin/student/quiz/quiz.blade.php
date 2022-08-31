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
                            <th>Title</th>
                            <th>No.Ques</th>
                            <th>Duration</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        <tr>
                            <td>1</td>
                            <td>CCNA Chapter 4</td>
                            <td>253</td>
                            <td>5 Hrs</td>
                            <td>
                                <a href="{{url('/tests')}}" class="take-exam text-decoration-none">
                                    Take Exam
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CCNA Chapter 4</td>
                            <td>253</td>
                            <td>5 Hrs</td>
                            <td>
                                <a href="{{url('/tests')}}" class="take-exam text-decoration-none">
                                    Take Exam
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CCNA Chapter 4</td>
                            <td>253</td>
                            <td>5 Hrs</td>
                            <td>
                                <a href="{{url('/tests')}}" class="take-exam text-decoration-none">
                                    Take Exam
                                </a>
                            </td>
                        </tr>
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
                        <th>Title</th>
                        <th>No.Ques</th>
                        <th>Duration</th>
                        <th>Marks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>CCNA Chapter 4</td>
                        <td>253</td>
                        <td>5 Hrs</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>CCNA Chapter 4</td>
                        <td>253</td>
                        <td>5 Hrs</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>CCNA Chapter 4</td>
                        <td>253</td>
                        <td>5 Hrs</td>
                        <td>200</td>
                    </tr>
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
