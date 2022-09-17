@extends('layouts.app')
@section('title')
    <title>Finance</title>
@endsection
@section('main-panel')
    <div class="main-panel main-panel-table">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <div class="content-wrapper content-wrapper-bg">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Finance</h4>
                        </div>
                    </div>
                    <div>
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4">
                        <div class="card-wrap form-block p-0">
                            <div class="block-header p-4">
                                <h3>Finance Table</h3>
                                <div class="tbl-buttons">
                                    <ul class="mb-0 px-2">
                                        <li>
                                            <a href="{{url('reports/finance')}}">
                                                <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                    <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                        <div class="row">
                                            <div class="col-12 table-responsive table-details">
                                                <table class="table table-bordered table-responsive table-installment">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col" rowspan="2">S.N.</th>
                                                        @if(request('s_name'))
                                                            <th scope="col" rowspan="2">Name</th>
                                                        @endif
                                                        @if(request('student_id'))
                                                            <th scope="col" rowspan="2">Id</th>
                                                        @endif
                                                        @if(request('course_id'))
                                                            <th scope="col" rowspan="2">Course</th>
                                                        @endif
                                                        @if(request('batch'))
                                                            <th scope="col" rowspan="2">Batch</th>
                                                        @endif
                                                        @if(request('email'))
                                                            <th scope="col" rowspan="2">Email</th>
                                                        @endif
                                                        @if(request('mobile_no'))
                                                            <th scope="col" rowspan="2">Mobile No.</th>
                                                        @endif
                                                        @if(request('installment1'))
                                                            <th scope="col" colspan="5" text-align="center">Installment1</th>
                                                        @endif
                                                        @if(request('installment2'))
                                                            <th scope="col" colspan="5" align="center">Installment2</th>
                                                        @endif
                                                        @if(request('installment3'))
                                                            <th scope="col" colspan="5" align="center">Installment3</th>
                                                        @endif
                                                        <th scope="col" rowspan="2">Discount</th>
                                                        <th scope="col" rowspan="2">Total</th>
                                                    </tr>
                                                    <tr>
                                                        @if(request('installment1'))
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Due Date</th>
                                                            <th>Bank Status</th>
                                                            <th>Amount</th>
                                                        @endif
                                                        @if(request('installment2'))
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Due Date</th>
                                                            <th>Bank Status</th>
                                                            <th>Amount </th>
                                                        @endif
                                                        @if(request('installment3'))
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Due Date</th>
                                                            <th>Bank Status</th>
                                                            <th>Amount</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($settings as $setting)
                                                        @php
                                                            if(request('installment1')){
                                                                $installment1 = $installment1 + $setting->finances[0]->amount;
                                                            }
                                                            if(request('installment2')){
                                                                $installment2 = $installment2 + $setting->finances[1]->amount;
                                                            }
                                                            if(request('installment3')){
                                                                $installment3 = $installment3 + $setting->finances[2]->amount;
                                                            }
                                                            $discount = $discount + $setting->discount->amount;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            @if(request('s_name'))
                                                                <td>{{$setting->user->name}}</td>
                                                            @endif
                                                            @if(request('student_id'))
                                                                <td>{{$setting->student_id}}</td>
                                                            @endif
                                                            @if(request('course_id'))
                                                                <td>{{$setting->batch->time_slot->course->name}}</td>
                                                            @endif
                                                            @if(request('batch'))
                                                                <td>{{$setting->batch->name}}</td>
                                                            @endif
                                                            @if(request('email'))
                                                                <td>{{$setting->user->email}}</td>
                                                            @endif
                                                            @if(request('mobile_no'))
                                                                <td>{{$setting->student->mobile_no}}</td>
                                                            @endif

                                                            @if(request('installment1'))
                                                                <td>{{$setting->finances[0]->date}}</td>
                                                                @if($setting->finances[0]->status == 1)
                                                                    <td style="background-color: #ffff00;">Paid</td>
                                                                    <td style="background-color: #ffff00;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                                                                @endif
                                                                @if($setting->finances[0]->status == 2)
                                                                    <td>
                                                                        <a onclick="sendEmail({{$setting->finances[0]->id}})" class="d-flex align-items-center unpaid-email">
                                                                            <p class="deactive-button">UnPaid</p>
                                                                            <i class="fa-solid fa-envelope ms-2"></i>
                                                                        </a>
                                                                    </td>
                                                                    @if($setting->finances[0]->extend_date)
                                                                        <td style="background-color: #ffc107;">{{$setting->finances[0]->extend_date->due_date}}</td>
                                                                    @else
                                                                        <td style="background-color: #de1212;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                                                                    @endif
                                                                @endif
                                                                @if($setting->finances[0]->bank_status == 1)
                                                                    <td style="background-color: #1AAC4C;">Verified</td>
                                                                @endif
                                                                @if($setting->finances[0]->bank_status == 2)
                                                                    <td style="background-color: #c3bbbb;">Unverified</td>
                                                                @endif
                                                                <td align="center">{{sprintf("%.2f", $setting->finances[0]->amount)}}</td>
                                                            @endif

                                                            @if(request('installment2'))
                                                                <td>{{$setting->finances[1]->date}}</td>
                                                                @if($setting->finances[1]->status == 1)
                                                                    <td style="background-color: #ffff00;">Paid</td>
                                                                    <td style="background-color: #ffff00;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                                                                @endif
                                                                @if($setting->finances[1]->status == 2)
                                                                    <td>
                                                                        <a onclick="sendEmail({{$setting->finances[1]->id}})" class="d-flex align-items-center unpaid-email">
                                                                            <p class="deactive-button">UnPaid</p>
                                                                            <i class="fa-solid fa-envelope ms-2"></i>
                                                                        </a>
                                                                    </td>
                                                                    @if($setting->finances[1]->extend_date)
                                                                        <td style="background-color: #ffc107;">{{$setting->finances[1]->extend_date->due_date}}</td>
                                                                    @else
                                                                        <td style="background-color: #de1212;">{{$setting->finances[1]->batch_installment->due_date}}</td>
                                                                    @endif
                                                                @endif
                                                                @if($setting->finances[1]->bank_status == 1)
                                                                    <td style="background-color: #1AAC4C;">Verified</td>
                                                                @endif
                                                                @if($setting->finances[1]->bank_status == 2)
                                                                    <td style="background-color: #c3bbbb;">Unverified</td>
                                                                @endif
                                                                <td align="center">{{sprintf("%.2f", $setting->finances[1]->amount)}}</td>
                                                            @endif

                                                            @if(request('installment3'))
                                                                <td>{{$setting->finances[2]->date}}</td>
                                                                @if($setting->finances[2]->status == 1)
                                                                    <td style="background-color: #ffff00;">Paid</td>
                                                                    <td style="background-color: #ffff00;">{{$setting->finances[2]->batch_installment->due_date}}</td>
                                                                @endif
                                                                @if($setting->finances[2]->status == 2)
                                                                    <td>
                                                                        <a onclick="sendEmail({{$setting->finances[2]->id}})" class="d-flex align-items-center unpaid-email">
                                                                            <p class="deactive-button">UnPaid</p>
                                                                            <i class="fa-solid fa-envelope ms-2"></i>
                                                                        </a>
                                                                    </td>
                                                                    @if($setting->finances[2]->extend_date)
                                                                        <td style="background-color: #ffc107;">{{$setting->finances[2]->extend_date->due_date}}</td>
                                                                    @else
                                                                        <td style="background-color: #de1212;">{{$setting->finances[2]->batch_installment->due_date}}</td>
                                                                    @endif
                                                                @endif
                                                                @if($setting->finances[2]->bank_status == 1)
                                                                    <td style="background-color: #1AAC4C;">Verified</td>
                                                                @endif
                                                                @if($setting->finances[2]->bank_status == 2)
                                                                    <td style="background-color: #c3bbbb;">Unverified</td>
                                                                @endif
                                                                <td align="center">{{sprintf("%.2f", $setting->finances[2]->amount)}}</td>
                                                            @endif

                                                            <td align="center">{{sprintf("%.2f", $setting->discount->amount)}}</td>
                                                            @if(request('installment1') && request('installment2') && request('installment3'))
                                                                <td align="center">{{sprintf("%.2f", $setting->finances->sum('amount') - $setting->discount->amount)}}</td>
                                                            @elseif(request('installment1') && request('installment2'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount +  $setting->finances[1]->amount)- $setting->discount->amount)}}</td>
                                                            @elseif(request('installment1') && request('installment3'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount +  $setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                                                            @elseif(request('installment2') && request('installment3'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[1]->amount +  $setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                                                            @elseif(request('installment1'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount)- $setting->discount->amount)}}</td>
                                                            @elseif(request('installment2'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[1]->amount)- $setting->discount->amount)}}</td>
                                                            @elseif(request('installment3'))
                                                                <td align="center">{{sprintf("%.2f", ($setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        @if(request('s_name'))
                                                            <td></td>
                                                        @endif
                                                        @if(request('student_id'))
                                                            <td></td>
                                                        @endif
                                                        @if(request('course_id'))
                                                            <td></td>
                                                        @endif
                                                        @if(request('batch'))
                                                            <td></td>
                                                        @endif
                                                        @if(request('email'))
                                                            <td></td>
                                                        @endif
                                                        @if(request('mobile_no'))
                                                            <td></td>
                                                        @endif

                                                        @if(request('installment1'))
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Total</td>
                                                            <td align="center">{{$installment1}}</td>
                                                        @endif
                                                        @if(request('installment2'))
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="center">{{$installment2}}</td>
                                                        @endif
                                                        @if(request('installment3'))
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="center">{{$installment3}}</td>
                                                        @endif
                                                        <td align="center">{{$discount}}</td>
                                                        <td align="center">{{($installment1+$installment2+$installment3) - $discount}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Finance Modal -->
    <div class="modal fade" id="editFinanceModal" tabindex="-1" aria-labelledby="ModalLabelAddCourse" aria-hidden="true">
    </div>
    {{--    @include('admin.finance.finance_modal_edit')--}}
    @endsection
    @section('script')
    <script>
      function sendEmail(finance_id) {
          $.confirm({
              title: 'Do you sure want to send email?',
              content: false,
              type: 'red',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Yes',
                      btnClass: 'btn-red',
                      action: function(){
                              start_loader();
                              var formData = new FormData();
                              formData.append('finance_id', finance_id);
                              //start ajax call
                              $.ajax({
                                  /* the route pointing to the post function */
                                  type: 'POST',
                                  url: Laravel.url +"/send_due_email",
                                  dataType: 'json',
                                  data: formData,
                                  processData: false,  // tell jQuery not to process the data
                                  contentType: false,
                                  /* remind that 'data' is the response of the AjaxController */
                                  success: function (data) {
                                      end_loader();
                                      errorDisplay(data['message']);
                                  },
                                  error: function(error) {
                                      end_loader()
                                      errorDisplay('Something went wrong !');
                                  }
                              });
                              //end ajax call
                      }
                  },
                  close: function () {
                  }
              }
          });
      }
    </script>
@endsection
