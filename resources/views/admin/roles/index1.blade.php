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
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="row role-form">
                                    <div class="col-md-4">
                                        <div class="role-name-input">
                                            <label for="" class="form-label">Name </label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="role-select">
                                            <label for="" class="form-label">Role </label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option hidden>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="role-radios">
                                            <label for="" class="form-label">Personal Role </label>
                                            <div class="d-flex gap-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Allow
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Disallow
                                                    </label>
                                                </div>
                                            </div>
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
                                                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall_create">
                                                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                                                    </div>
                                                                    <div>
                                                                        Create
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <th><div class="d-flex">
                                                                    <div class="tblform-check">
                                                                        <input class="form-check-input-master" type="checkbox" value="" id="">
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
                                                                        <input class="form-check-input-master" type="checkbox" value="" id="">
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
                                                                        <input class="form-check-input-master" type="checkbox" value="" id="">
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
                                                                        <input class="form-check-input-master" type="checkbox" value="" id="">
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
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Finance</td>
                                                            <td>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input-master" type="checkbox" value="" id="">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input-master" type="checkbox" value="" id="">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input-master" type="checkbox" value="" id="">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input-master" type="checkbox" value="" id="">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="tblform-check">
                                                                    <input class="form-check-input-master" type="checkbox" value="" id="">
                                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="pagination-section">
                                                            {{-- {{$settings->links()}} --}}
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
@section('scripts')
    <script>
        var selectall_create = document.getElementById("selectall_create"); //select all checkbox
        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

        //select all checkboxes
        selectall_create.addEventListener("change", function(e){
            for (i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = selectall_create.checked;
                if(this.checked == true){
                    var id = checkboxes[i].value;
                    $('#student_row'+id).addClass('student active')
                }
                if(this.checked == false){
                    var id = checkboxes[i].value;
                    $('#student_row'+id).removeClass('student active')
                }
                // console.log(checkboxes[i].value)
            }
        });
    </script>
@endsection
