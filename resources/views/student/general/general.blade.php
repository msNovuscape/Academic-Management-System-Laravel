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
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Enter your First Name" id="fname" onkeyup="validatefname()" name="name" value="{{$setting->admission->user->name}}">
                            <input type="hidden" class="form-control"   name="id" value="{{$setting->admission->user->id}}">
                            <span id="fname-error" class="error">

                            </span>
                        </div>
                    </div>
                    <div class='form-group row mb-2'>
                        <label class='col-sm-5 col-form-label'>
                            Gender
                        </label>
                        <div class="col-sm-7 "  onclick="validategender()">
                            <div class="d-flex">
                                <div class="form-check pe-2">
                                    <input class="form-check-input" type="radio" name="gender" value="1" id="gender" @if($setting->gender == 1) checked @endif>
                                    <label class="form-check-label">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check pe-2">
                                    <input class="form-check-input" type="radio" name="gender" value="2" id="gender" @if($setting->gender == 2) checked @endif/>
                                    <label class="form-check-label">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="2" id="gender" @if($setting->gender == 3) checked @endif/>
                                    <label class="form-check-label">
                                        Other
                                    </label>
                                </div>

                            </div>
                            <div id="gender-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="mobile_no" value="{{$setting->mobile_no}}" placeholder="Enter your Mobile Number" id="mobnum" onkeyup="validatemobnum()"/>
                            <div id="mobile-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input  type="email" class="form-control" placeholder="Enter your E-mail Address" name="email" value="{{$setting->admission->user->email}}"  id="email" onkeyup="validateemail()"/>
                            <div id="email-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Date of Birth </label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input name="dob" value="{{$setting->dob}}" type="text" class="form-control dob" id="dob"  placeholder="Select your date of birth" onchange="validatedob()" onkeyup="getMinDate()"/>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" onclick="getMinDate()">
                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                    </div>
                                </div>
                            </div>
                            <div id="dob-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Currently of Birth</label>
                        <div class="col-sm-7">
                            <div class="input-group dropdown-country">
                                <select class="form-select dropdown-default selectpicker" name="country_of_birth" id="cob" onchange="validatecob()">
                                    @foreach($countries as $country)
                                        <option hidden class='course-placeholder' value="" >Select currently living country</option>
                                        <option value="{{$country->id}}"  @if($setting->country_of_birth  === $country->id) selected @endif>{{$country->name}}</option>
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
                        <label class="col-sm-5 col-form-label">Postal Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="post_code" value="{{$setting->post_code}}" placeholder="Enter your Postcode" id="postcode" onkeyup="validatepostcode()"/>
                            <div id="postcode-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Residential Address</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="residential_address" value="{{$setting->residential_address}}" placeholder="Enter your Residential Address" id="resaddress" onkeyup="validateresaddress()"/>
                            <div id="resaddress-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">State</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="state" value="{{$setting->state}}" placeholder="Enter your State" id="state" onkeyup="validatestate()"/>
                            <div id="state-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Commencement Date</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input name="commencement_date" value="{{$setting->commencement_date}}" type="text" class="form-control getDate" id="commdate"  placeholder="Select your commencement date" onchange="validatecommdate()"/>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="{{url('images/calender-icon.png')}}" alt="calender-icon"/>
                                    </div>
                                </div>
                            </div>
                            <div id="dob-error" class="error">

                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-5 col-form-label">Image</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="file" class="form-control" id="profile-image" name="image" onchange="validateimage()"/>
                            </div>
                            <div id="image-error" class="error">

                            </div>
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
                <div class="form-group row mb-2">
                    <label class="col-sm-5 col-form-label">Signature</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Enter your Full Name as Signature" name="signature" value="{{$setting->signature}}" id="signature" onkeyup="validatesignature()" readonly/>
                        <div id="signature-error" class="error">

                        </div>
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
