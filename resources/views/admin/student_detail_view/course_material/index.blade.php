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
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <div class="container-fluid">
            <div class="row profile-top">
                <div class="col-md-6 profile-col">
                    <div class='profile-general'>
                        <div class="profile-img">
                            @if($setting->student)
                                <a href="{{url($setting->student->image)}}" target="_blank">
                                    <img src="{{url($setting->student->image)}}" class="w-100" alt="profile">
                                </a>
                            @else
                                <img src="{{url('images/no_images.png')}}" class="w-100" alt="profile">
                            @endif
                        </div>
                        <div class='profile-desc'>
                            <h1>{{$setting->user->name}}</h1>
                            <h2>{{$setting->student_id}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 course-col">
                    <div class="course-general">
                        <h1>{{$setting->batch->time_slot->course->name}} [{{$setting->batch->name_other}}]</h1>
                        <h2>{{$setting->batch->time_slot->time_table->day}}
                            {{$setting->batch->time_slot->time_table->start_time}}
                            {{$setting->batch->time_slot->time_table->end_time}}
                        </h2>
                    </div>
                </div>
            </div>
            <section class='attendance-tab'>
                <div class='row'>
                    @include('admin.student_detail_view.tab.nav')
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($course_materials) > 0)
                                @include('admin.student_detail_view.course_material.show1')
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function getUpdate(admissionId, courseMaterialId) {
            start_loader();
            if ($("#course_material"+courseMaterialId).is(":checked")) {
                // do something if the checkbox is NOT checked
                $.ajax({
                    type:'GET',
                    url:Laravel.url+'/admissions/course_materials_checked/'+admissionId+'/'+courseMaterialId,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success:function (data){
                        end_loader();
                        errorDisplay('Material is assigned');
                    },
                    error: function (error){
                        end_loader();
                        errorDisplay('Something went worng !');
                    }
                });

            } else {
                $.ajax({
                    type:'GET',
                    url:Laravel.url+'/admissions/course_materials_unchecked/'+admissionId+'/'+courseMaterialId,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success:function (data){
                        end_loader();
                        errorDisplay('Material is removed');
                    },
                    error: function (error){
                        end_loader();
                        errorDisplay('Something went worng !');
                    }
                });
            }
        }
    </script>
@endsection



