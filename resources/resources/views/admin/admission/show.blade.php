@extends('layouts.app')
@section('title')
    <title>Admission</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header">
                            <h3>Show Student Admission</h3>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('admissions')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'admissions/'.$setting->id,'method' => 'POST']) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Student's Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="name" class="form-control" value="{{$setting->user->name}}" placeholder="Name" autocomplete="off"   required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Student's Email</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="email" name="email" class="form-control" value="{{$setting->user->email}}" disabled readonly placeholder="Email" autocomplete="off" required/>
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
                                                                    <select  id="course_id" class="form-control" required  disabled readonly>
                                                                        <option value="" selected disabled>Please Select the Course</option>
                                                                        @foreach($courses as $course)
                                                                            <option value="{{$course->id}}" @if($setting->batch->time_slot->course_id == $course->id) selected @endif>{{$course->name}}</option>
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
                                                                <label>Batch</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select name="batch_id" id="batch_id" class="form-control" required disabled readonly>
                                                                        <option value="" selected disabled class="option">Please Select the Batch</option>
                                                                        @foreach($batches as $batch)
                                                                            <option value="{{$batch->id}}"  class="option" @if($setting->batch_id == $batch->id) selected @endif>{{$batch->name}}</option>
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
                                                                <label>Amount</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="number" name="amount" min="1" disabled readonly  value="{{$setting->finances[0]->amount}}" class="form-control" required/>
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
                                                                <label>Discount</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="number"  disabled readonly name="discount" min="0.0"  value="{{$setting->discount->amount}}" class="form-control" required/>
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
                                                                <label>Transaction No.</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="transaction_no"  disabled readonly value="{{$setting->finances[0]->transaction_no}}" class="form-control"    />
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
                                                                <label>Bank Status</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select name="bank_status" id="bank_status" class="form-control" required disabled readonly>
                                                                        <option value="" selected disabled class="option">Please Select the Bank Status</option>
                                                                        @foreach(config('custom.bank_status') as $in => $val)
                                                                            <option value="{{$in}}" @if($setting->finances[0]->bank_status == $in) selected @endif>{{$val}}</option>
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
                                                                <label>Payment Status</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <select name="payment_status" id="payment_status" class="form-control" required disabled readonly>
                                                                        <option value="" selected disabled class="option">Please Select the Status</option>
                                                                        @foreach(config('custom.payment_status') as $index => $value)
                                                                            <option value="{{$index}}" @if($setting->finances[0]->status == $index) selected @endif>{{$value}}</option>
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
                                                                <label>Date</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="date" disabled readonly value="{{$setting->finances[0]->date}}" class="form-control getDate" placeholder="Please enter the payment date" required/>
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
                                                                <label>Remark</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="remark" disabled readonly  value="{{$setting->finances[0]->remark}}" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
