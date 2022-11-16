@extends('layouts.app')
@section('title')
    <title>Assign Zoom Link</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Assign Zoom Link</h3>
                            <p class="ms-4">Fill the following fields to assign zoom link.</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('zoom-links-batch')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'zoom-links-batch','method' => 'POST','onsubmit' => 'return validateForm()']) !!}
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
                                                            <select  id="course_id" class="form-control" required onchange="getBatch()">
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
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Batch</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="batch_id" id="batch_id" class="form-control" required>
                                                                <option value=""  selected disabled class="option">Please Select the Batch</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                        <div id="material_dom">

                        </div>

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
        function getBatch(){
            var course_id = $('#course_id').val();
            $.ajax({
                type: 'GET',
                url:Laravel.url+'/zoom-links-batch/get_batches/'+course_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    $('.option').remove();
                    $('#material_select').remove();
                    $('#batch_id').append(data['html']);
                    $('#material_dom').append(data['html_material']);
                },
                error: function (error){
                   errorDisplay('Something went wrong!');
                }
            });
        }

        function validateForm() {
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
            for (var i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].checked){
                    return true;
                }
            }
            errorDisplay('Please select at least one zoom link!');
            return false;
        }

    </script>

@endsection
