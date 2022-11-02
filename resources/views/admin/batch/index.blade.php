@extends('layouts.app')
@section('title')
    <title>Batch</title>
@endsection
@section('main-panel')
    <div class="main-panel w-100">
        <div class="content-wrapper content-wrapper-bg">
            <!-- <div class="row"> -->
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>List of Batches</h4>
                        </div>
                        <div class="add-button">
                            <a class="nav-link" href="{{url('batches/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbspAdd Batch</a>
                        </div>
                    </div>
                    <form id="search">
                        <div class="filter-btnwrap mt-4">
                            <div class="col-md-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                            <input type="text" class="form-control"  placeholder="Search By Batch Name" name="name" onchange="filterList()"/>
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
                                    <div class="col-md-4 d-flex">
                                        <div class="filter-group mx-2">
                                            <span>
                                                <img src="{{url('icons/filter-icon.svg')}}" alt="" class="img-flud">
                                            </span>
                                            <a href="">Filter</a> 
                                        </div>
                                        <div class="refresh-group mx-2">
                                            <a href="">
                                                <img src="{{url('icons/refresh-top-icon.svg')}}" alt="" class="img-flud">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-1">
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="block-header bg-header d-flex justify-content-between my-4 py-0">
                        <div class="col-md-10 d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <h3>Batch List</h3>
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
                                                            <h4>{{$setting->name}}</h4>
                                                        </div>
                                                        <div class="header-right">
                                                            <div class="dropdown">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <li>
                                                                        <a class="dropdown-item"   href="{{url('batches/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen"></i>Edit</a>
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
                                                                <p>Course:</p>
                                                                <p>Branch:</p>
                                                                <p>Day:</p>
                                                                <p>Time Slot:</p>
                                                                <p>Start Date:</p>
                                                                <p>End Date:</p>
                                                                <p>Status:</p>
                                                                <p>Fee:</p>
                                                                @foreach($setting->batch_installments as $installment)
                                                                    <p>{{config('custom.installment_types')[$installment->installment_type]}} :</p>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{$setting->time_slot->course->name}}</p>
                                                                <p>{{$setting->time_slot->branch->name}}</p>
                                                                <p>{{$setting->time_slot->time_table->day}}</p>
                                                                <p>{{$setting->time_slot->time_table->start_time}} - {{$setting->time_slot->time_table->end_time}}</p>
                                                                <p>{{$setting->start_date}}</p>
                                                                <p>{{$setting->end_date}}</p>
                                                                <p>{{config('custom.status')[$setting->status]}}</p>
                                                                <p>{{$setting->fee}}</p>
                                                                @foreach($setting->batch_installments as $installment)
                                                                    <p>{{$installment->amount}}</p>
                                                                @endforeach
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
            <!-- </div> -->
        </div>
    </div>

@endsection
@section('script')
    <script>
        function myFunction(id)
        {
            document.getElementById("myDropdown"+id).classList.toggle("show");
        }
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn_try')) {
            var dropdowns = document.getElementsByClassName("dropdown-content_try");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }

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
                            window.location = Laravel.url+'/batches/delete/'+id;
                        }
                    },
                    close: function () {
                    }
                }
            });
        }
    </script>
@endsection

