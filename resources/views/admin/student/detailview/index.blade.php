@if(isset($edit_status))
<div class=" general-forms mt-4" id="detailForm" style="display: none">
@else
    <div class=" general-forms" id="detailForm">
@endif
    <div class="row">
        <span class="student-details-edit">
            <i class="fa-solid fa-pencil"></i>
            <a role="button" onclick="getEdit()" href="#">Edit</a>
        </span>
        <div class="col-md-6">
            <div class="p-3 general-settings">
                <div class='row'>
                    <div class='col general-first'>
                        <h1>General Settings</h1>
                        <p>Student personal information</p>
                    </div>
                    <div class='col general-last'>
                        <div>
                            <h1>Start | Added On</h1>
                            <p>{{$setting->admission->date}}</p>
                        </div>
                    </div>
                    <div class='mt-3'>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label"><i class="fa-solid fa-circle-user text-center"></i>&nbsp; First Name</label>
                            <div class="col-sm-7">
                                <h1>{{$setting->admission->user->name}}</h1>
                            </div>
                        </div>
                        <div class='form-group row mb-2 student-details'>
                            <label class='col-sm-5 col-form-label'>
                                <i class="fa-solid fa-user"></i>&nbsp; Gender
                            </label>
                            <div class="col-sm-7 "  >
                                <h1>{{config('custom.genders')[$setting->gender]}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-phone"></i>&nbsp; Phone
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->mobile_no}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-envelope"></i>&nbsp; Email
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->admission->user->email}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-calendar-days"></i>&nbsp; Date of Birth
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->dob}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-envelope-circle-check"></i>&nbsp; Postal Code
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->post_code}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-location-dot"></i>&nbsp; Residental Address
                             </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->residential_address}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">State</label>
                            <div class="col-sm-7">
                                <h1>{{$setting->state}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 mt-3 signature-settings">
                <div class='col general-first'>
                    <h1>Signature  and Acceptance </h1>
                    <p>Student’s full name as a signature</p>
                </div>
                <div class='mt-3'>
                    <div class="form-group row mb-2 student-details">
                        <label class="col-sm-5 col-form-label">Signature</label>
                        <div class="col-sm-7">
                            <h1>{{$setting->signature}}</h1>
                        </div>
                    </div>
                    <div class='terms-policy'>
                        <div class='col residency-first'>
                            <a href="#">Terms & Condition</a>
                        </div>
                        <div class='col residency-last'>
                            <a href="#">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 residency-information">
                <div class='row'>
                    <div class='col residency-first'>
                        <h1>Residency Information</h1>
                        <p>Residential information</p>
                    </div>
                    <div class='col residency-last'>
                        <div>
                            <h1>Start | Added On</h1>
                            <p>{{$setting->admission->date}}</p>
                        </div>
                    </div>
                    <div class='mt-3'>
                        <div class='form-group mb-2 student-details'>
                            <div class="col-sm-9"  >
                                <label>
                                    Are you an Australian permanent residence?
                                </label>
                                <div class="d-flex mt-2">
                                    <h1>{{config('custom.states')[$setting->is_aus_permanent_resident]}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class='form-group mb-2 student-details'>
                            <div class="col-sm-9"  >
                                <label>
                                    Are you currently living in Australia?
                                </label>
                                <div class="d-flex mt-2">
                                    <h1>{{config('custom.states')[$setting->is_living_in_aus]}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-font-awesome"></i>&nbsp; Currently Living Country
                            </label>
                            <div class="col-sm-7">
                                  <h1>{{$setting->country->name}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label  class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-book-bookmark"></i>&nbsp; Visa Type
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->visa_type}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">
                                <i class="fa-solid fa-passport"></i>&nbsp; Passport Number
                            </label>
                            <div class="col-sm-7">
                                <h1>{{$setting->passport_number}}</h1>
                            </div>
                        </div>
                        <div class="form-group row mb-2 student-details">
                            <label class="col-sm-5 col-form-label">Passport Expiry Date</label>
                            <div class="col-sm-7">
                                <h1>{{$setting->passport_expiry_date}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3 mt-3 emergency-settings">
                <div class='col general-first'>
                    <h1>Emergency Contact</h1>
                    <p>Emergency contact of student</p>
                </div>
                <div class='mt-3'>
                    <div class="form-group row mb-2 student-details">
                        <label class="col-sm-5 col-form-label">Full Name</label>
                        <div class="col-sm-7">
                            <h1>{{$setting->e_contact_name}} </h1>
                    </div>
                    <div class="form-group row mb-2 student-details">
                        <label class="col-sm-5 col-form-label">Relation  to Student</label>
                        <div class="col-sm-7">
                            <h1>{{$setting->relation}} </h1>
                        </div>
                    </div>
                    <div class="form-group row mb-2 student-details">
                        <label class="col-sm-5 col-form-label">Contact No</label>
                        <div class="col-sm-7">
                            <h1>{{$setting->e_contact_no}} </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
