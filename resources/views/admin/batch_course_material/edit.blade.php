@extends('layouts.app')
@section('title')
    <title>Batch Material</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Edit Batch Material</h3>
                            <p class="ms-4">Fill the following fields to edit material.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('batch-course-materials')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'batch-course-materials/'.$setting->id,'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Course</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select  id="course_id" class="form-control" required onchange="getBatch()" disabled>
                                                                <option value="" selected disabled>Please Select the Course</option>
                                                                @foreach($courses as $course)
                                                                    <option value="{{$course->id}}" @if($setting->time_slot->course_id == $course->id) selected @endif>{{$course->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Batch</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="batch_id"  class="form-control" required onchange="getStudents()" disabled>
                                                                <option value="" selected disabled class="option">Please Select the Batch</option>
                                                                @foreach($batches as $batch)
                                                                    <option value="{{$batch->id}}" @if($setting->id == $batch->id) selected @endif class="option">
                                                                        {{$batch->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" id="batch_id" name="batch_id" value="{{$setting->id}}" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($setting->time_slot->course->course_modules->count() > 0)
                                        <div class="col-sm-12 col-md-6 mt-4" id="course-module-dom">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Course Module</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="course_module_id" id="course_module_id" class="form-control" required onchange="getBatchStudents()">
                                                                    <option value="" selected disabled class="option-module">Please Select the module</option>
                                                                    @foreach($setting->time_slot->course->course_modules as $course_module)
                                                                        <option value="{{$course_module->id}}" @if($setting->time_slot->course->course_modules[0]->id == $course_module->id) selected @endif class="option-module">
                                                                            {{$course_module->name}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{--    start section for module --}}
                                        <div id="module_dom">

                                        </div>
                                    {{--    end section for module --}}
                                    {{--    start section for materil or students --}}
                                        <div id="material_dom">
                                            @if($setting->time_slot->course->course_modules->count() > 0 && $setting->admission_batch_materials->count() > 0 && $setting->batch_course_materials->count() > 0)
                                                @include('admin.batch_course_material.student.index_update')
                                            @elseif($setting->time_slot->course->course_modules->count() > 0 && $setting->batch_course_materials->count() > 0)
                                                @include('admin.batch_course_material.student.index_update')
                                            @elseif($setting->batch_course_materials->count() > 0)
                                                @include('admin.batch_course_material.student.course_material')
                                            @endif

                                        </div>
                                    {{--    end section for materil or students  --}}


                                    <div class="button-section d-flex justify-content-end mt-4">
                                        <a href="{{url('batch-course-materials')}}">
                                            <button type="button">
                                                Skip
                                                <i class="fa-solid fa-angles-right"></i>
                                            </button>
                                        </a>

                                        <button>
                                            Save & Continue
                                            <i class="fas fa-angle-double-right"></i>
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $( document ).ready(function() {
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
            if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                select_all.checked = true;
            }
        });
        function allCheck() {
            var select_all = document.getElementById("select_all"); //select all checkbox
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
            //select all checkboxes
            select_all.addEventListener("change", function(e){
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = select_all.checked;
                }
            });


            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all.checked = false;
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                        select_all.checked = true;
                    }
                });
            }
        }


        var submitFunction = true;
        function getBatch(){
            var course_id = $('#course_id').val();
            $.ajax({
                type: 'GET',
                url:Laravel.url+'/batch-course-materials/get_batches_edit/'+course_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    if (data['status'] == 'No') {
                        $('.option').remove();
                        $('#material_select').remove();
                        $('#course-module-dom').remove();
                        $('#batch_id').append(data['html']);
                        $('#material_dom').append(data['html_material']);
                        submitFunction = false;
                    } else {
                        $('.option').remove();
                        $('#material_select').remove();
                        $('#course-module-dom').remove();
                        $('#batch_id').append(data['html']);
                        $('#module_dom').append(data['html_module']);
                        submitFunction = true;
                    }
                },
                error: function (error){
                    errorDisplay('Something went wrong!');
                }
            });
        }

        function getStudents(){
            var batch_id = $('#batch_id').val();
            if (submitFunction == true) {
                $.ajax({
                    type: 'GET',
                    url:Laravel.url+'/batch-course-materials/get_students/'+batch_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success:function (data){
                        $('#material_select').remove();
                        $('#material_dom').append(data['html_material']);
                    },
                    error: function (error){
                        errorDisplay('Something went wrong!');
                    }
                });
            }
        }

        function getBatchStudents(){
            debugger;
            var batch_id = $('#batch_id').val();
            var course_module_id = $('#course_module_id').val();
            debugger;
            if (submitFunction == true) {
                $.ajax({
                    type: 'GET',
                    url:Laravel.url+'/batch-course-materials/get_module_students/'+batch_id+'/'+course_module_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success:function (data){
                        $('#material_select').remove();
                        $('#material_dom').append(data['html_material']);
                        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
                        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                            select_all.checked = true;
                        }
                    },
                    error: function (error){
                        debugger;
                        errorDisplay('Something went wrong!');
                    }
                });
            }
        }



        // function validateForm() {
        //     var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
        //     for (var i = 0; i < checkboxes.length; i++) {
        //         if(checkboxes[i].checked){
        //             return true;
        //         }
        //     }
        //     errorDisplay('Please select at least one course material!');
        //     return false;
        //
        // }

    </script>

@endsection
