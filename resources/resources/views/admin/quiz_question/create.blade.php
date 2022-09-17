@extends('layouts.app')
@section('title')
    <title>Quiz</title>
@endsection
@section('style')
    <style>
        .choice-input{
            width:25px;
        }
    </style>
@endsection
@section('main-panel')
    <div class="main-panel w-100">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 stretch-card">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header p-4">
                                    <h3>Add Quiz Question</h3>
                                    <div class="tbl-buttons">
                                        <ul class="mb-0 px-2">
                                            <li>
                                                <a href="{{url('quiz')}}">
                                                    <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row p-4">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                {!! Form::open(['url' => 'quiz/question_create/'.$setting->id,'method'=>'Post','files' => true]) !!}
                                                    {{--    start section for quiz questions--}}
                                                    <div class="row quiz-add mt-4 pt-4 add-more-block" id="add-more-block1">
                                                        <div class="col-md-12 d-flex justify-content-end">
                                                            <a onclick="getCancel(1)"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"></a>
                                                        </div>
                                                        <div class="col-md-6 d-flex" id="mainblock1">
                                                            <div class="col-md-3">
                                                                <label for="">Question Type</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select name="question_type[]" id="question_type1" class="form-control" onchange="getQuestionDom(1)" required>
                                                                        @foreach(config('custom.question_types') as $index => $value)
                                                                            <option value="{{$index}}" @if(old('question_type') == $index) selected @endif>{{$value}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="number" name="count[]" value="1" style="display: none">
                                                                    <span>
                                                                        <i class="fa-solid fa-caret-down"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="suppotingblock1" class="row">
                                                            {{--     Start Section for text qestion --}}
                                                            <div class="col-md-12 d-flex" id="question-block1">
                                                                <div class="col-md-12" >
                                                                    <div class="d-flex mt-4">
                                                                        <div class="col-md-1">
                                                                            <label for="">Question</label>
                                                                        </div>
                                                                        <div class="col-md-11">
                                                                            <div class="input-group">
                                                                                <input type="text" name="question1" class="form-control"  placeholder="Write your question here" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{--     end Section for text qestion --}}

                                                            {{--     Start Section for no. of option and status --}}
                                                            <div class="col-md-6 d-flex mt-4">
                                                                <div class="col-md-3">
                                                                    <label for="">No. of options</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <select name="no_of_option[]" class="form-control" id="no_of_option1" onchange="getOption(1)">
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
                                                                    <input class="form-check-input mx-auto right-answer-a" name="right_answer1[]" type="checkbox" value="A" id="rightanswerA1">
                                                                    <label class="form-check-label mx-2" for="flexCheckDefault">
                                                                        Choice <input class="choice-input" name="label1[]" type="text" value="A" required readonly>
                                                                    </label>
                                                                    <input type="text" name="option1[]" class="form-control mt-2" placeholder="Option A" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-4">
                                                                <div class="form-check my-2 p-0">
                                                                    <input class="form-check-input mx-auto right-answer-b" name="right_answer1[]" type="checkbox" value="B" id="rightanswerB1">
                                                                    <label class="form-check-label mx-2" for="flexCheckChecked">
                                                                        Choice <input class="choice-input" name="label1[]" type="text" value="B" required readonly>
                                                                    </label>
                                                                    <input type="text" name="option1[]" class="form-control mt-2" placeholder="Option B" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check my-2 p-0">
                                                                    <input class="form-check-input mx-auto right-answer-c" name="right_answer1[]" type="checkbox" value="C" id="rightanswerC1">
                                                                    <label class="form-check-label mx-2" for="flexCheckDefault">
                                                                        Choice <input class="choice-input" name="label1[]" type="text" value="C" required readonly>
                                                                    </label>
                                                                    <input type="text" name="option1[]" class="form-control mt-2" placeholder="Option C" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="dom-option1">
                                                                <div class="form-check my-2 p-0">
                                                                    <input class="form-check-input mx-auto right-answer-d" name="right_answer1[]" type="checkbox" value="D" id="rightanswerD1">
                                                                    <label class="form-check-label mx-2" for="flexCheckChecked">
                                                                        Choice <input class="choice-input" name="label1[]" type="text" value="D" required readonly>
                                                                    </label>
                                                                    <input type="text" name="option1[]" class="form-control mt-2" placeholder="Option D" required>
                                                                </div>
                                                            </div>
                                                            {{--     End Section for option --}}
                                                            <div class="col-md-12 mt-4">
                                                                <div class="">
                                                                    <textarea name="answer_explanation1" class="md-textarea form-control" rows="3" placeholder="Explain your answer here"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    {{--    end section for quiz questions--}}
                                                    <div class="row quiz-add mt-4">
                                                        <div class="col-md-12 d-flex justify-content-end">
                                                            <button class="add-button" type="button" onclick="addMore(this)">Add more</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="button-section d-flex justify-content-end mt-4">
                                                            <a href="{{url('quiz')}}">
                                                                <button type="button">
                                                                    Skip
                                                                    <i class="fa-solid fa-angles-right"></i>
                                                                </button>
                                                            </a>
                                                            <button type="submit">
                                                                Save & Continue
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.quiz_question.script')



