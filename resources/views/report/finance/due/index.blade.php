@extends('layouts.app')
@section('title')
    <title>Finance Due Report</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Finance Due Report</h3>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            {!! Form::open(['url' => 'reports/due_finance','method' => 'POST']) !!}
                                <div class="col-12 grid-margin">
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Due Days</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="due_day" id="due_day" class="form-control" required>
                                                                    <option value="" selected="" disabled>Please Select the Due Day</option>
                                                                    @foreach(config('custom.due_days') as $index => $value)
                                                                        <option value="{{$index}}" @if(request('due_day') == $index) selected @endif>{{$value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Installment</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="installment_type" id="installment_type" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Please Select the installment type</option>
                                                                    @foreach(config('custom.installment_types') as $index1 => $value1)
                                                                        <option value="{{$index1}}" @if(request('installment_type') == $index1) selected @endif>{{$value1}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group batch-form">
                                                <div class="col-md-12">
                                                    <div class="row align-items-baseline">
                                                        <div class="col-md-3">
                                                            <label for="exampleInputEmail1">Type</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <select name="type" id="type" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Please Select the type</option>
                                                                    <option value="report">Report</option>
                                                                    <option value="send_email">Send Email</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-section d-flex justify-content-center mt-4">
                                            <div class="row col-md-2">
                                                <div class="w-100 button-section d-flex justify-content-end mt-2 mb-2">
                                                    <button type="submit" class="w-100">
                                                        Submit
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
