@extends('layouts.app')
@section('title')
    <title>Fiscal Year</title>
@endsection
@section('main-panel')
<div class="main-panel w-100">
    <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 stretch-card">
                        <div class="card-wrap form-block p-0">
                            <div class="block-header p-4 d-flex justify-content-between block-header-pdf">
                                <a class="navbar-brand brand-logo-mini" href="index.html">
                                    <img src="http://127.0.0.1:8000/images/ET-Minilogo.png" alt="logo">
                                </a>
                                <div class="pdf-heading">
                                    <h4>EXTRATECH</h4>
                                </div>
                                <div class="d-flex flex-column justify-content-end pdf-email">
                                    <div class="d-flex">
                                    <h6>Email:&nbsp;&nbsp;</h6><p>info@extratechs.com.au</p>
                                    </div>
                                    <div class="d-flex">
                                    <h6>Phone:&nbsp;&nbsp;</h6><p>987654321</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-4">
                                <div class="col-md-4">
                                    <div class="form-group batch-form">
                                        <div class="col-md-12">
                                            <div class="row align-items-baseline">
                                                <div class="col-md-3">
                                                    <label for="exampleInputEmail1">From Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <p>2022-07-27</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group batch-form">
                                        <div class="col-md-12">
                                            <div class="row align-items-baseline">
                                                <div class="col-md-3">
                                                    <label for="exampleInputEmail1">To Date</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <p>2022-07-27</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 stretch-card mt-4">
                                <div class="card-wrap form-block p-0">  
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
                                                                <form id="search"></form>
                                                                    <th>
                                                                        <div class="filter-btnwrap">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" id="inputText" placeholder="Search" name="name" value="" onchange="filterList()">
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_status1" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Paid</option>
                                                                                    <option value="2">Unpaid</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_bank_status1" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Verified</option>
                                                                                    <option value="2">Unverified</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_status2" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Paid</option>
                                                                                    <option value="2">Unpaid</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_bank_status2" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Verified</option>
                                                                                    <option value="2">Unverified</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_status3" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Paid</option>
                                                                                    <option value="2">Unpaid</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <th>
                                                                        <div class="">
                                                                            <div class="input-group">
                                                                                <select class="form-select select-table" name="installment_bank_status3" onchange="filterList()">
                                                                                    <option selected="" disabled="" readonly=""></option>
                                                                                    <option value="1">Verified</option>
                                                                                    <option value="2">Unverified</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody id="student_list">
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td class="d-flex">
                                                                        <div class="table-image">
                                                                            <img src="http://127.0.0.1:8000/images/profile.png" alt="">
                                                                        </div>
                                                                        <div class="d-flex flex-column name-table">
                                                                            <p>Pooja Pandey</p>
                                                                            <p>ET2022073</p>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">Advanced Laravel</p>
                                                                        <p>AL-2022-1</p>
                                                                    </td>
                                                                    <td>                                                              
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                            <p class="active-button">paid</p>
                                                                        </a>                                                                                                                             
                                                                    </td>
                                                                    <td>                                                                                                                                
                                                                    </td>
                                                                    <td>                                                                                                                                  
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                        <p class="deactive-button">Unpaid</p>
                                                                    </a>                                                            
                                                                    </td>
                                                                    <td>                                                                                                                            
                                                                    </td>
                                                                    <td>                                                                                                                                  
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                                                            <p class="deactive-button">Unpaid</p>
                                                                        </a>                                                      
                                                                    </td>
                                                                    <td>                                                                                                                              
                                                                    </td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button">                                                             
                                                                            <li>
                                                                                <a class="dropdown-item" href="http://127.0.0.1:8000/finances/3/edit" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
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
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $("#from_date").flatpickr({
        dateFormat: "Y-m-d"
    });
    function getMinDate(){
        var min_date = $('#from_date').val();
        if(min_date != ''){
            $('#to_date').flatpickr({
                minDate: min_date,
                dateFormat: 'Y-m-d',
            });
        }
    }
</script>
@endsection


