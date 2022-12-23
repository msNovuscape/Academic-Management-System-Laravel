@extends('layouts.app')
@section('title')
    <title>Student Detail View</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        @include('admin.student_detail_view.admission_detail')
        @if($setting->student)
            @include('admin.student_detail_view.personal_detail')
            @include('admin.student_detail_view.contact')
            @include('admin.student_detail_view.emergency_contact')
        @endif
        @include('admin.student_detail_view.finance')
        @include('admin.student_detail_view.attendance')
        @include('admin.student_detail_view.quiz')
    </div>
@endsection
