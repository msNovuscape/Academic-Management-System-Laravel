<option value="" selected disabled class="option-quiz">Please Select the Batch</option>

@foreach($quizzes as $quiz)
    <option value="{{$quiz->id}}" @if(old('quiz_id') == $quiz->id) selected @endif class="option-quiz">
        {{$quiz->name}}
    </option>
@endforeach
