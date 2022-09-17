@extends('layouts.app')
@section('title')
    <title>Course Material</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading">
                            <div>
                                <h4>Material Lists</h4>
                                <p>
                                    You can search the materials by <a href="#" class="card-heading-link">name</a> and can view all available courses materials.
                                </p>
                            </div>
                        </div>
                        <form id="search">
                            <div class="filter-btnwrap mt-4">
                                <div class="col-md-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span>
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by material name or course name" name="name" onchange="filterList()"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Course Material Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('course-materials/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Materials</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Material Name</th>
                                                            <th>Course</th>
                                                            <th>Type</th>
                                                            <th>Link</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$setting->name}}</td>
                                                                <td>{{$setting->course->name}}</td>
                                                                <td> {{config('custom.setting_types')[$setting->type]}}</td>
                                                                <td>{{$setting->link}}</td>
                                                                <td>{{config('custom.status')[$setting->status]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item" data-bs-target="#modalAddCourse{{$setting->id}}" data-bs-toggle="modal"  href="#" role="button"><i class="fa-solid fa-eye"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item"  href="{{url('course-materials/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
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
            </div>
        </div>
    </div>
@endsection
