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
                            <h3>Admit Student</h3>
                            <p>Fill the following fields to admit a new student</p>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'admissions','method' => 'POST']) !!}
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
                                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name" autocomplete="off" required/>
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
                                                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email" autocomplete="off" required/>
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
                                                                    <input type="number" name="amount" min="1"  value="{{old('amount')}}" class="form-control" required/>
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
                                                                    <input type="number" name="discount" min="0.0"  value="{{old('discount')}}" class="form-control" required/>
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
                                                                    <input type="text" name="date" value="{{old('date')}}" class="form-control myDate" placeholder="Please enter the payment date" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                            <div class="row">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
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
                    $.ajax({
                        type:'GET',
                        url:Laravel.url+'/admissions/get_batches/'+course_id,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,
                        success:function (data){
                            $('.option').remove();
                            $('#batch_id').append(data['html'])
                        },
                        error: function (error){
                            errorDisplay('Something went worng !');
                        }
                    });

                }
            </script>
@endsection
