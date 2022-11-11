@extends('layouts.app')
@section('title')
    <title>Carrier Counselling</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Carrier Counselling  Lists</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name or student id, course, batch, date</a> and can view all available admission records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Carrier Counselling</li>
                            </ul>
                        </div>
                        {!! Form::open(['url' => 'counselling', 'method' => 'GET']) !!}
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="filter-btnwrap justify-content-between">
                                            <div class="d-flex">
                                                <div class="input-group">
                                                            <span>
                                                                <i class="fa-solid fa-calendar-days"></i>
                                                            </span>
                                                    <input type="text" class="form-control currentDate reset-class"  placeholder="Search by Enroll Date" name="date" value="{{old('date')}}"/>
                                                </div>
                                                <div class="input-group mx-4">
                                                            <span>
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </span>
                                                    <input type="text" class="form-control reset-class"  placeholder="Search by Name or Id" name="name" value="{{old('name')}}"/>
                                                </div>
                                                <div class="input-group mx-4">
                                                            <span>
                                                                <i class="fa-solid fa-book-open"></i>
                                                            </span>
                                                    <select name="course_id" class="form-control reset-class">
                                                        <option value="" selected disabled>Search by Course </option>
                                                        @foreach($courses as $course)
                                                            <option value="{{$course->id}}" @if(old('course_id') == $course->id) selected @endif>{{$course->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mx-4">
                                                            <span>
                                                                <i class="bi bi-grid"></i>
                                                            </span>
                                                    <select name="batch_id" class="form-control reset-class">
                                                        <option value="" selected disabled>Search by Batch </option>
                                                        @foreach($batches as $batch)
                                                            <option value="{{$batch->id}}" @if(old('batch_id') == $batch->id) selected @endif>{{$batch->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-end">
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0">
                                                            Show
                                                        </p>
                                                        <select class="form-select mx-2 show-select reset-class" aria-label="Default select example" name="per_page">
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                        </select>
                                                    </div>
                                                </div>

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
                            </div>
                        {!! Form::close() !!}
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>List of Carrier Counselling Students <span class="badge bg-secondary">{{$settings->count()}}</span></h3>
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
                                                            <th>Name</th>
                                                            <th>Course</th>
                                                            <th>Batch</th>
                                                            <th>Enroll Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                <td class="">
                                                                    <div class="d-flex">
                                                                        <div class="table-image">
                                                                            @if($setting->admission->student)
                                                                                <img src="{{url($setting->admission->student->image)}}" alt=""/>
                                                                            @else
                                                                                <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                            @endif
                                                                        </div>
                                                                        <div class="d-flex flex-column name-table">
                                                                            <p>{{$setting->admission->user->name}}</p>
                                                                            <p>{{$setting->admission->student_id}}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{$setting->admission->batch->time_slot->course->name}}</td>
                                                                <td>{{$setting->admission->batch->name}}</td>
                                                                <td>{{$setting->date}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item"  href="{{url('counselling/'.$setting->admission->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
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

