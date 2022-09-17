@extends('layouts.app')
@section('title')
    <title>Fiscal Year</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Course Materials</h4>
                                <p class="card-heading-link">
                                Find course documents, Click on document to read.
                                </p>
                            </div>
                            <div class="add-button">
                                <a class="nav-link" href="add-course.html" data-bs-toggle="modal" data-bs-target="#modalAddCourse"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Materials
                                </a>
                            </div>
                        </div>
                        <div class="filter-btnwrap">
                            <div class="col-md-12">
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="text" class="form-control" id="inputText" placeholder="Search" name="fullname" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-section">
                            <div class="row"> 
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <div class="d-flex justify-content-between">
                                                    <a href="">
                                                        <h4>CCNA Chapter One</h4>
                                                    </a>
                                                    <div class="dropdown_try dropdown_icon">
                                                        <button onclick="myFunction()" >
                                                            <i class="fa-solid fa-ellipsis-vertical dropbtn_try"></i>
                                                        </button>
                                                        <div id="myDropdown" class="dropdown-content_try">
                                                            <a href="#home" class="dropdown-item"><i class="fa-solid fa-pen"></i>Edit</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <p>Network ad System Support chapter one includes introduction, feature and advantages...</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="">
                                                <div class="p-3 quiz-section-card d-flex mt-4">
                                                    <div class="icon">
                                                        <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                    </div>
                                                    <div class="para">
                                                        <h4>CCNA Chapter One</h4>
                                                        <p>Network ad System Support chapter one includes introduction, feature and advantages...</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="">
                                                <div class="p-3 quiz-section-card d-flex mt-4">
                                                    <div class="icon">
                                                        <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                    </div>
                                                    <div class="para">
                                                        <h4>CCNA Chapter One</h4>
                                                        <p>Network ad System Support chapter one includes introduction, feature and advantages...</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="">
                                                <div class="p-3 quiz-section-card d-flex mt-4">
                                                    <div class="icon">
                                                        <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                    </div>
                                                    <div class="para">
                                                        <h4>CCNA Chapter One</h4>
                                                        <p>Network ad System Support chapter one includes introduction, feature and advantages...</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-section p-3 mt-4">
                                        <h4>Video Materials</h4>
                                        <p class="card-heading-link">Find your video materials</p>
                                        <a href="">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <h4>CCNA Chapter One</h4>
                                                    <p>This video includes introduction, feature and advantages of Network &..</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <h4>CCNA Chapter One</h4>
                                                    <p>This video includes introduction, feature and advantages of Network &..</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <h4>CCNA Chapter One</h4>
                                                    <p>This video includes introduction, feature and advantages of Network &..</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <h4>CCNA Chapter One</h4>
                                                    <p>This video includes introduction, feature and advantages of Network &..</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="p-3 quiz-section-card d-flex mt-4">
                                                <div class="icon">
                                                    <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                </div>
                                                <div class="para">
                                                    <h4>CCNA Chapter One</h4>
                                                    <p>This video includes introduction, feature and advantages of Network &..</p>
                                                </div>
                                            </div>
                                        </a>
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
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn_try')) {
            var dropdowns = document.getElementsByClassName("dropdown-content_try");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
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
@endsection