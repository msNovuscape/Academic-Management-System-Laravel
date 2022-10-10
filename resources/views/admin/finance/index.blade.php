@extends('layouts.app')
@section('title')
    <title>Finance</title>
@endsection
@section('main-panel')
    <div class="main-panel">
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
                    <form id="search2">
                        <div class="filter-btnwrap my-2">
                            <div class="col-md-12">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-solid fa-book-open"></i>
                                            </span>
                                            <select class="form-select" aria-label="Default select example" name="course_id" onchange="filterList2()">
                                                <option selected disabled >Search by courses</option>
                                                @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span>
                                                <i class="fa-solid fa-book-open"></i>
                                            </span>
                                            <select class="form-select" aria-label="Default select example" name="batch_id" onchange="filterList2()">
                                                <option selected disabled >Search by Batch</option>
                                                @foreach($batches as $batch)
                                                    <option value="{{$batch->id}}">{{$batch->name}}</option>
                                                @endforeach
                                            </select>
                                            <span>
                                                <i class="fa-solid fa-caret-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4">
                        <div class="card-wrap form-block p-0">
                            <div class="block-header bg-header d-flex justify-content-between p-4">
                                <div class="d-flex flex-column">
                                    <h3>Finance Table</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                    <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                        <div class="row">
                                            <div class="col-12 table-responsive table-details">
                                                <table class="table table-bordered table-installment mb-0" id="">
                                                    <thead>
                                                    <tr>
                                                            <th rowspan="2">S.N.</th>
                                                            <th>
                                                                <div class="filter-btnwrap d-flex flex-column">
                                                                    <label>Name</label>
                                                                </div>
                                                            </th>
                                                            <th rowspan="2">
                                                                <div class="filter-btnwrap d-flex flex-column">
                                                                    <label>Course/Batch</label>
                                                                </div>
                                                            </th>
                                                            <th colspan="2">
                                                                <div class="filter-btnwrap d-flex flex-column">
                                                                    <label>Installment 1</label>
                                                                </div>
                                                            </th>
                                                            <th colspan="2">
                                                                <div class="filter-btnwrap d-flex flex-column">
                                                                    <label>Installment 2</label>
                                                                </div>
                                                            </th>
                                                            <th colspan="2">
                                                                <div class="filter-btnwrap d-flex flex-column">
                                                                    <label>Installment 3</label>
                                                                </div>
                                                            </th>
                                                            <th rowspan="2">Action</th>
                                                    </tr>
                                                    <tr>
                                                        <form id="search">
                                                            <th>
                                                                <div class="filter-btnwrap">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="inputText" placeholder="Search by name or id" name="name" value="{{request('name')}}" onchange="filterList()">
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_status1"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Paid</option>
                                                                            <option value="2">Unpaid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_bank_status1"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Verified</option>
                                                                            <option value="2">Unverified</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_status2"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Paid</option>
                                                                            <option value="2">Unpaid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_bank_status2"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Verified</option>
                                                                            <option value="2">Unverified</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_status3"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Paid</option>
                                                                            <option value="2">Unpaid</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <select class="form-select select-table" name="installment_bank_status3"  onchange="filterList()">
                                                                            <option selected disabled readonly=""></option>
                                                                            <option value="1">Verified</option>
                                                                            <option value="2">Unverified</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </form>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="student_list">
                                                        @foreach($settings as $setting)
                                                        <tr>
                                                            <td>{{$settings->firstItem() + $loop->index}}</td>
                                                            <td class="">
                                                                <div class="d-flex">
                                                                    <div class="table-image">
                                                                        <img src="{{url('images/profile.png')}}" alt=""/>
                                                                    </div>
                                                                    <div class="d-flex flex-column name-table">
                                                                        <p>{{$setting->user->name}}</p>
                                                                        <p>{{$setting->student_id}}</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="mb-0">{{$setting->batch->time_slot->course->name}}</p>
                                                                <p class="mb-0">{{$setting->batch->name}}</p>
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[0]->status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="active-button">paid</p>
                                                                    </a>
                                                                @endif
                                                                @if($setting->finances[0]->status == 2)
                                                                    <a  onclick="sendEmail({{$setting->finances[0]->id}})" class="d-flex align-items-center unpaid-email">
                                                                        <p class="deactive-button">UnPaid</p>
                                                                        <i class="fa-solid fa-envelope ms-2"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[0]->bank_status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="verified-button">Verified</p>
                                                                    </a>
                                                                @endif
                                                                    @if($setting->finances[0]->bank_status == 2)
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                            <p class="unverified-button">Unverified</p>
                                                                        </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[1]->status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="active-button">paid</p>
                                                                    </a>
                                                                @endif
                                                                @if($setting->finances[1]->status == 2)
                                                                    <a onclick="sendEmail({{$setting->finances[1]->id}})" class="d-flex align-items-center unpaid-email">
                                                                        <p class="deactive-button">UnPaid</p>
                                                                        <i class="fa-solid fa-envelope ms-2"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[1]->bank_status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="verified-button">Verified</p>
                                                                    </a>
                                                                @endif
                                                                @if($setting->finances[1]->bank_status == 2)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="unverified-button">Unverified</p>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[2]->status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="active-button">paid</p>
                                                                    </a>
                                                                @endif
                                                                @if($setting->finances[2]->status == 2)
                                                                    <a onclick="sendEmail({{$setting->finances[2]->id}})" class="d-flex align-items-center unpaid-email">
                                                                        <p class="deactive-button">UnPaid</p>
                                                                        <i class="fa-solid fa-envelope ms-2"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($setting->finances[2]->bank_status == 1)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="verified-button">Verified</p>
                                                                    </a>
                                                                @endif
                                                                @if($setting->finances[2]->bank_status == 2)
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="unverified-button">Unverified</p>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td class="action-icons">
                                                                <ul class="icon-button d-flex">
                                                                    @if($setting->student)
                                                                        <li>
                                                                            <a class="dropdown-item" href="{{url('finances/'.$setting->student->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                                                                        </li>
                                                                    @endif
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{url('finances/'.$setting->id.'/edit')}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pagination-section">
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
        function myFunction(id)
        {
            document.getElementById("myDropdown"+id).classList.toggle("show");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn_try')) {
                var dropdowns = document.getElementsByClassName("dropdown-content_try");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        function showModal(id) {
            $('#modalEditTimeTable'+id).modal('show');
        }

        function getFinanceEditModal(id) {
            var admission_id = id;
            $.ajax({
                type:'GET',
                url:Laravel.url+'/finances/edit/'+admission_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    $('#myModal').remove();
                    $('#editFinanceModal').append(data['html']);
                    $('#editFinanceModal').modal('show');
                    $(".getDate").flatpickr({
                        dateFormat: "Y-m-d"
                    });
                },
                error: function (error){
                    errorDisplay('Something went worng !');
                }
            });

        }

        function closeModal() {
            $('#myModal').remove();
            $('#editFinanceModal').modal('hide');
        }

        function editFinance(id) {
            var finance_id = id;
            var amount = $('#amount'+id).val();
            var date = $('#date'+id).val();
            var payment_status = $('#payment_status'+id).val();
            if(amount == ''){
                $('#amount'+id).focus();
                return false
            }
            if(date == ''){
                $('#date'+id).focus();
                return false
            }
            if(payment_status == ''){
                $('#payment_status'+id).focus();
                return false
            }
            var formData = new FormData();
            formData.append('amount', amount);
            formData.append('date', date);
            formData.append('payment_status', payment_status);
            $.ajax({
                type:'POST',
                url:Laravel.url+'/finances/update/'+finance_id,
                dataType: 'json',
                data: formData,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    window.location.href = Laravel.url+'/finances';
                },
                error: function (error){
                    errorDisplay('Something went worng !');
                }
            });
        }

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
                                    end_loader();
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
