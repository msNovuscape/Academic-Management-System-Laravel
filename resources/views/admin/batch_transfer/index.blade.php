@extends('layouts.app')
@section('title')
    <title>Batch Transfer</title>
@endsection
@section('main-panel')
<div class="main-panel w-100">
    <div class="content-wrapper content-wrapper-bg">
        <!-- <div class="row"> -->
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="row">
                <div class="card-heading d-flex justify-content-between">
                    <div>
                        <h4>List of Courses</h4>
                    </div>
                    <ul class="admin-breadcrumb">
                        <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                        <li>Batch Transfer</li>
                    </ul>
                </div>
{{--                {!! Form::open(['url' => 'batches', 'method' => 'GET']) !!}--}}
{{--                    <div class="filter-btnwrap mt-4">--}}
{{--                        <div class="col-md-10">--}}
{{--                            <div class="row g-2 align-items-center">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="input-group">--}}
{{--                                                    <span>--}}
{{--                                                        <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                                                    </span>--}}
{{--                                        <input type="text" class="form-control" id="inputText" placeholder="Search by Course Name or Code" name="name" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 d-flex">--}}
{{--                                    <div class="filter-group mx-2">--}}
{{--                                                <span>--}}
{{--                                                    <img src="{{url('icons/filter-icon.svg')}}" alt="" class="img-flud">--}}
{{--                                                </span>--}}
{{--                                        <button class="fltr-btn" type="submit">Filter</button>--}}
{{--                                    </div>--}}
{{--                                    <div class="refresh-group mx-2">--}}
{{--                                        <a onclick="getReset('{{Request::segment(1)}}')">--}}
{{--                                            <img src="{{url('icons/refresh-top-icon.svg')}}" alt="" class="img-flud">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                {!! Form::close() !!}--}}
                <div class="mt-1">
                    @include('success.success')
                    @include('errors.error')
                </div>
                <div class="block-header bg-header d-flex justify-content-between my-4 py-0">
                    <div class="col-md-12">
                        <div class="d-flex flex-column">
                            <h3>Courses List</h3>
                        </div>
                        <div class="row">
                            @foreach($courses as $course)
                                <div class="col-md-4 col-sm-6 mt-4">
                                    <a href="{{url('batch-transfers/course/'.$course->id)}}">
                                        <div class="batch-card">
                                            <div class="card-tip">
                                                <i class="fa-solid fa-book-open-reader"></i>
                                                <h4>{{$course->name}}</h4>
                                            </div>
                                            <div class="card-end">
                                                <i class="fa-solid fa-angle-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>
@endsection
