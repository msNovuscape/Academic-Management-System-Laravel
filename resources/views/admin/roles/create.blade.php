@extends('layouts.app')
@section('title')
    <title>Roles</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Roles</h4>
                                <p>
                                    You can add give access according to the following roles.
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                                <li>Roles</li>
                            </ul>
                        </div>
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            {!! Form::open(['url' => 'roles', 'method' => 'POST' ,'onsubmit' => 'return validateForm()']) !!}
                                <div class="card-wrap form-block p-0">
                                    <div class="row">
                                        <div class="role-form">
                                            <div class="col-md-4">
                                                <div class="role-name-input">
                                                    <label for="" class="form-label">Role Name</label>
                                                    <input type="text" name="name" class="form-control"  value="{{old('name')}}" required>
                                                </div>
                                            </div>
                                            <div class="tbl-buttons">
                                                <ul>
                                                    <li>
                                                        <a href="{{url('roles')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row role-table">
                                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                            <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
                                                <div class="row">
                                                    <div class="col-12 table-responsive table-details">
                                                        <table class="table" id="">
                                                            <thead>
                                                            <tr>
                                                                <th>S.N.</th>
                                                                <th>Name</th>
                                                                <th>
                                                                    <div class="d-flex">
                                                                        <div class="tblform-check">
                                                                            <input class="form-check-input-master" type="checkbox" value="" id="selectall-create">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                        <div>
                                                                            Create
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th><div class="d-flex">
                                                                        <div class="tblform-check">
                                                                            <input class="form-check-input-master" type="checkbox" value="" id="selectall-show">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                        <div>
                                                                            Read
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex">
                                                                        <div class="tblform-check">
                                                                            <input class="form-check-input-master" type="checkbox" value="" id="selectall-update">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                        <div>
                                                                            Update
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex">
                                                                        <div class="tblform-check">
                                                                            <input class="form-check-input-master" type="checkbox" value="" id="selectall-delete">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                        <div>
                                                                            Delete
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex">
                                                                        <div class="tblform-check">
                                                                            <input class="form-check-input-master" type="checkbox" value="" id="selectall-report">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                        <div>
                                                                            Report
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="student_list">
                                                            @foreach($settings as $setting)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$setting->common_name}}</td>
                                                                    <td>
                                                                        <div class="tblform-check">
                                                                            <input name="create_p[]" class="form-check-input-master checkbox-create" type="checkbox" value="{{$permissions->where('slug', 'create_'.$setting->table_name)->first()->id}}">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="tblform-check">
                                                                            <input name="show_p[]" class="form-check-input-master checkbox-show" type="checkbox" value="{{$permissions->where('slug', 'show_'.$setting->table_name)->first()->id}}">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="tblform-check">
                                                                            <input name="update_p[]" class="form-check-input-master checkbox-update" type="checkbox" value="{{$permissions->where('slug', 'update_'.$setting->table_name)->first()->id}}">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="tblform-check">
                                                                            <input name="delete_p[]" class="form-check-input-master checkbox-delete" type="checkbox" value="{{$permissions->where('slug', 'delete_'.$setting->table_name)->first()->id}}">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="tblform-check">
                                                                            <input name="report_p[]" class="form-check-input-master checkbox-report" type="checkbox" value="{{$permissions->where('slug', 'report_'.$setting->table_name)->first()->id}}">
                                                                            <label class="form-check-label" for="flexCheckDefault"></label>
                                                                        </div>
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
                                </div>
                                <div class="row mt-4">
                                    <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                        <div class="row">
                                            <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                <a href="{{url('roles')}}">
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

        function validateForm() {
            var createLength = document.querySelectorAll('.checkbox-create:checked').length;
            var showLength = document.querySelectorAll('.checkbox-show:checked').length;
            var updateLength = document.querySelectorAll('.checkbox-update:checked').length;
            var deleteLength = document.querySelectorAll('.checkbox-delete:checked').length;
            var reportLength = document.querySelectorAll('.checkbox-report:checked').length;

            if(createLength > 0 || showLength > 0 || updateLength > 0 || deleteLength > 0 || reportLength > 0) {
                return  true;
            }else {
                errorDisplay('Please select at least one permission!');
                return false;
            }
        }

        //start for create
            var select_all_create = document.getElementById("selectall-create"); //select all checkbox
            var checkboxes_create = document.getElementsByClassName("checkbox-create"); //checkbox items
            //select all checkboxes_create
            select_all_create.addEventListener("change", function(e){
                for (i = 0; i < checkboxes_create.length; i++) {
                    checkboxes_create[i].checked = select_all_create.checked;
                    if(this.checked == true){
                        var id = checkboxes_create[i].value;
                    }
                    if(this.checked == false){
                        var id = checkboxes_create[i].value;
                    }
                    // console.log(checkboxes_create[i].value)
                }
            });
            for (var i = 0; i < checkboxes_create.length; i++) {
                checkboxes_create[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all_create.checked = false;
                        var id = $(this).val();
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox-create:checked').length == checkboxes_create.length){
                        select_all_create.checked = true;
                    }
                });
            }
        //end for create

        //start for show
            var select_all_show = document.getElementById("selectall-show"); //select all checkbox
            var checkboxes_show = document.getElementsByClassName("checkbox-show"); //checkbox items
            //select all checkboxes_show
            select_all_show.addEventListener("change", function(e){
                for (i = 0; i < checkboxes_show.length; i++) {
                    checkboxes_show[i].checked = select_all_show.checked;
                    if(this.checked == true){
                        var id = checkboxes_show[i].value;
                    }
                    if(this.checked == false){
                        var id = checkboxes_show[i].value;
                    }
                    // console.log(checkboxes_show[i].value)
                }
            });
            for (var i = 0; i < checkboxes_show.length; i++) {
                checkboxes_show[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all_show.checked = false;
                        var id = $(this).val();
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox-show:checked').length == checkboxes_show.length){
                        select_all_show.checked = true;
                    }
                });
            }
        //end for show

        //start for update
            var select_all_update = document.getElementById("selectall-update"); //select all checkbox
            var checkboxes_update = document.getElementsByClassName("checkbox-update"); //checkbox items
            //select all checkboxes_update
            select_all_update.addEventListener("change", function(e){
                for (i = 0; i < checkboxes_update.length; i++) {
                    checkboxes_update[i].checked = select_all_update.checked;
                    if(this.checked == true){
                        var id = checkboxes_update[i].value;
                    }
                    if(this.checked == false){
                        var id = checkboxes_update[i].value;
                    }
                    // console.log(checkboxes_update[i].value)
                }
            });
            for (var i = 0; i < checkboxes_update.length; i++) {
                checkboxes_update[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all_update.checked = false;
                        var id = $(this).val();
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox-update:checked').length == checkboxes_update.length){
                        select_all_update.checked = true;
                    }
                });
            }
        //end for update

        //start for delete
            var select_all_delete = document.getElementById("selectall-delete"); //select all checkbox
            var checkboxes_delete = document.getElementsByClassName("checkbox-delete"); //checkbox items
            //select all checkboxes_delete
            select_all_delete.addEventListener("change", function(e){
                for (i = 0; i < checkboxes_delete.length; i++) {
                    checkboxes_delete[i].checked = select_all_delete.checked;
                    if(this.checked == true){
                        var id = checkboxes_delete[i].value;
                    }
                    if(this.checked == false){
                        var id = checkboxes_delete[i].value;
                    }
                    // console.log(checkboxes_delete[i].value)
                }
            });
            for (var i = 0; i < checkboxes_delete.length; i++) {
                checkboxes_delete[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all_delete.checked = false;
                        var id = $(this).val();
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox-delete:checked').length == checkboxes_delete.length){
                        select_all_delete.checked = true;
                    }
                });
            }
        //end for delete

        //start for report
            var select_all_report = document.getElementById("selectall-report"); //select all checkbox
            var checkboxes_report = document.getElementsByClassName("checkbox-report"); //checkbox items
            //select all checkboxes_report
            select_all_report.addEventListener("change", function(e){
                for (i = 0; i < checkboxes_report.length; i++) {
                    checkboxes_report[i].checked = select_all_report.checked;
                    if(this.checked == true){
                        var id = checkboxes_report[i].value;
                    }
                    if(this.checked == false){
                        var id = checkboxes_report[i].value;
                    }
                    // console.log(checkboxes_report[i].value)
                }
            });
            for (var i = 0; i < checkboxes_report.length; i++) {
                checkboxes_report[i].addEventListener('change', function(e){ //".checkbox" change
                    //uncheck "select all", if one of the listed checkbox item is unchecked
                    if(this.checked == false){
                        select_all_report.checked = false;
                        var id = $(this).val();
                    }
                    //check "select all" if all checkbox items are checked
                    if(document.querySelectorAll('.checkbox-report:checked').length == checkboxes_report.length){
                        select_all_report.checked = true;
                    }
                });
            }
        //end for report
    </script>
@endsection
