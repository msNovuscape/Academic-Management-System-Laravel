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
                <div class='form-group mb-2'>
                    <div class="col-sm-9"  >
                        <label>
                            Are you an Australian permanent residence?
                        </label>
                        <div class="d-flex mt-2" onclick="validatepr()">
                            <div class="form-check pe-5">
                                <input class="form-check-input" type="radio" name="is_aus_permanent_resident" value="1"  @if($setting->is_aus_permanent_resident == 1) checked @endif>
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check pe-5">
                                <input class="form-check-input" type="radio" name="is_aus_permanent_resident"  value="2" @if($setting->is_aus_permanent_resident == 2) checked @endif/>
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                            <div id="auspr-error" class="error mt-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group mb-2'>
                    <div class="col-sm-9"  >
                        <label>
                            Are you currently living in Australia?
                        </label>
                        <div class="d-flex mt-2" onclick="validatecurrentcountry()">
                            <div class="form-check pe-5">
                                <input class="form-check-input" type="radio" name="is_living_in_aus" id="yes" value="1" @if($setting->is_living_in_aus == 1) checked @endif/>
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check pe-5">
                                <input class="form-check-input" type="radio" name="is_living_in_aus" id="no" value="2" @if($setting->is_living_in_aus == 2) checked @endif/>
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                            <div id="ausliving-error" class="error mt-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Currently Living Country</label>
                    <div class="col-sm-7">
                        <div class="input-group dropdown-country">
                            <select class="form-select dropdown-default selectpicker" id="livingcountry" onchange="validatelivingcountry()" name="country_of_living">
                                @foreach($countries as $country)
                                    <option hidden class='course-placeholder' value="" >Select currently living country</option>
                                    <option value="{{$country->id}}"  @if($setting->country_of_living  === $country->id) selected @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-prepend">
                                <div class="input-group-text" onclick="getMinDate()">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                            </div>
                        </div>
                        <div id="currcountry-error" class="error">

                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label  class="col-sm-5 col-form-label">Visa Type</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Enter your visa type" name='visa_type' value="{{$setting->visa_type}}"  id="visaType" onkeyup="validatecurrentvisaType()"/>
                        <div id="visatype-error" class="error">

                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Passport Number</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Enter your valid passport number" name='passport_number' value="{{$setting->passport_number}}"  id="passportNum" onkeyup="validatepassportNum()"/>
                        <div id="passportnum-error" class="error">

                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Passport Expiry Date</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input name="passport_expiry_date" type="text" class="form-control dob" id="passexp"  placeholder="Select your passport expiry date" onchange="validatepassexp()" onkeyup="getExpDate()" value="{{$setting->passport_expiry_date}}"/>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                </div>
                            </div>
                        </div>
                        <div id="passportexp-error" class="error">

                        </div>
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
            <div class="form-group row mb-2">
                <label class="col-sm-5 col-form-label">Full Name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="e_contact_name" value="{{$setting->e_contact_name}}" placeholder="Enter Full Name" id="fullname" onkeyup="validatefullname()"/>
                    <div id="fullname-error" class="error">

                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-5 col-form-label">Relation  to Student</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="relation" value="{{$setting->relation}}" placeholder="Enter Relationship to Student" id="relation" onkeyup="validaterelation()"/>
                    <div id="relation-error" class="error">

                    </div>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label class="col-sm-5 col-form-label">Contact No</label>
                <div class="col-sm-7">
                    <input type="number" class="form-control" name="e_contact_no" value="{{$setting->e_contact_no}}" placeholder="Enter Contact Number"  id="contact" onkeyup="validatecontact()"/>
                    <div id="contact-error" class="error">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-submit">
        <button class="detail-student-btn" type="submit">Save & Continue <i class="fa-solid fa-angles-right"></i></button>
    </div>
</div>
