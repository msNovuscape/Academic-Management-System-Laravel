@extends('layouts.app')
@section('title')
    <title>Finance</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header flex-column align-items-stretch p-4">
                            <div class="d-flex bh-relative">
                                <h3 class="p-0">Installment Detail</h3>
                                <div class="tbl-buttons bh-absolute">
                                    <ul>
                                        <li>
                                            <a href="{{url('finances')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="row">
                                    <div class="col-md-3 d-flex">
                                        <div class="table-image">
                                            <img src="{{url('images/profile.png')}}" alt="">
                                        </div>
                                        <div class="d-flex flex-column name-table">
                                            <p>{{$setting->user->email}}</p>
                                            <p>{{$setting->student_id}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row align-items-center installment-head">
                                            <div class="col-md-4">
                                                <label>Course:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="mb-0">{{$setting->batch->time_slot->course->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center installment-head mt-1">
                                            <div class="col-md-4">
                                                <label>Batch:</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="mb-0">{{$setting->batch->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row align-items-center installment-head">
                                            <div class="col-md-6">
                                                <label>fee:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0">{{$setting->batch->fee}}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center installment-head mt-1">
                                            <div class="col-md-6">
                                                <label>Discount:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0">{{$setting->discount->amount}}</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="row align-items-center installment-head">
                                            <div class="col-md-6">
                                                <label>Amount to Pay:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0">{{$setting->payable_amount}}</p>
                                            </div>
                                        </div>
                                        <div class="row align-items-center installment-head mt-1">
                                            <div class="col-md-6">
                                                <label>Paid Amount:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-0">{{$setting->finances->sum('amount')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4 pt-0">
                            @foreach($setting->finances as $finance)
                                {!! Form::open(['url' => 'finances/update/'.$finance->id,'method' => 'POST','onsubmit' => 'return validateForm('.$finance->id.','.$finance->amount.')']) !!}
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="row border border-1 border-grey rounded-1 p-4 m-1 mt-4">
                                            <div class="col-12 table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 mt-2">
                                                        <div class="form-group batch-form">
                                                            <div class="col-md-12">
                                                                <div class="row installment-name">
                                                                    <div class="col-md-3">
                                                                        <label>Installment:</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p class="mb-0">{{config('custom.installment_types')[$finance->batch_installment->installment_type]}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 mt-2">
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
                                                                            <input type="number" name="amount" min="0"  value="{{$finance->amount}}" class="form-control my_amount" id="amount{{$finance->id}}" required/>
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
                                                                            <input type="text" name="transaction_no"  value="{{$finance->transaction_no}}" class="form-control"/>
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
                                                                            <select name="bank_status" id="bank_status" class="form-control" required>
                                                                                <option value="" selected disabled class="option">Please Select the Bank Status</option>
                                                                                @foreach(config('custom.bank_status') as $in => $val)
                                                                                    <option value="{{$in}}" @if($finance->bank_status == $in) selected @endif>{{$val}}</option>
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
                                                                            <select name="payment_status" id="payment_status{{$finance->id}}" class="form-control" required>
                                                                                <option value="" selected disabled class="option">Please Select the Status</option>
                                                                                @foreach(config('custom.payment_status') as $index => $value)
                                                                                    <option value="{{$index}}" @if($finance->status == $index) selected @endif>{{$value}}</option>
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
                                                                        <label>Payment Date</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="date" value="{{$finance->date}}" class="form-control getDate" placeholder="Please enter the payment date" required/>
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
                                                                            <input type="text" name="remark"  value="{{$finance->remark}}" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if($finance->status == 2)
                                                        <div class="col-sm-12 col-md-6 mt-4">
                                                            <div class="form-group batch-form">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <label>Due Date</label>
                                                                        </div>

                                                                        @if($finance->extend_date)
                                                                            <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <input type="text" name="date" value="{{$finance->extend_date->due_date}}" class="form-control extend_date flatpickr-input" placeholder="Please enter the payment date" id="due_date{{$loop->iteration}}">
                                                                                <input style="display: none" type="text" name="date_old" value="{{$finance->extend_date->due_date}}" class="form-control extend_date flatpickr-input" placeholder="Please enter the payment date" id="due_date_old{{$loop->iteration}}">
                                                                            </div>
                                                                        </div>
                                                                        @else
                                                                            <div class="col-md-9">
                                                                                <div class="input-group">
                                                                                    <input type="text" name="date" value="{{$finance->batch_installment->due_date}}" class="form-control extend_date flatpickr-input" placeholder="Please enter the payment date" id="due_date{{$loop->iteration}}">
                                                                                    <input style="display: none" type="text" name="date_old" value="{{$finance->batch_installment->due_date}}" class="form-control extend_date flatpickr-input" placeholder="Please enter the payment date" id="due_date_old{{$loop->iteration}}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 mt-4">
                                                            <div class="form-group batch-form">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <div class="button-section d-flex justify-content-start">
                                                                            <a  class="extend-button" onclick="getExtend({{$finance->id}},{{$finance->admission_id}},{{$finance->batch_installment_id}},{{$loop->iteration}})">
                                                                                <button type="button">
                                                                                    Extend
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mx-2 mt-3">
                                                <div class="button-section d-flex justify-content-end ">
                                                    <div class="row">
                                                        <div class="button-section d-flex justify-content-end mt-2 mb-2">
                                                            <a href="{{url('finances')}}">
                                                                <button type="button">
                                                                    Skip
                                                                    <i class="fa-solid fa-angle-right"></i>
                                                                </button>
                                                            </a>
                                                            <button type="submit">
                                                                Update
                                                                <i class="fas fa-angle-double-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('script')
    <script>
        function validateForm(id,paid_installment_amount) {
            var request_installment_amount = $('#amount'+id).val();
            var payble_amount = '<?php echo $setting->payable_amount; ?>';
            var paid_amount =  '<?php  echo $paid_amount; ?>';
            var rest_installment_payment_amount = parseFloat(paid_amount) - parseFloat(paid_installment_amount);
            var actual_total_amount = rest_installment_payment_amount + parseFloat(request_installment_amount);
            if(parseFloat(actual_total_amount) > parseFloat(payble_amount)){
                errorDisplay('Amount is greater than amount to pay!')
                return false;
            }else {
                return true;
            }

        }

        $(".extend_date").flatpickr({
            minDate : '<?php echo $start_date; ?>',
            maxDate : '<?php echo $end_date; ?>',
            dateFormat: "Y-m-d"
        });

        function getExtend(finance_id,admission_id,batch_installment_id,id) {
            $.confirm({
                title: 'Do you sure want to extend due date?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){
                            if(new Date($('#due_date'+id).val()) > new Date($('#due_date_old'+id).val())){
                                start_loader();
                                var formData = new FormData();
                                formData.append('finance_id', finance_id);
                                formData.append('admission_id', admission_id);
                                formData.append('batch_installment_id', batch_installment_id);
                                formData.append('due_date',$('#due_date'+id).val());
                                //start ajax call
                                $.ajax({
                                    /* the route pointing to the post function */
                                    type: 'POST',
                                    url: Laravel.url +"/extend_date",
                                    dataType: 'json',
                                    data: formData,
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,
                                    /* remind that 'data' is the response of the AjaxController */
                                    success: function (data) {
                                        end_loader();
                                        debugger;
                                        location.reload();
                                    },
                                    error: function(error) {
                                        end_loader()
                                        debugger;
                                        errorDisplay('Something went wrong !');
                                    }
                                });
                                //end ajax call
                            }else {
                                debugger;
                                errorDisplay('Deu date must be grater than previous due date!')
                            }
                        }
                    },
                    close: function () {
                    }
                }
            });
        }
    </script>
@endsection

