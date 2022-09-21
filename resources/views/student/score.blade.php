@extends('layouts.app')
@section('title')
    <title>Student Test</title>
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
                                <p>8/69</p>
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
                                <p>69</p>
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
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="test-body">
                                <div class="question-title">
                                    <h1>Question 1</h1>
                                </div>
                                <div class="question-section">
                                    <h1>Refer to the exhibit. R1 has just received a packet from host A that is destined to host B. Which
                                        route?</h1>
                                    <div class="score-questions-lists">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                        </div>
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
                                <div class="answers-section">
                                    <div class="correct-answer">
                                        <div>
                                            <h1>Correct Answer:</h1>
                                        </div>
                                        <div>
                                            <button class="revail-btn" onclick="revailAns(1)">Reveal Answer</button>
                                        </div>
                                        <span id="correct-ans1" class="correct-ans">
                                    A
                                </span>
                                    </div>
                                    <div class="provided-answer">
                                        <div>
                                            <h1>Your Answer:</h1>
                                        </div>
                                        <span class="given-correct-answer">B</span>
                                        <div>
                                            <h1>Incorrect</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="test-body">
                                <div class="question-title">
                                    <h1>Question 3</h1>
                                </div>
                                <div class="question-section">
                                    <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.?</h1>
                                    <div class="score-questions-lists">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                        </div>
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
                                <div class="answers-section">
                                    <div class="correct-answer">
                                        <div>
                                            <h1>Correct Answer:</h1>
                                        </div>
                                        <div>
                                            <button class="revail-btn" onclick="revailAns(3)">Reveal Answer</button>
                                        </div>
                                        <span id="correct-ans3" class="correct-ans">
                                    C
                                </span>
                                    </div>
                                    <div class="provided-answer">
                                        <div>
                                            <h1>Your Answer:</h1>
                                        </div>
                                        <span class="given-correct-answer">B</span>
                                        <div>
                                            <h1>Incorrect</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="test-body">
                                <div class="question-title">
                                    <h1>Question 5</h1>
                                </div>
                                <div class="question-section">
                                    <div class="questions mb-2">
                                        <img src="{{url('/images/questions.jpg')}}" class="img-fluid">
                                    </div>
                                    <h1>Refer to the exhibit. R1 has just received a packet from host A that is destined to host B. Which
                                        route in the routing table is used by R1 to reach host B?</h1>
                                    <div class="score-questions-lists">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                        </div>
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
                                <div class="answers-section">
                                    <div class="correct-answer">
                                        <div>
                                            <h1>Correct Answer:</h1>
                                        </div>
                                        <div>
                                            <button class="revail-btn" onclick="revailAns(5)">Reveal Answer</button>
                                        </div>
                                        <span id="correct-ans5" class="correct-ans">
                                    D
                                </span>
                                    </div>
                                    <div class="provided-answer">
                                        <div>
                                            <h1>Your Answer:</h1>
                                        </div>
                                        <span class="given-correct-answer">B</span>
                                        <div>
                                            <h1>Incorrect</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="test-body">
                            <div class="question-title">
                                <h1>Question 2</h1>
                            </div>
                            <div class="question-section">
                                <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.?</h1>
                                <div class="score-questions-lists">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                    </div>
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
                            <div class="answers-section">
                                <div class="correct-answer">
                                    <div>
                                        <h1>Correct Answer:</h1>
                                    </div>
                                    <div>
                                        <button class="revail-btn" onclick="revailAns(2)">Reveal Answer</button>
                                    </div>
                                    <span id="correct-ans2" class="correct-ans">
                                    B
                                </span>
                                </div>
                                <div class="provided-answer">
                                    <div>
                                        <h1>Your Answer:</h1>
                                    </div>
                                    <span class="given-correct-answer">B</span>
                                    <div>
                                        <h1>Incorrect</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="test-body">
                            <div class="question-title">
                                <h1>Question 4</h1>
                            </div>
                            <div class="question-section">
                                <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.?</h1>
                                <div class="score-questions-lists">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                    </div>
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
                            <div class="answers-section">
                                <div class="correct-answer">
                                    <div>
                                        <h1>Correct Answer:</h1>
                                    </div>
                                    <div>
                                        <button class="revail-btn" onclick="revailAns(4)">Reveal Answer</button>
                                    </div>
                                    <span id="correct-ans4" class="correct-ans">
                                    C
                                </span>
                                </div>
                                <div class="provided-answer">
                                    <div>
                                        <h1>Your Answer:</h1>
                                    </div>
                                    <span class="given-correct-answer">B</span>
                                    <div>
                                        <h1>Incorrect</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="test-body">
                            <div class="question-title">
                                <h1>Question 6</h1>
                            </div>
                            <div class="question-section">
                                <h1>Refer to the exhibit. R1 has just received a packet from host A that is destined to host B. Which
                                    route in the routing table is used by R1 to reach host B?</h1>
                                <div class="score-questions-lists">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">A )   10.10.13.0/25 [1/0] via 10.10.10.2 </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">C )   10.10.13.0/25 [110/2] via 10.10.10.6 </label>
                                    </div>
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
                            <div class="answers-section">
                                <div class="correct-answer">
                                    <div>
                                        <h1>Correct Answer:</h1>
                                    </div>
                                    <div>
                                        <button class="revail-btn" onclick="revailAns(6)">Reveal Answer</button>
                                    </div>
                                    <span id="correct-ans6" class="correct-ans">
                                    E
                                </span>
                                </div>
                                <div class="provided-answer">
                                    <div>
                                        <h1>Your Answer:</h1>
                                    </div>
                                    <span class="given-correct-answer">B</span>
                                    <div>
                                        <h1>Incorrect</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
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
