@extends('layouts.app')
@section('main-panel')
    <div class="row">
        @include('success.success')
        @include('errors.error')
    </div>
    <a href="{{url('dashboard')}}">Welcome to Dashboard!</a>
@endsection
