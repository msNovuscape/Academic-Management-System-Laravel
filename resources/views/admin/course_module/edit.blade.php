@extends('layouts.app')
@section('title')
    <title>Course Modules</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--start loader--}}
            <div class="loader loader-default" id="loader"></div>
            {{--end loader--}}
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <div class="d-flex flex-column">
                                <h3>Edit Module</h3>
                                <p class="mt-2 sub-header">Fill the following fields to add a new Module</p>
                            </div>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('course-modules')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'course-modules/update','method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
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
                                                                    <select name="course_id" class="form-control" required>
                                                                        <option value="" selected disabled>Please Select the Course</option>
                                                                        @foreach($courses as $course)
                                                                            <option value="{{$course->id}}" @if($setting->id == $course->id) selected @endif>{{$course->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('admin.course_module.table.image')
                                    <div class="row mt-4">
                                        <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                            <div class="row">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                    <a href="{{url('course-modules')}}">
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
        function getDelete(id) {
            if($('.image').length > 1){
                $('#tr_'+id).remove();
            } else {
                errorDisplay('Please Select at least one image!');
            }
        }

        var count = 1;
        function getMore() {
            count = count +1;
            var html = '<tr id="tr_'+count+'">'+
                '<td>'+
                '<input type="text" class="form-control image" name="name[]" required>'+
                '</td>'+
                '<td>'+
                '<a class="delete-btns"  role="button" onclick="getDelete('+count+')">Delete</a>'+
                '</td>'+
                '</tr>';
            $('#my-table > tbody:last').append(html);
        }

        function getPermanentyDelete(course_module_id) {
            event.preventDefault()
            if($('.image').length > 1){
                $.confirm({
                    title: 'Do you sure want to delete?',
                    content: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Delete',
                            btnClass: 'btn-red',
                            action: function(){
                                debugger;
                                // var find_document_id = dom["id"].split("_");
                                // var document_id =val;
                                var formData = new FormData();
                                formData.append('course_module_id', course_module_id);
                                debugger
                                start_loader();
                                $.ajax({
                                    /* the route pointing to the post function */
                                    type: 'POST',
                                    url: Laravel.url +"/course-modules-delete",
                                    dataType: 'json',
                                    data: formData,
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,
                                    /* remind that 'data' is the response of the AjaxController */
                                    success: function (data) {
                                        end_loader();
                                        $('#tr_update_'+course_module_id).remove();

                                    },
                                    error: function(error) {
                                        end_loader();
                                        errorDisplay(error["responseJSON"]["message"]);
                                    }
                                });
                            }
                        },
                        close: function () {
                        }
                    }
                });
            } else {
                errorDisplay('Please Select at least one image!');
            }
        }

        function getModule() {
            var course_id = $('#course_id').val();
            start_loader();
            $.ajax({
                type:'GET',
                url:Laravel.url+'/course-materials/modules/'+course_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    end_loader();
                    if (data['status'] == 'Yes') {
                        $('.option-module').remove();
                        $('#course_module_id').append(data['html']);
                        $('#course_module_id').attr('required', 'required')
                        $('#course-module-dom').show();
                    } else {
                        $('.option-module').remove();
                        $('#course_module_id').removeAttr('required');
                        $('#course-module-dom').hide();
                    }

                },
                error: function (error){
                    end_loader()
                    errorDisplay('Something went worng !');
                }
            });

        }


    </script>
@endsection
