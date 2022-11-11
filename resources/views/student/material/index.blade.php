@extends('layouts.app')
@section('title')
    <title>Student|Material</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Materials</h4>
                                <p class="card-heading-link">
                                    Find course documents, Click on document to read.
                                </p>
                            </div>

                        </div>
                        <form id="search">
                            <div class="filter-btnwrap student-material-search mt-4">
                                <div class="col-md-10">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by Course doc or video name" name="name" onchange="filterList()"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="quiz-section">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($settings->where('type',1) as $setting)
                                            <div class="col-md-6">
                                                <a href="{{url($setting->link)}}" target="_blank">
                                                    <div class="p-3 quiz-section-card d-flex mt-4">
                                                        <div class="icon">
                                                            <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                        </div>
                                                        <div class="para">
                                                            <h4>{{$setting->name}}</h4>
                                                            <p>{{$setting->description}}...</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-section p-3 mt-4">
                                        <h4>Video Materials</h4>
                                        <p class="card-heading-link">Find your video materials</p>
                                        @foreach($settings->where('type',2) as $setting1)
                                            <a href="{{$setting1->link}}">
                                                <div class="p-3 quiz-section-card d-flex mt-4">
                                                    <div class="icon">
                                                        <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                    </div>
                                                    <div class="para">
                                                        <h4>{{$setting1->name}}</h4>
                                                        <p>{{$setting1->description}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
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
