@extends('layouts.app')
@section('title')
    <title>Technical Exam Lists</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Technical Exam Lists</h4>
                                {{-- <p>
                                    You can search the materials by <a href="#" class="card-heading-link">name</a> and can view all available courses materials.
                                </p> --}}
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Technical Exam Lists</li>
                            </ul>
                        </div>
                        {{-- {!! Form::open(['url' => 'technical_exam_location', 'method' => 'GET']) !!}
                            <div class="filter-btnwrap mt-4">
                                <div class="col-md-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by material name or course name" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="filter-group mx-2">
                                                <span>
                                                    <img src="{{url('icons/filter-icon.svg')}}" alt="" class="img-flud">
                                                </span>
                                                <button class="fltr-btn" type="submit">Filter</button>
                                            </div>
                                            <div class="refresh-group mx-2">
                                                <a onclick="getReset('{{Request::segment(1)}}')">
                                                    <img src="{{url('icons/refresh-top-icon.svg')}}" alt="" class="img-flud">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!} --}}

                        <div class="mt-1">
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Technical Exams Table</h3>
                                    </div>
                                    {{-- @if(Auth::user()->customMenuPermission('create_technical_exam_location')) --}}
                                        <div class="add-button">
                                            <a class="nav-link" href="{{url('technical_exam/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Exam</a>
                                        </div>
                                    {{-- @endif --}}
                                </div>
                                <div class="row">
                                   Date: <b>{{  $technical_exam->date}}</b>
                                   Exam Type: <b>{{  $technical_exam->exam_type}}</b>

                                   <b>Details</b>

                                   @foreach ($technical_exam->technical_exam_details as $detail)
                                        Course:{{ $detail->course_id }}
                                   @endforeach
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
        function myConfirm(id){
            debugger;
            $.confirm({
                title: 'Do you sure want to delete?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function(){
                            window.location = Laravel.url+'/course-materials/delete/'+id;
                        }
                    },
                    close: function () {
                    }
                }
            });
        }
    </script>
@endsection
