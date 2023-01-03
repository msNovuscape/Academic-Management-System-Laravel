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
                                <h3>Add Module</h3>
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
                                {!! Form::open(['url' => 'course-modules','method' => 'POST']) !!}
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
                                                                            <option value="{{$course->id}}" @if(old('course_id') == $course->id) selected @endif>{{$course->name}}</option>
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
                errorDisplay('Please enter at least one module name!');
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
                '<a class="btn btn-danger"  role="button" onclick="getDelete('+count+')">Delete</a>'+
                '</td>'+
                '</tr>';
            $('#my-table > tbody:last').append(html);
        }
    </script>
@endsection
