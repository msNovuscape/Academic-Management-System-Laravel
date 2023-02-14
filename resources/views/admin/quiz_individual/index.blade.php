@extends('layouts.app')
@section('title')
    <title>Quiz Individual</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Quiz Assigned To Individual Lists</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name</a> and can view all available records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="/" class="card-heading-link">Home</a></li>
                                <li>Individual Quiz Lists</li>
                            </ul>
                        </div>
                        {!! Form::open(['url' => 'quiz_individual', 'method' => 'GET']) !!}
                            <div class="filter-btnwrap mt-4">
                                <div class="col-md-10">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control"  placeholder="Search by name of student" name="name"/>
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
                        {!! Form::close() !!}
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        @if(isset($admissions))
                            <div class="col-sm-12 col-md-12 stretch-card mt-4">
                                <div class="card-wrap form-block p-0">
                                    <div class="block-header bg-header d-flex justify-content-between p-4">
                                        <div class="d-flex flex-column">
                                            <h3>Student Table To Assign Quiz</h3>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                                <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
                                                    <div class="row">
                                                        <div class="col-12 table-responsive table-details">
                                                            <table class="table" id="">
                                                                <thead>
                                                                    <tr>
                                                                        <th>S.N.</th>
                                                                        <th>Student's Name</th>
                                                                        <th>Batch</th>
                                                                        <th>course</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="student_list">
                                                                    @foreach($admissions as $admission)
                                                                        <tr>
                                                                            <td>{{$loop->iteration}}</td>
                                                                            <td>{{$admission->user->name}}</td>
                                                                            <td>{{$admission->batch->name}}</td>
                                                                            <td>{{$admission->batch->time_slot->course->name}}</td>
                                                                            <td class="action-icons">
                                                                                <ul class="icon-button d-flex">
                                                                                    <li>
                                                                                        <a class="dropdown-item"  href="{{url('quiz_individual_create/'.$admission->id)}}" role="button"><i class="fa-solid fa-plus"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div class="row">
                                                                <div class="pagination-section">
{{--                                                                    {{$admissions->links()}}--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>List of Student which has quiz Assigned</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Student's Name</th>
                                                            <th>Quiz</th>
                                                            <th>Batch</th>
                                                            <th>course</th>
                                                            <th>No. of Attempt</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            @foreach($settings as $setting)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$setting->admission->user->name}}</td>
                                                                    <td>{{$setting->quiz->name}}</td>
                                                                    <td>{{$setting->admission->batch->name}}</td>
                                                                    <td>{{$setting->admission->batch->time_slot->course->name}}</td>
                                                                    <td>{{$setting->no_of_attempt}}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="
                                                                                -item"  href="{{url('quiz_individual_edit/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="edit"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="pagination-section">
                                                            {{$settings->links()}}
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
            </div>
        </div>
    </div>
@endsection
