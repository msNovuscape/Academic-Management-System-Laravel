@extends('layouts.app')
@section('title')
    <title>Create Technical Exam Location</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Add Technical Exam Location</h3>
                            {{-- <p class="ms-4">Fill the following fields to create a Loc</p> --}}
                            <div class="tbl-buttons">
                                <ul>
                                    <li class="m-0">
                                        <a href="{{url('branches')}}">
                                            <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'technical_exam_location','method'=>'Post']) !!}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>City Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="city_name" type="text" class="form-control" required/>
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
                                                            <label>Full Address</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input name="full_address" type="text" class="form-control" required/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-4">
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
                                                                        <option value="{{$index}}">{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-section d-flex justify-content-end mt-4">
                                            <a href="{{url('branches')}}">
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
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
