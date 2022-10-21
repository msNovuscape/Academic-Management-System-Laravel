@extends('layouts.app')
@section('title')
    <title>Time Table</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Time Slots</h4>
                        </div>
                        <div class="add-button">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalAddTimeSlot"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add TimeSlot</a>
                        </div>
                    </div>
                    <form id="search">
                        <div class="filter-btnwrap mt-4">
                            <div class="col-md-10">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-regular fa-clock"></i>
                                            </span>
                                            <input type="text" class="form-control"  placeholder="Search by Day or Time" name="name" onchange="filterList()"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-solid fa-book-open"></i>
                                            </span>
                                            <select class="form-select" aria-label="Default select example" name="course_id"  onchange="filterList()">
                                                <option selected disabled value="">Search by Course</option>
                                                @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-solid fa-sign-hanging"></i>
                                            </span>
                                            <select class="form-select" aria-label="Default select example" name="branch_id"  onchange="filterList()">
                                                <option selected disabled value="">Search by Branch</option>
                                                @foreach($branches as $branch)
                                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div style="margin-top: 5px;">
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="block-header bg-header d-flex justify-content-between py-0 my-4">
                        <div class="col-md-10 d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <h3>Time Slot List</h3>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-nss" role="tabpanel" aria-labelledby="nav-nss-tab">
                            <div class="session-view-card session-view-course">
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($settings as $setting)
                                            <div class="col-md-4 mt-4">
                                                <div class="card-session">
                                                    <div class="card-session-header d-flex justify-content-between">
                                                        <div class="header-left">
                                                            <h4>{{$setting->course->name}}</h4>
                                                        </div>
                                                        <div class="header-right">
                                                            <div class="dropdown">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <li>
                                                                        <a class="dropdown-item" data-bs-target="#editTimeSlotModal{{$setting->id}}" data-bs-toggle="modal"  href="#" role="button"><i class="fa-solid fa-pen"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"   role="button" onclick="myConfirm({{$setting->id}})"><i class="fa-solid fa-trash"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-session-body"> <img src="" alt="">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Branch:</p>
                                                                <p>Day:</p>
                                                                <p>Time Slot:</p>
                                                                <p>Status:</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{$setting->branch->name}}</p>
                                                                <p>{{$setting->time_table->day}}</p>
                                                                <p>{{$setting->time_table->start_time}} - {{$setting->time_table->end_time}}</p>
                                                                <p>{{config('custom.status')[$setting->status]}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
    <!-- Add time table Modal -->
    @include('admin.timeslot.timeslot_modal')
    <!-- Edit time table Modal -->
    @include('admin.timeslot.timeslot_modal_edit')
@endsection
@section('script')
    <script>
        function myConfirm(id){
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
                            window.location = Laravel.url+'/timeslots/delete/'+id;
                        }
                    },
                    close: function () {
                    }
                }
            });
        }
    </script>
@endsection
