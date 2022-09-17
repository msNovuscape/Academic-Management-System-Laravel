<div id="suppotingblock{{$id}}" class="row">
    {{--     Start Section for image qestion --}}
    <div class="col-md-12 d-flex" id="question-block{{$id}}">
        <div class="col-md-12">
            <div class="d-flex mt-4">
                <div class="col-md-1">
                    <label for="Image" class="form-label">Question</label>
                </div>
                <div class="col-md-11">
                    <div class="input-group">
                        <input type="text" name="question{{$id}}" class="form-control"  placeholder="Write your question here">
                    </div>
                    <div class="d-flex">
                        <div class="col-md-6">
                            <input class="form-control mt-4" name="image{{$id}}" type="file" id="formFile{{$id}}" onchange="preview({{$id}})" required>
                        </div>
                        <div class="quiz-answer-image col-md-6 mt-4 mx-4">
                            <img id="frame{{$id}}"  class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--     end Section for image qestion --}}

    {{--     Start Section for no. of option and status --}}
    <div class="col-md-6 d-flex mt-4">
        <div class="col-md-3">
            <label for="">No. of options</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <select name="no_of_option[]" class="form-control" id="no_of_option{{$id}}" onchange="getOption({{$id}})" required>
                    @foreach(config('custom.no_of_options') as $index1 => $value1)
                        <option value="{{$index1}}" @if(old('no_of_option') == $index1) selected @endif>{{$value1}}</option>
                    @endforeach
                </select>
                <span>
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 d-flex mt-4">
        <div class="col-md-3">
            <label>Status</label>
        </div>
        <div class="col-md-9">
            <div class="input-group">
                <select name="status[]" class="form-control" required="">
                    @foreach(config('custom.status') as $index3 => $value3)
                        <option value="{{$index3}}" @if(old('status') == $index3) selected @endif>{{$value3}}</option>
                    @endforeach
                </select>
                <span>
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </div>
        </div>
    </div>
    {{--     end Section for no. of option and status --}}
    {{--     end Section for option --}}
    {{--     Start Section for option --}}
    <div class="col-md-6 mt-4">
        <div class="form-check my-2 p-0">
            <input class="form-check-input mx-auto right-answer-a" name="right_answer{{$id}}[]" type="checkbox" value="A" id="rightanswerA{{$id}}">
            <label class="form-check-label mx-2" for="flexCheckDefault">
                Choice <input class="choice-input" name="label{{$id}}[]" type="text" value="A" required readonly>
            </label>
            <input type="text" name="option{{$id}}[]" class="form-control mt-2" placeholder="Option A" required>
        </div>
    </div>
    <div class="col-md-6 mt-4">
        <div class="form-check my-2 p-0">
            <input class="form-check-input mx-auto right-answer-b" name="right_answer{{$id}}[]" type="checkbox" value="B" id="rightanswerB{{$id}}">
            <label class="form-check-label mx-2" for="flexCheckChecked">
                Choice <input class="choice-input" name="label{{$id}}[]" type="text" value="B" required readonly>
            </label>
            <input type="text" name="option{{$id}}[]" class="form-control mt-2" placeholder="Option B" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-check my-2 p-0">
            <input class="form-check-input mx-auto right-answer-c" name="right_answer{{$id}}[]" type="checkbox" value="C" id="rightanswerC{{$id}}">
            <label class="form-check-label mx-2" for="flexCheckDefault">
                Choice <input class="choice-input" name="label{{$id}}[]" type="text" value="C" required readonly>
            </label>
            <input type="text" name="option{{$id}}[]" class="form-control mt-2" placeholder="Option C" required>
        </div>
    </div>
    <div class="col-md-6" id="dom-option{{$id}}">
        <div class="form-check my-2 p-0">
            <input class="form-check-input mx-auto right-answer-d" name="right_answer{{$id}}[]" type="checkbox" value="D" id="rightanswerD{{$id}}">
            <label class="form-check-label mx-2" for="flexCheckChecked">
                Choice <input class="choice-input" name="label{{$id}}[]" type="text" value="D" required readonly>
            </label>
            <input type="text" name="option{{$id}}[]" class="form-control mt-2" placeholder="Option D" required>
        </div>
    </div>
    {{--     End Section for option --}}

    <div class="col-md-12 mt-4">
        <div class="">
            <textarea name="answer_explanation{{$id}}" class="md-textarea form-control" rows="3" placeholder="Explain your answer here"></textarea>
        </div>
    </div>
</div>
