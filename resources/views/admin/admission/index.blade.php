@extends('layouts.app')
@section('title')
    <title>Admission</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Student Lists</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name or student id, course, batch, date</a> and can view all available admission records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Admission</li>
                            </ul>
                        </div>
                        {!! Form::open(['url' => 'admissions', 'method' => 'GET']) !!}
                            <div class="row">
                                <div class="col-md-11">
                                        <div class="row">
                                            <div class="filter-btnwrap justify-content-between">
                                                <div class="d-flex">
                                                    <div class="input-group">
                                                        <span>
                                                            <i class="fa-solid fa-calendar-days"></i>
                                                        </span>
                                                        <input type="text" class="form-control currentDate reset-class"  placeholder="Search by Date" name="date" value="{{old('date')}}"/>
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
                                                                @foreach(config('custom.pagination') as $in1 => $val1)
                                                                    <option value="{{$val1}}" @if(request('per_page') == $val1) selected @endif>{{$val1}}</option>
                                                                @endforeach
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
                                        <h3>New Student Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('admissions/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Admission</a>
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
                                                                <th>Time Slot</th>
                                                                <th>Date</th>
                                                                <th data-bs-toggle="tooltip" data-bs-title="Due Amount">Due Amt</th>
                                                                <th data-bs-toggle="tooltip" data-bs-title="Discount">Disc</th>
                                                                <th data-bs-toggle="tooltip" data-bs-title="First Installment">1st Inst</th>
                                                                <th>Action</th>
                                                                <th>Counselling</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            @foreach($settings as $setting)
                                                                <tr>
                                                                    <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                    <td class="d-flex">
                                                                        <div class="d-flex flex-column name-table">
                                                                            <p>{{$setting->user->name}}</p>
                                                                            <p>{{$setting->student_id}}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$setting->batch->time_slot->course->name}}</td>
                                                                    <td>{{$setting->batch->name}}</td>
                                                                    <td>{{$setting->batch->time_slot->time_table->day}} [{{$setting->batch->time_slot->time_table->start_time}}-{{$setting->batch->time_slot->time_table->end_time}}]</td>
                                                                    <td>{{$setting->date}}</td>
                                                                    <td>{{$setting->payable_amount}}</td>
                                                                    <td>{{$setting->discount->amount}}</td>
                                                                    <td>{{$setting->finances->first()->amount}}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('admissions/show/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('admissions/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen" data-bs-toggle="tooltip" data-bs-title="Edit"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        @if($setting->sCounselling)
                                                                            <a class="dropdown-item"  href="{{url('counselling/'.$setting->sCounselling->id)}}" role="button"><i class="fa-solid fa-eye counselling-icons" data-bs-toggle="tooltip" data-bs-title="Show Carrier Counselling"></i></a>
                                                                        @else
                                                                            <a class="dropdown-item"  href="{{url('counselling/'.$setting->id)}}" role="button"><i class="fa-solid fa-plus counselling-icons" data-bs-toggle="tooltip" data-bs-title="Carrier Counselling"></i></a>
                                                                        @endif
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
    @include('admin.admission.admission_modal');
@endsection

