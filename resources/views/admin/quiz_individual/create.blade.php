@extends('layouts.app')
@section('title')
    <title>Quiz Individual</title>
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
                            <h3>Quiz Individual</h3>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('quiz_individual')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'quiz_individual_create','method' => 'POST']) !!}
                                    <div class="row">
                                            <div class="col-12 table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 mt-4">
                                                        <div class="form-group batch-form">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label>Name</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" value="{{$admission->user->name}}">
                                                                            <input type="hidden" name="admission_id" required value="{{$admission->id}}">
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
                                                    <div class="col-sm-12 col-md-6 mt-4">
                                                        <div class="form-group batch-form">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <label>Quiz</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <select name="quiz_id" id="quiz_id" class="form-control" required>
                                                                                <option value="" selected disabled class="option-quiz">Please Select the Quiz</option>
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
                                                                            <select name="status" id="status" class="form-control" required>
                                                                                <option value="" selected disabled class="option">Please Select the Status</option>
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

                                                </div>
                                            </div>

                                        <div class="row mt-4">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                <div class="row">
                                                    <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                        <a href="{{url('quiz_individual')}}">
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

@endsection
@section('script')
    <script>
        function getBatch() {
            var course_id = $('#course_id').val();
            start_loader();
            $.ajax({
                type:'GET',
                url:Laravel.url+'/quiz_batch_dom/'+course_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    end_loader();
                    debugger;
                    $('.option').remove();
                    $('.option-quiz').remove();
                    $('#batch_id').append(data['html'])
                    $('#quiz_id').append(data['quiz_html'])
                },
                error: function (error){
                    end_loader()
                    debugger;
                    errorDisplay('Something went worng !');
                }
            });
        }
    </script>
@endsection
