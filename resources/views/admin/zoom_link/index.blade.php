@extends('layouts.app')
@section('title')
    <title>Zoom Link</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Zoom Link Lists</h4>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Zoom Link</li>
                            </ul>
                        </div>
                        <div class="mt-1">
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Zoom Links Table</h3>
                                    </div>
                                    @if(Auth::user()->customMenuPermission('create_zoom_links'))
                                        <div class="add-button">
                                            <a class="nav-link" href="{{url('zoom-links/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Zoom Link</a>
                                        </div>
                                    @endif
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
                                                            <th>Course</th>
                                                            <th>Name</th>
                                                            <th>Link</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$setting->course->name}}</td>
                                                                <td>{{$setting->name}}</td>
                                                                <td>{{$setting->link}}</td>
                                                                <td>{{config('custom.status')[$setting->status]}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        @if(Auth::user()->customMenuPermission('update_zoom_links'))
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('zoom-links/'.$setting->id.'/edit')}}" role="button" data-bs-toggle="tooltip" data-bs-title="edit"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                        @endif
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
