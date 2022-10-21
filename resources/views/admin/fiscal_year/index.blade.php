@extends('layouts.app')
@section('title')
    <title>Fiscal Year</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Fiscal Year List</h4>
                                <p>
                                    You can search the fiscal year by <a href="#" class="card-heading-link">name.</a>
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Fiscal Year</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                <form id="search">
                                    <div class="row">
                                        <div class="filter-btnwrap justify-content-between">
                                            <div class="d-flex">
                                                <div class="input-group">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                        <input type="text" class="form-control" placeholder="Search by Name" name="name" onchange="filterList()"/>
                                                </div>
                                                <div class="filter-group mx-4">
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
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4 pb-0">
                                    <div class="d-flex flex-column">
                                        <h3>Fiscal Year Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('fiscal-years/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Fiscal Year
                                        </a>
                                    </div>
                                </div>
                                <div class="row px-4">
                                    <div class="col-md-12">
                                        @include('success.success')
                                        @include('errors.error')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap card-wrap-bs-none form-block p-4">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table mb-0" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Name</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$setting->name}}</td>
                                                                <td>{{$setting->start_date}}</td>
                                                                <td>{{$setting->end_date}}</td>
                                                                <td>{{config('custom.status')[$setting->status]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        <li>
                                                                            <a class="dropdown-item" href="{{url('fiscal-years/'.$setting->id.'/edit')}}" role="button" data-bs-toggle="tooltip" data-bs-title="edit"><i class="fa-solid fa-pen"></i></a>
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
    @include('admin.course.course_modal')
    @include('admin.course.course_modal_edit')
@endsection
