@extends('layouts.app')
@section('title')
    <title>Reset Password</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Reset Password</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name or student id or email</a> and can view all available student records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Student</li>
                            </ul>
                        </div>
                        {!! Form::open(['url' => 'admissions/student_password_reset', 'method' => 'GET']) !!}
                        <div class="row">
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="filter-btnwrap justify-content-between">
                                        <div class="d-flex">
                                            <div class="input-group mx-8">
                                                        <span>
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                        </span>
                                                <input type="text" class="form-control reset-class"  placeholder="Search by Name or Id or email" name="name" value="{{old('name')}}"/>
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
                        @if(count($settings) > 0)
                            <div class="col-sm-12 col-md-12 stretch-card mt-4">
                                <div class="card-wrap form-block p-0">
                                    <div class="block-header bg-header d-flex justify-content-between p-4">
                                        <div class="d-flex flex-column">
                                            <h3>Student Table</h3>
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
                                                                <th>Branch</th>
                                                                <th>Date</th>
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
                                                                                @if($setting->student)
                                                                                    <img src="{{url($setting->student->image)}}" alt=""/>
                                                                                @else
                                                                                    <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                                @endif
                                                                            </div>
                                                                            <div class="d-flex flex-column name-table">
                                                                                <p>{{$setting->user->name}}</p>
                                                                                <p>{{$setting->student_id}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$setting->batch->time_slot->course->name}}</td>
                                                                    <td>{{$setting->batch->name_other}}</td>
                                                                    <td>{{$setting->batch->time_slot->time_table->day}} [{{$setting->batch->time_slot->time_table->start_time}}-{{$setting->batch->time_slot->time_table->end_time}}]</td>
                                                                    <td>{{$setting->admissionBranch? $setting->admissionBranch->branch->name : '-'}}</td>
                                                                    <td>{{$setting->date}}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            @if(Auth::user()->crudPermission('show_admissions'))
                                                                                <li>
                                                                                    <a class="dropdown-item"  href="{{url('admissions/student_password_reset/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="Reset Password"><i class="fa fa-key" aria-hidden="true"></i></a>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
    {{--                                                    <div class="row">--}}
    {{--                                                        <div class="pagination-section">--}}
    {{--                                                            {{$settings->withQueryString()->links()}}--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

