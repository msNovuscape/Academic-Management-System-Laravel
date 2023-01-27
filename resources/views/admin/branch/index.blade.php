@extends('layouts.app')
@section('title')
    <title>Branch</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>BranchList</h4>
                                <p>
                                    You can search the fiscal year by <a href="#" class="card-heading-link">name.</a>
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Branch</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                {!! Form::open(['url' => 'branches', 'method' => 'GET']) !!}
                                    <div class="row">
                                        <div class="filter-btnwrap justify-content-between">
                                            <div class="d-flex">
                                                <div class="input-group">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                        <input type="text" class="form-control" placeholder="Search by Name" name="name"/>
                                                </div>
                                                <div class="filter-group mx-4">
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
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4 pb-0">
                                    <div class="d-flex flex-column">
                                        <h3>Fiscal Year Table</h3>
                                    </div>
                                    @if(Auth::user()->crudPermission('create_fiscal_years'))
                                        <div class="add-button">
                                            <a class="nav-link" href="{{url('branches/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Branch
                                            </a>
                                        </div>
                                    @endif
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
                                                            <th>Address</th>
                                                            <th>Status</th>
                                                            <th>Phone</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$setting->name}}</td>
                                                                <td>{{$setting->address}}</td>
                                                                <td>{{config('custom.status')[$setting->status]}}</td>
                                                                <td>{{$setting->phone_no}}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                        @if(Auth::user()->crudPermission('update_fiscal_years'))
                                                                            <li>
                                                                                <a class="dropdown-item" href="{{url('branches/'.$setting->id.'/edit')}}" role="button" data-bs-toggle="tooltip" data-bs-title="edit"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                        @endif
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
