@extends('layouts.app')
@section('title')
    <title>Student | Zoom Link</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Zoom Links</h4>
                            </div>

                        </div>
                        <div class="quiz-section">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
{{--                                        @foreach($settings as $setting)--}}
                                        @if($zoomBatchLink != null)
                                            <div class="col-md-6">
                                                <a href="{{url($zoomBatchLink->zoomLink->link)}}" target="_blank">
                                                    <div class="p-3 quiz-section-card d-flex mt-4">
                                                        <div class="icon">
                                                            <img src="{{url('images/quiz-card-icon.png')}}" alt="" />
                                                        </div>
                                                        <div class="para">
                                                            <h4>{{$zoomBatchLink->zoomLink->name}}</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
{{--                                        @endforeach--}}

                                    </div>
                                </div>
                                @if(isset($counsellingLink))
                                    <div class="col-md-4">
                                        <div class="video-section p-3 mt-4">
                                                <a href="{{$counsellingLink->link}}" target="_blank">
                                                    <div class="p-3 quiz-section-card d-flex mt-4">
                                                        <div class="icon">
                                                            <img src="{{url('images/quiz-video-icon.png')}}" alt="" />
                                                        </div>
                                                        <div class="para">
                                                            <h4>{{$counsellingLink->name}}</h4>
                                                        </div>
                                                    </div>
                                                </a>
                                        </div>
                                    </div>
                                @endif

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
