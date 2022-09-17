@extends('layouts.app')
@section('title')
    <title>Student List</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Student List</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name, group, date,</a> and can view all available courses.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="row">
                                    <div class="filter-btnwrap justify-content-between">
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by Name" name="fullname" value=""/>
                                            </div>
                                            <div class="input-group mx-4">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by Code" name="fullname" value=""/>
                                            </div>
                                            <div class="refresh-btn mx-4">
                                                <a href="">
                                                    <img src="{{url('images/refresh-icon.png')}}" alt=""/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end">
                                            <div class="d-flex align-items-center">
                                                <p class="m-0">
                                                    Show
                                                </p>
                                                <select class="form-select mx-2 show-select" aria-label="Default select example">
                                                    <option selected>10</option>
                                                    <option value="1">10</option>
                                                    <option value="2">20</option>
                                                    <option value="3">30</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 d-flex align-items-center p-0">
                                <div class="tbl-buttons">
                                    <div class="export-button">
                                        <div class="dropdown-export">
                                            <button type="submit" name="submit" onclick="submit;" class="student-btn d-flex">
                                                <img src="{{url('images/export-icon.png')}}" alt=""/>Export
                                            </button>
                                            <div class="dropdown-content-export">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            Export.csv
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            Export.pdf
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <h3>Students Table</h3>
                                    </div>
                                </div>
                                @include('success.success')
                                @include('errors.error')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap card-wrap-bs-none form-block p-4">
                                            <div class="row">
                                                <div class="col-12 table-responsive sd-table">
                                                    <table class="table" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </th>
                                                            <th>S.N.</th>
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Course</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>
                                                                    <div class="tblform-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="">
                                                                    </div>
                                                                </td>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td class="d-flex">
                                                                    <img src="{{url($setting->image)}}" alt=""/>
                                                                    <div class="d-flex flex-column name-table">
                                                                        <p>{{$setting->admission->user->name}}</p>
                                                                        <p>{{$setting->admission->student_id}}</p>
                                                                    </div>
                                                                </td>
                                                                <td>{{$setting->residential_address}}</td>
                                                                <td>{{$setting->admission->batch->time_slot->course->name}}</td>
                                                                <td>{{date('d',strtotime($setting->admission->date))}} {{\DateTime::createFromFormat('!m',date('m',strtotime($settings[0]->admission->date)))->format('M')}} {{date('Y',strtotime($setting->admission->date))}}</td>
                                                                <td><p class="active-button">{{config('custom.status')[$setting->admission->user->status]}}</p></td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item" href="{{'students/show/'.$setting->id}}" role="button"><i class="fa-solid fa-eye"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#" data-bs-target="#modalAddCourse{{$setting->id}}" data-bs-toggle="modal" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#"><i class="fa-solid fa-trash"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
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
@endsection
