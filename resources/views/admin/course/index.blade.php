@extends('layouts.app')
@section('title')
    <title>Course</title>
@endsection
@section('main-panel')
    <div class="main-panel w-100">
        <div class="content-wrapper content-wrapper-bg">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Course</h4>
                        </div>
                        <div class="add-button">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Course</a>
                        </div>
                    </div>
                    {!! Form::open(['url' => 'courses', 'method' => 'GET']) !!}
                        <div class="filter-btnwrap mt-4">
                            <div class="col-md-10">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                            <input type="text" class="form-control" id="inputText" placeholder="Search by Course Name or Code" name="name" />
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
                    <div style="margin-top: 5px;">
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="block-header bg-header d-flex justify-content-between my-4 py-0">
                        <div class="col-md-10 d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <h3>List of Course</h3>
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
                                                                        <a class="dropdown-item" data-bs-target="#modalAddCourse{{$setting->id}}" data-bs-toggle="modal"  href="#" role="button"><i class="fa-solid fa-pen"></i>Edit</a>
                                                                    </li>
                                                                    <li>
{{--                                                                        <a class="dropdown-item"  href="{{url('courses/delete',$setting->id)}}" role="button" onclick="myConfirm()"><i class="fa-solid fa-trash"></i>Delete</a>--}}
                                                                        <a class="dropdown-item"  role="button" onclick="myConfirm({{$setting->id}})"><i class="fa-solid fa-trash"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-session-body"> <img src="" alt="">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p>Code</p>
                                                                <p>Status</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p>{{$setting->code}}</p>
                                                                <p>{{config('custom.status')[$setting->status]}}</p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h4>Remarks</h4>
                                                                <p>
                                                                    {{$setting->remark}}
                                                                </p>                                                    </div>
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
    @include('admin.course.course_modal')
    @include('admin.course.course_modal_edit')
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
                            window.location = Laravel.url+'/courses/delete/'+id;
                        }
                    },
                    close: function () {
                    }
                }
            });
        }


    </script>
@endsection
