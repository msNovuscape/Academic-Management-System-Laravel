@extends('layouts.app')
@section('title')
    <title>Time Slot</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading">
                            <h4>TimeSlot List</h4>
                        </div>
                        <div class="col-md-9">
                            <div class="filter-btnwrap">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                            <span>
                              <img
                                  src="{{url('images/filter-search-icon.png')}}"
                                  alt=""
                              />
                            </span>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="inputText"
                                                    placeholder="Search"
                                                    name="fullname"
                                                    value=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="refresh-btn">
                                                    <a href="">
                                                        <img
                                                            src="{{url('images/refresh-icon.png')}}"
                                                            alt=""
                                                        />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="tbl-buttons">
                                <ul>
                                    <li class="ml-0">
                                        <div class="d-flex">
                                            <p>
                                                Show
                                            </p>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">10</option>
                                                <option value="2">20</option>
                                                <option value="3">30</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="my-0 mx-0">
                                        <div class="export-button">
                                            <button type="submit" name="submit" onclick="submit;" class="student-btn"><i
                                                    class="mdi mdi-cloud-download"></i>Export
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <h3>TimeSlots Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link"
                                           href="add-course.html"
                                           data-bs-toggle="modal"
                                           data-bs-target="#modalAddCourse"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add
                                            Time Slot</a>
                                    </div>

                                </div>
                                @include('success.success')
                                @include('errors.error')
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-12 stretch-card sl-stretch-card"
                                    >
                                        <div class="card-wrap form-block p-4">
                                            <div class="row">
                                                <div
                                                    class="col-12 table-responsive sd-table"
                                                >
                                                    <table class="table" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Course Name</th>
                                                            <th>Day </th>
                                                            <th>Time</th>
                                                            <th>Remarks</th>
                                                            <th>Status</th>
                                                            <th class="actionbtn-dropdown">
                                                                Action
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        @foreach($settings as $setting)
                                                            <tbody id="student_list">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    {{$setting->course->name}}
                                                                </td>
                                                                <td>{{$setting->time_table->day}}</td>
                                                                <td>{{$setting->time_table->start_time."-".$setting->time_table->end_time}}</td>
                                                                <td>{{$setting->course->remark}}</td>
                                                                <td>
                                                                    <a
                                                                        type="button"
                                                                        id="deactivateStudent"
                                                                        data-title=""
                                                                        class="status-table"
                                                                    >Enable</a
                                                                    >
                                                                </td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item" data-bs-target="#modalAddCourse{{$setting->id}}" data-bs-toggle="modal"  href="#" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item" href="#"
                                                                            ><i class="fa-solid fa-trash"></i></a>
                                                                        </li>

                                                                    </ul>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        @endforeach
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

    <!-- Add Course Modal -->
    @include('admin.timeslot.timeslot_modal');
    @include('admin.timeslot.timeslot_modal_edit');
@endsection
