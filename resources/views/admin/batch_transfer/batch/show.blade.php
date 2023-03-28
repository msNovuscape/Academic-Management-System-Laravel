@extends('layouts.app')
@section('title')
    <title>Batch Transfer</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>{{$batch->time_slot->course->name}}</h3>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('batch-transfers/course/'.$batch->time_slot->course->id)}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::open(['url' => 'batch-transfers/batch/'.$batch->id,'method' => 'POST', 'onsubmit' => 'return validateForm()']) !!}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group batch-form">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Batch</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{$batch->name_other}}">
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
                                                        <label>Transfer To</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select name="transfer_batch_id" id="transfer_batch_id" class="form-control" required>
                                                                <option value=""  selected disabled class="option">Please Select the Batch To Transfer</option>
                                                                @foreach($transferBatches as $transferBatch)
                                                                    <option value="{{$transferBatch->id}}" @if(old('transfer_batch_id') == $transferBatch->id) selected @endif class="option">
                                                                        {{$transferBatch->name_other}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 stretch-card mt-4" id="material_select">
                                        <div class="card-wrap form-block p-0">
                                            <div class="block-header bg-header d-flex justify-content-between p-4">
                                                <div class="d-flex flex-column">
                                                    <h3>Please select the student to transfer batch</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                                    <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                                        <div class="row">
                                                            <div class="col-12 table-responsive table-details">
                                                                <table class="table" id="">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div class="form-check" onclick="allCheck()">
                                                                                <input class="form-check-input" type="checkbox" value="" id="select_all">
                                                                                <label class="form-check-label" for="selectAll">
                                                                                    Select All
                                                                                </label>
                                                                            </div>
                                                                        </th>
                                                                        <th>S.N.</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Transfer Status</th>
                                                                        <th>Transfer Date</th>
                                                                        <th>Admission Date</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="student_list">
                                                                    @foreach($batch->admissions as $admission)
                                                                        @if ($admission->batch_transfer_status == 2)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-check ms-1">
                                                                                        <input class="form-check-input checkbox" type="checkbox" value="{{$admission->id}}"  name="admissionId[]" onclick="allCheck()">
                                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{$loop->iteration}}</td>
                                                                                <td class="">
                                                                                    <div class="d-flex">
                                                                                        <div class="table-image">
                                                                                            @if($admission->student)
                                                                                                <img src="{{url($admission->student->image)}}" alt=""/>
                                                                                            @else
                                                                                                <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="d-flex flex-column name-table">
                                                                                            <p>{{$admission->user->name}}</p>
                                                                                            <p>{{$admission->student_id}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    {{$admission->user->email}}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    No
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    -
                                                                                </td>
                                                                                <td>{{$admission->date}}</td>
                                                                            </tr>
                                                                        @else
                                                                            <tr class="batch-transfer-indication">
                                                                                <td>
                                                                                    <div class="form-check ms-1">
                                                                                        <input class="form-check-input checkbox" type="checkbox" value="{{$admission->id}}"  name="admissionId[]" onclick="allCheck()">
                                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                                        </label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{$loop->iteration}}</td>
                                                                                <td class="">
                                                                                    <div class="d-flex">
                                                                                        <div class="table-image">
                                                                                            @if($admission->student)
                                                                                                <img src="{{url($admission->student->image)}}" alt=""/>
                                                                                            @else
                                                                                                <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="d-flex flex-column name-table">
                                                                                            <p>{{$admission->user->name}}</p>
                                                                                            <p>{{$admission->student_id}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    {{$admission->user->email}}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{$admission->activeBatchTransfer->first()->batch->name_other}}

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{$admission->activeBatchTransfer->first()->date}}
                                                                                </td>
                                                                                <td>{{$admission->date}}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-section d-flex justify-content-end mt-4">
                                        <a href="{{url('batch-transfers/course/'.$batch->time_slot->course->id)}}">
                                            <button type="button">
                                                Skip
                                                <i class="fa-solid fa-angles-right"></i>
                                            </button>
                                        </a>

                                        <button>
                                            Transfer & Continue
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

        function allCheck() {
            var select_all = document.getElementById("select_all"); //select all checkbox
            var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
            //select all checkboxes
            select_all.addEventListener("change", function(e){
                for (i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = select_all.checked;
                }
            });


            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all.checked = false;
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                        select_all.checked = true;
                    }
                });
            }
        }

        function validateForm() {
            start_loader();
        }

    </script>

@endsection
