@extends('layouts.app')
@section('title')
    <title>Fiscal Year</title>
@endsection
@section('main-panel')
<div class="main-panel w-100">
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
                                            <a href="{{url('batches')}}">
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
                                        {!! Form::open(['url' => 'batches','method'=>'Post']) !!}
                                        <div class="row quiz-add">
                                            <!-- <div class="col-md-9">
                                                <div class="col-md-12">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row align-items-baseline d-flex">
                                                                <div class="col-md-3">
                                                                    <label>Question</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" placeholder="Please add you question here">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="Image" class="form-label">Upload Image</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="file" id="formFile" onchange="preview()">
                                                                    <div class="quiz-answer-image mt-4">
                                                                    <img id="frame" src="" class="img-fluid" />
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group batch-form">
                                                        <div class="col-md-12">
                                                            <div class="row align-items-baseline d-flex">
                                                                <div class="col-md-3">
                                                                    <label>Choices for answers</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mt-4">
                                                                            <label>Choice A</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="Write choice A">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mt-4">
                                                                            <label>Choice B</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="Write choice B">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mt-4">
                                                                            <label>Choice C</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="Write choice C">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mt-4">
                                                                            <label>Choice D</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="Write choice D">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mt-4">
                                                                            <label>Choice E</label>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="Write choice E">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mx-4 p-4">
                                                <div class="form-check my-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label mx-4" for="flexCheckDefault">
                                                        Choice A
                                                    </label>
                                                </div>
                                                <div class="form-check my-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                    <label class="form-check-label mx-4" for="flexCheckChecked">
                                                        Choice B
                                                    </label>
                                                </div>
                                                <div class="form-check my-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label mx-4" for="flexCheckDefault">
                                                        Choice C
                                                    </label>
                                                </div>
                                                <div class="form-check my-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                    <label class="form-check-label mx-4" for="flexCheckChecked">
                                                        Choice D
                                                    </label>
                                                </div>
                                                <div class="form-check my-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                                    <label class="form-check-label mx-4" for="flexCheckChecked">
                                                        Choice E
                                                    </label>
                                                </div>
                                            </div> -->
                                            <div class="col-md-6 d-flex mt-2">
                                                <div class="col-md-3">
                                                    <label>Select Course</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <span>
                                                            <i class="fa-solid fa-book-open"></i>
                                                        </span>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected="">All courses</option>
                                                            <option value="1">Network and System Support</option>
                                                            <option value="2">Advance Network Engineering</option>
                                                            <option value="3">Web Development(Python)</option>
                                                            <option value="1">Digital Marketing</option>
                                                            <option value="2">Career Counselling</option>
                                                            <option value="3">Web Design</option>
                                                        </select>
                                                        <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex mt-2">
                                                <div class="col-md-3">
                                                    <label>Quiz name</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="inputText" placeholder="Write quiz name here" name="fullname" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex mt-4">
                                                <div class="col-md-3">
                                                    <label>Time</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input name="start_time" value="14:00:00" type="time" class="form-control" id="inlineFormInputGroup" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex mt-4">
                                                <div class="col-md-3">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <select name="status" class="form-control">
                                                            <option value="" selected="" disabled="">Please Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Deactive</option>
                                                        </select>
                                                        <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 date-quiz d-flex mt-4">
                                                <div class="col-md-3">
                                                    <label for="">Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input name="start_date" type="text" class="form-control flatpickr-input" id="from_date" placeholder="Please select course start date" required="" onchange="getMinDate()" readonly="readonly">
                                                        <div class="input-group-prepend d-flex">
                                                            <div class="input-group-text p-2">
                                                                <img src="http://127.0.0.1:8000/images/calender-icon.png" alt="calender-icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row quiz-add mt-4 pt-4 add-more-block">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <a href=""><img src="http://127.0.0.1:8000/images/cancel-icon.png" alt="cancel-icon"></a>
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <div class="col-md-3">
                                                    <label for="">Question Type</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <select name="select" id="select" class="form-control" onchange="showDiv('text-question-block', 'upload-image-block', this)">
                                                            <option value="0">Please select question type</option>
                                                            <option value="1">Text</option>
                                                            <option value="2">Image</option>
                                                        </select>
                                                        <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-12"  id="upload-image-block">
                                                    <div class="d-flex mt-4">
                                                        <div class="col-md-1">
                                                            <label for="Image" class="form-label">Upload Image</label>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="inputText" placeholder="Explanation" name="fullname" value="">
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="col-md-6">
                                                                    <input class="form-control mt-4" type="file" id="formFile" onchange="preview()">
                                                                </div>
                                                                <div class="quiz-answer-image col-md-6 mt-4 mx-4">
                                                                    <img id="frame" src="" class="img-fluid" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex">
                                                <div class="col-md-12" id="text-question-block">
                                                    <div class="d-flex mt-4">
                                                        <div class="col-md-1">
                                                            <label for="">Question</label>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="inputText" placeholder="Write your question here" name="fullname" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-6 d-flex mt-4">
                                                <div class="col-md-3">
                                                    <label for="">No. of options</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <select name="select-option" class="form-control" id="select-option" onchange="showOption('fifth-option', this)">
                                                            <option value="0">Please select no. of options for the question</option>
                                                            <option value="1">4</option>
                                                            <option value="2">5</option>
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
                                                        <select name="status" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Please Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Deactive</option>
                                                        </select>
                                                        <span>
                                                            <i class="fa-solid fa-caret-down"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-4">
                                                    <div class="form-check my-2 p-0">
                                                        <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label mx-2" for="flexCheckDefault">
                                                            Choice A
                                                        </label>
                                                        <input type="text" class="form-control mt-2" placeholder="Write choice A">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4">
                                                    <div class="form-check my-2 p-0">
                                                        <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckChecked">
                                                        <label class="form-check-label mx-2" for="flexCheckChecked">
                                                            Choice B
                                                        </label>
                                                        <input type="text" class="form-control mt-2" placeholder="Write choice B">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check my-2 p-0">
                                                        <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckDefault">
                                                        <label class="form-check-label mx-2" for="flexCheckDefault">
                                                            Choice C
                                                        </label>
                                                        <input type="text" class="form-control mt-2" placeholder="Write choice C">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check my-2 p-0">
                                                        <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckChecked">
                                                        <label class="form-check-label mx-2" for="flexCheckChecked">
                                                            Choice D
                                                        </label>
                                                        <input type="text" class="form-control mt-2" placeholder="Write choice D">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check my-2 p-0" id="fifth-option">
                                                        <input class="form-check-input mx-auto" type="checkbox" value="" id="flexCheckChecked">
                                                        <label class="form-check-label mx-2" for="flexCheckChecked">
                                                            Choice E
                                                        </label>
                                                        <input type="text" class="form-control mt-2" placeholder="Write choice E">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div class="">
                                                        <textarea class="md-textarea form-control" rows="3" placeholder="Explain your answer here"></textarea>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row quiz-add mt-4">
                                            <div class="col-md-12 d-flex justify-content-end">
                                                <button class="add-button">Add more</button>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="button-section d-flex justify-content-end mt-4">
                                                <a href="{{url('batches')}}">
                                                    <button type="button">
                                                        Skip
                                                        <i class="fa-solid fa-angles-right"></i>
                                                    </button>
                                                </a>
                                                <button>
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
@section('script')
<script>
    $("#from_date").flatpickr({
        dateFormat: "Y-m-d"
    });
    function getMinDate(){
        var min_date = $('#from_date').val();
        if(min_date != ''){
            $('#to_date').flatpickr({
                minDate: min_date,
                dateFormat: 'Y-m-d',
            });
        }
    }
</script>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
</script>
<script>
    $(document).ready(function(){
    $(".add-button").click(function(){
		  $(".add-more-block").eq(0).clone().insertAfter(".add-more-block:last");
    });
});
</script>
<script>
    function showDiv(divId, imageId, element)
        {
            document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
            document.getElementById(imageId).style.display = element.value == 2 ? 'block' : 'none';
        }
</script>
<script>
    function showOption(optionId, element)
        {
            document.getElementById(optionId).style.display = element.value == 2 ? 'block' : 'none';
        }
</script>
@endsection


