@extends('layouts.app')
@section('title')
    <title>Technical Exam</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Student Profile</h4>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Technical Exam</li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4 attendence-nav-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="student-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Student Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="finance-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="quiz-tab" data-toggle="tab" href="#" role="tab" aria-controls="messages" aria-selected="false">Quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="counselling-tab" data-toggle="tab" href="" role="tab" aria-controls="settings" aria-selected="false">Career Counselling</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="tech-tab" data-toggle="tab" role="tab" href="{{url('technical_exam')}}" aria-controls="settings" aria-selected="false">Technical Exam</a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Technical Exam</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body technical-modal-body">
                            <div class="mb-3">
                                <label for="topic">Topic</label>
                                <input type="text" class="form-control" placeholder="This is test placeholder"/>
                            </div>
                            <div class="technical-form">
                                <h5>Start: </h5>
                                <input type="text" class="form-control" placeholder="date"/>
                                <input type="text" class="form-control" placeholder="time"/>
                            </div>
                            <div class="technical-form">
                                <h5>Duration: </h5>
                                <input type="text" class="form-control" placeholder="1 hours"/>
                                <input type="text" class="form-control" placeholder="10 minutes"/>
                            </div>
                        </div>
                        {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    
</script>
@endsection
