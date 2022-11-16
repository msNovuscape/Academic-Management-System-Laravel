@extends('layouts.app')
@section('title')
    <title>Assign Zoom Link</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading">
                            <div>
                                <h4>Assigned  Zoom Link</h4>
                            </div>
                        </div>
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Batch : {{$setting->batch->name}}</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('zoom-links-batch')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Back</a>
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
                                                            <th>Name</th>
                                                            <th>Link</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>{{$setting->zoomLink->name}}</td>
                                                                <td>
                                                                    <a class="dropdown-item"  href="{{url($setting->zoomLink->link)}}" role="button" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
