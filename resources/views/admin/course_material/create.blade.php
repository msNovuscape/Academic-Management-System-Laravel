@extends('layouts.app')
@section('title')
    <title>Course Material</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <div class="d-flex flex-column">
                                <h3>Course Material</h3>
                                <p class="mt-2 sub-header">Fill the following fields to add a new course materials</p>
                            </div>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('course-materials')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'course-materials','method' => 'POST', 'files' => true]) !!}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Course</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="course_id" id="course_id" class="form-control" required onchange="getModule()">
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

                                    <div class="col-sm-12 col-md-6 mt-4" id="course-module-dom" style="display: none">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Course Module</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="course_module_id" id="course_module_id" class="form-control">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Material Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name" autocomplete="off" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="type" class="form-control" id="type" required onchange="getParagraph()">
                                                                <option value="" selected disabled>Please select Type</option>
                                                                @foreach(config('custom.setting_types') as $index => $value)
                                                                    <option value="{{$index}}" @if(old('type') == $index) selected @endif>{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="status" class="form-control" required>
                                                                <option value="" selected disabled>Please Select Status</option>
                                                                @foreach(config('custom.status') as $index => $value)
                                                                    <option value="{{$index}}" @if(old('status') == $index) selected @endif>{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mt-4">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Description</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <textarea name="description" rows="5" placeholder="Write description here"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        {{-- section for doc and video link--}}
                                    <div class="col-md-6">
                                        <div id="value_section">

                                        </div>
                                    </div>





                                    <div class="col-sm-12 col-md-12 mt-4">
                                        <div class="button-section d-flex justify-content-end">
                                            <a href="{{url('admissions')}}">
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
                function getParagraph() {
                    var val = $('#type').val();
                    var html = '';
                    $('#docx').remove();
                    $('#video').remove();
                    if(val == 1){
                        html += '<div class="col-sm-12 col-md-12 mt-4" id="docx">'+
                                    '<div class="form-group batch-form">'+
                                        '<div class="col-md-12">'+
                                            '<div class="row">'+
                                                '<div class="col-md-3">'+
                                                    '<label>Doc</label>'+
                                                '</div>'+
                                                '<div class="col-md-9">'+
                                                    '<div class="input-group">'+
                                                        {{--'<input type="file" name="link" class="form-control" value="{{old('link')}}" placeholder="Note"  required/>'+--}}
                                                        '<input type="text" name="link" class="form-control" value="{{old('link')}}" placeholder="doc link"  required/>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                        $('#value_section').append(html);
                    }else {
                        html += '<div class="col-sm-12 col-md-12 mt-4" id="video">'+
                            '<div class="form-group batch-form">'+
                            '<div class="col-md-12">'+
                            '<div class="row">'+
                            '<div class="col-md-3">'+
                            '<label>Video Link</label>'+
                            '</div>'+
                            '<div class="col-md-9">'+
                            '<div class="input-group">'+
                            '<input type="text" name="link" class="form-control" value="{{old('link')}}" placeholder="video link"  required/>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>';
                        $('#value_section').append(html);
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
                                $('#course_module_id').attr('required', 'required');
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
