@extends('layouts.app')
@section('title')
    <title>User</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Users List</h4>
                                <p>
                                    You can search the user by <a href="#" class="card-heading-link">name, course</a> and can view all available user records.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>User</li>
                            </ul>
                        </div>
                        {!! Form::open(['url' => 'users', 'method' => 'GET']) !!}
                        <div class="filter-btnwrap">
                            <div class="col-md-11">
                                <div class="row g-2">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                        <span>
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                        </span>
                                                <input type="text" class="form-control reset-class"  placeholder="Search by Name" name="name" value="{{old('name')}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
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
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex">
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
                        </div>
                        {!! Form::close() !!}
                        <div class="mt-1">
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3> Users Table</h3>
                                    </div>
                                    @if(Auth::user()->customMenuPermission('create_users'))
                                        <div class="add-button">
                                            <a class="nav-link" href="{{url('users/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add User</a>
                                        </div>
                                    @endif
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
                                                            <th>Tutor</th>
                                                            <th>Courses</th>
                                                            <th>Email</th>
                                                            <th>Mobile No.</th>
                                                            <th>Emp Id.</th>
                                                            <th>Status</th>
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
                                                                            @if($setting->userInfo)
                                                                                <img src="{{url($setting->userInfo->image)}}" alt=""/>
                                                                            @else
                                                                                <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                            @endif
                                                                        </div>
                                                                        <div class="d-flex flex-column name-table">
                                                                            <p>{{$setting->name}}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if($setting->userTeachersWithActiveCourse->count() > 0)
                                                                        Yes
                                                                    @else
                                                                        No
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($setting->userTeachersWithActiveCourse->count() > 0)
                                                                        @foreach($setting->userTeachers as $userTeacher)
                                                                            <li>{{$userTeacher->course->name}}</li>
                                                                        @endforeach
                                                                    @else
                                                                      -
                                                                    @endif
                                                                </td>
                                                                <td>{{$setting->email}}</td>
                                                                <td>{{$setting->userInfo->mobile_no}}</td>
                                                                <td>{{$setting->userInfo->emp_id}}</td>
                                                                <td>{{config('custom.status')[$setting->status]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        @if(Auth::user()->customMenuPermission('show_users'))
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('users/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="View"><i class="fa-solid fa-eye"></i></a>
                                                                            </li>
                                                                        @endif
                                                                        @if(Auth::user()->customMenuPermission('update_users'))
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('users/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen" data-bs-toggle="tooltip" data-bs-title="Edit"></i></a>
                                                                            </li>
                                                                        @endif
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

