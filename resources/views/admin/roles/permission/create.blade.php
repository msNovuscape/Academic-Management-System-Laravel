@extends('layouts.app')
@section('title')
    <title>User Roles</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Assign Roles</h4>
                                <p>
                                    You can add give access according to the following roles.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Roles</li>
                            </ul>
                        </div>
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            {!! Form::open(['url' => 'permissions', 'method' => 'POST' ,'onsubmit' => 'return validateForm()']) !!}
                                <div class="card-wrap form-block p-0">
                                    <div class="row role-form">
                                        <div class="col-md-4">
                                            <div class="role-name-input">
                                                <label for="" class="form-label">User's Name </label>
                                                <select class="form-select" aria-label="Default select example" name="user_id" required>
                                                    <option value="" disabled selected>Please select user</option>
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}" @if(old('user_id') == $user->id) selected @endif>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="role-select">
                                                <label for="" class="form-label">Role </label>
                                                <select class="form-select" aria-label="Default select example" name="role_id" id="role_id">
                                                    <option value="" disabled selected>Please select Role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}" @if(old('role_id') == $role->id) selected @endif>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="role-radios">
                                                <label for="" class="form-label">Personal Permission</label>
                                                <div class="d-flex gap-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="permission" value="1" id="yes" onclick="getPermission()">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Allow
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="permission" value="2" id="no" onclick="getPermission()" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Disallow
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{--  start table for personal permission  --}}
                                    @include('admin.roles.permission.table.permission')
                                {{--  end table for personal permission  --}}
                                </div>
                                <div class="row mt-4">
                                    <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                        <div class="row">
                                            <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                <a href="{{url('permissions')}}">
                                                    <button type="button">
                                                        Skip
                                                        <i class="fa-solid fa-angles-right"></i>
                                                    </button>
                                                </a>
                                                <button type="submit">
                                                    Save & Continue
                                                    <i class="fas fa-angle-double-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.roles.permission.script')
@endsection
