@extends('layouts.app')
@section('title')
    <title>Dashboard</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            @include('success.success')
            @include('errors.error')
        </div>
            <div class="row">
            <a href="{{}}">Welcome to Dashboard!</a>
            </div>
        </div>
    </div>
    
@endsection
