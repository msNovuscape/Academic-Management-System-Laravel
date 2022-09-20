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
