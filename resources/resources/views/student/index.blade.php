@extends('layouts.app')
@section('title')
    <title>Student Details</title>
@endsection
@section('style')
    {!! Html::style('css/student-detail.css') !!}
@endsection
@section('main-panel')
    <section class='attendence-section'>
        @include('success.success')
        @include('errors.error')
        <div class="container-fluid">
            <div class="row profile-top">
                <div class="col-md-4 profile-col">
                    <div class='profile-general'>
                        <img src={{url($setting->image)}} alt="profile"/>
                        <div class='profile-desc'>
                            <h1>{{$setting->admission->user->name}}</h1>
                            <h2>{{$setting->admission->student_id}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 course-col">
                    <div class="course-general">
                        <h1>{{$setting->admission->batch->time_slot->course->name}} [{{$setting->admission->batch->name}}]</h1>
                        <h2>{{$setting->admission->batch->time_slot->time_table->day}}
                            {{$setting->admission->batch->time_slot->time_table->start_time}}
                            {{$setting->admission->batch->time_slot->time_table->end_time}}
                        </h2>
                    </div>
                </div>
            </div>
            @include('student.tab')
        </div>
    </section>
@endsection
@section('script')
    @include('student.script')
    @include('student.attendence.attendance_script')
@endsection
