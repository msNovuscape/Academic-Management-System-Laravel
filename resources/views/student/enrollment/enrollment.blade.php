@extends('student.enrollment.index')
@section('content')
    <section class="enrollment">
        @include('success.success')
        @include('errors.error')
{{--        {!! Form::open(['url' => 'student/enrollments','method' => 'POST', 'files' => true ]) !!}--}}
        {!! Form::open(['url' => 'student/enrollments','id' => 'enrollment' ,'method' => 'POST', 'files' => true ,'onsubmit' => 'return validateForm()']) !!}
    {{--    @csrf--}}
        <div class="form-row">
            <div class="student-enrollment-header">
                <div class="enrollment-title">
                    <h1>Student Enrollment Form</h1>
                    <p>Please read the form carefully and complete all the sections.</p>
                </div>
                <div class="enrollment-steps">
                    <span class="middle-bar" style="display: none"></span>
                    <div class="steps-form">
                        <span class="circle-num">1</span>
                        <h5>Personal Details</h5>
                    </div>
                    <span class="middle-bar"></span>
                    <div class="steps-form">
                        <span class="circle-num">2</span>
                        <h5>Residential</h5>
                    </div>
                    <span class="middle-bar"></span>
                    <div class="steps-form">
                        <span class="circle-num">3</span>
                        <h5>Emergency Contact</h5>
                    </div>
                    <span class="middle-bar"></span>
                    <div class="steps-form">
                        <span class="circle-num">4</span>
                        <h5>Terms & Conditions</h5>
                    </div>
                </div>
            </div>
            <div class="progress" style="height: 1px;" id="progress-id">
                <div class="progress-bar my-p-bar" id="dynamic0" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="card step p-5 mt-5">
                <div class='card-title'>
                    <div>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        Personal Details
                    </div>
                </div>
                <div class='card-body'>
                    <div class="row g-4">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-first-name">Name</label>
                                <input type="text" class="form-control" placeholder="Enter your First Name" id="name" onkeyup="validatefname()" name="name" value="{{Auth::user()->name}}">
                                <span id="fname-error" class="error">

                                </span>
                            </div>
                        </div>
                        <div class='col-md-4 gender-radio'>
                            <div class="form-group">
                            <label>
                                Gender
                            </label>
                            <div class="d-flex" onclick="validategender()">
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="1" @if(old('gender') == 1) checked @endif>
                                    <label class="form-check-label">
                                        Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="2" @if(old('gender') == 2) checked @endif/>
                                    <label class="form-check-label">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input gender" type="radio" name="gender" value="3" @if(old('gender') == 3) checked @endif/>
                                    <label class="form-check-label">
                                        Other
                                    </label>
                                </div>
                            </div>
                            <div id="gender-error" class="error">

                            </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input  type="email" class="form-control" placeholder="Enter your E-mail Address" name="email" value="{{Auth::user()->email}}"  id="email" onkeyup="validateemail()"/>
                                <div id="email-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control getDate" placeholder="Select your date of birth" name="dob" value="{{old('dob')}}" id="dob" onchange="validatedob()" />
                                <div id="dob-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Country of Birth</label>
                                <select name="country_of_birth" class="form-select selectpicker" id="cob" onchange="validatecob()">
                                    @foreach($countries as $country)
                                        <option hidden class='course-placeholder' value="" >Select you country of birth</option>
                                        <option value="{{$country->id}}" @if(old('country_id') === $country->id) selected @endif>{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <div id="birthcoutry-error" class="error"></div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" class="form-control" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Enter your Mobile Number" id="mobnum" onkeyup="validatemobnum()"/>
                                <div id="mobile-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Residential Address</label>
                                <input type="text" class="form-control" name="residential_address" value="{{old('residential_address')}}" placeholder="Enter your Residential Address" id="resaddress" onkeyup="validateresaddress()"/>
                                <div id="resaddress-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" value="{{old('state')}}" placeholder="Enter your State" id="state" onkeyup="validatestate()"/>
                                <div id="state-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Postcode</label>
                                <input type="text" class="form-control" name="post_code" value="{{old('post_code')}}" placeholder="Enter your Postcode" id="postcode" onkeyup="validatepostcode()"/>
                                <div id="postcode-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Course Name</label>
                                    <input type="text" class="form-control"  id="course_id" value="{{$course_name}}">
                                <div id="pref-course-error" class="error">

                                </div>

                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Commencement Date</label>
                                <input type="text" class="form-control futureDate" placeholder="Select your commencement date"  name="commencement_date" value="{{old('commdate')}}" id="commdate" onchange="validatecommdate()" />
                                <div id="commdate-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Upload Profile Image</label>
                                <input type="file" class="form-control" id="profile-image" name="image" onchange="validateimage()" value="{{old('image')}}"/>
                                <div id="image-error" class="error">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card step mt-4 p-5">
                <div class='card-title'>
                    <div>
                        <i class="fa-solid fa-house-chimney"></i>
                    </div>
                    Residency Information
                </div>
                <div class='card-body'>
                    <div class="row g-4">
                        <div class='col-md-4 gender-radio'>
                            <label>
                                Are you an Australian permanent residence?
                            </label>
                            <div class="d-flex" onclick="validatepr()">
                                <div class="form-check">
                                    <input class="form-check-input permanent_residence" type="radio" name="is_aus_permanent_resident" value="1" @if(old('is_aus_permanent_resident') == 1) checked @endif >
                                    <label class="form-check-label">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input permanent_residence" type="radio" name="is_aus_permanent_resident"  value="2" @if(old('is_aus_permanent_resident') == 2) checked @endif/>
                                    <label class="form-check-label">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div id="auspr-error" class="error">

                            </div>
                        </div>
                        <div class='col-md-4 gender-radio'>
                            <label>
                                Are you currently living in Australia?
                            </label>
                            <div class="d-flex" onclick="validatecurrentcountry()">
                                <div class="form-check">
                                    <input class="form-check-input is_living_australia" type="radio" name="is_living_in_aus" id="yes" value="1" @if(old('is_living_in_aus') == 1) checked @endif/>
                                    <label class="form-check-label">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input is_living_australia" type="radio" name="is_living_in_aus" id="no" value="2" @if(old('is_living_in_aus') == 2) checked @endif/>
                                    <label class="form-check-label">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div id="ausliving-error" class="error">

                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="hiding-part-two">
                                <div class="form-group">
                                    <label>If No, which country are you currently living in?</label>
                                    <select class="form-select selectpicker" name="country_of_living" id="livingcountry" onchange="validatelivingcountry()">
                                        @foreach($countries as $country)
                                            <option hidden class='course-placeholder' value="" >Select you country you are currently living</option>
                                            <option value="{{$country->id}}" @if(old('country_of_living') === $country->id) selected @endif>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="currcountry-error" class="error">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Visa Type:</label>
                                <input type="text" class="form-control" placeholder="Enter your visa type" name='visa_type' value="{{old('visa_type')}}"  id="visaType" onkeyup="validatecurrentvisaType()"/>
                                <div id="visatype-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Passport Number:</label>
                                <input type="text" class="form-control" placeholder="Enter your valid passport number" name='passport_number' value="{{old('passport_number')}}"  id="passportNum" onkeyup="validatepassportNum()"/>
                                <div id="passportnum-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label>Password Expiry Date</label>
                                <input type="date" class="form-control futureDate" placeholder="Select your date of passport expiry" name="passport_expiry_date" value="{{old('passport_expiry_date')}}" id="passexp" onchange="validatepassexp()"/>
                                <div id="passportexp-error" class="error">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card step mt-4 p-5">
                <div class='card-title'>
                    <div>
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    Emergency Contact
                </div>
                <div class='card-body'>
                    <div class="row g-4">
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="input-first-name">Full Name</label>
                                <input type="text" class="form-control" name="e_contact_name" value="{{old('e_contact_name')}}" placeholder="Enter Full Name" id="fullname" onkeyup="validatefullname()"/>
                                <div id="fullname-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="input-last-name">Relation to Student</label>
                                <input type="text" class="form-control" name="relation" value="{{old('relation')}}" placeholder="Enter Relationship to Student" id="relation" onkeyup="validaterelation()"/>
                                <div id="relation-error" class="error">

                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="input-last-name">Contact number</label>
                                <input type="number" class="form-control" name="e_contact_no" value="{{old('e_contact_no')}}" placeholder="Enter Contact Number"  id="contact" onkeyup="validatecontact()"/>
                                <div id="contact-error" class="error">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='privacy-section step mt-5'>
                <div class='card p-5'>
                    <div class='card-title'>Terms and conditions</div>
                    <div class='card-body'>
                        <ol>
                            <li>This program is available to all Domestic and International students enrolled at Extratech Pty. Ltd which is specifically Job-Oriented and Industry-Specific.</li>
                            <li>Course fee does not include the certification exam fee unless advertised on the specific course page on our website.</li>
                            <li>Payment can be made by EFT, Cheque, Credit Card or Bank Transfer. 2% surcharge applies to payments made via credit cards. You must have the authority to use the credit card you are using to pay the fee.</li>
                            <li>All courses, courses within packages and programs must be completed in its entirely once commenced by following the given schedule; breaks are not allowed unless approved in writing by Extratech before registration through info@extratechs.com.au. If the course is not attended and left without notice on the schedule provided, the course is considered to have been delivered and Extratech is not liable to deliver the training again.</li>
                            <li>All Extratech programs/packages/courses are non-transferable and must be completed within six months of the commencement of the first course/module. Courses in the packages and programs cannot be changed unless required as per the industry standards.</li>
                            <li>Recording equipment of any kind or camera usage is forbidden during training including but not limited to the classroom, in-house or live online training. Use of such devices will result in expulsion from the training, the training fee will be forfeited, and legal proceeding may commence.</li>
                            <li>Extratech may use your name, company name, feedback, comments, testimonials, evaluations, pictures, and videos obtained during the course for its promotional, website and marketing activities, unless you direct otherwise in writing.</li>
                            <li>Enrolment is confirmed on receipt of online booking using the Student Enrolment form; it is a formal and legal commitment by the participant to undertake the training. Once the Student Enrolment is received, we reserve the participant seat, organize the course material, allocate the trainer and the relevant resources required to deliver the training, and therefore, if the training is then not attended by the participant, we incur a loss. Hence, if the booking is cancelled or training is not attended by the participant, the invoice or a portion of the invoice remains payable.</li>
                            <li>Extratech reserves the right, if necessary, to cancel, move or reschedule a previously confirmed training course date or a training course currently being delivered for various reasons, including but not exclusively, illness, unavailability of the trainer, circumstances beyond our control or other unforeseen circumstances. In these cases, Extratech will endeavor to inform the participant as soon as practicable. In an event where it is necessary to reschedule the course(s) to another date(s), Extratech shall inform the participant as soon as possible regarding the new course delivery date(s).</li>
                            <li>If a participant wishes to cancel, reschedule, or transfer a course, package/program (defined as any booking made for a combination of one or more courses), the participant must notify Extratech in writing via email to info@extratechs.com.au. The date on which Extratech receives the written notice will be deemed the date the request has been made. Cancellation, rescheduling and transferring fees are calculated as a percentage of the original course fee and are dependent on the number of days’ notice given to Extratech in writing before the commencement date. Cancellation, rescheduling, and transferring are not allowed if the training has already commenced/joined/attended or requested during our end of the year’s closure period for Christmas and New Year.</li>
                            <li>If a participant cancels the enrolment within one week or more before the start of the training, $AU 150 will be deducted as the administration charge from the total enrolment fee. All other cancellation requests received after the first week of the training are subjected to a 50% cancellation fee based upon the total enrolment fee. Any cancellation requests after the second week of the training will not be refunded.</li>
                            <li>Extratech will have no other/further liability of any type due to changes to the course date other than those set out in this condition, and no other claim for compensation or expenses will be considered.
                                If a refund is being issued, Extratech must be provided with the relevant account details to process the refund within 15 days, failing which the amount can be redeemed as training credits which must be attended within two months from the date of becoming training credits.</li>
                            <li>Extratech will have no other/further liability of any type due to changes to the course date other than those set out in this condition, and no other claim for compensation or expenses will be considered.</li>
                            <li>We reserve the right to view, use and record activities undertaken at Extratech premises and our training courses.</li>
                            <li>Extratech reserves all rights to this site’s content and design. Unless permitted in writing by Extratech Pty Ltd, you may not reproduce, use, or copy any content on this site including names, logos and any other material licensed to Extratech Pty. Ltd. You may not modify, adapt, or create derivative works based on or contained in our services or any associated written material accompanying or produced by us. You may not reverse engineer, decompile or disassemble our services or any associated written material accompanying or produced by it.</li>
                            <li>Any contents, documents, and videos provided by Extratech are not permitted to be provided to any other third party, friends, or organisations. If found doing so, Extratech has the right to expel the student from the course as well as the student is subject to pay $2000 fine to Extratech for sharing companies’ private information to other parties.</li>
                            <li>You are required to take responsibility for any damage and usage caused to Extratech property including computers, servers, projectors, chairs, switches, routers, kitchen equipment and so on by you. It is expected that you will place all the used items neatly cleaned and organised anywhere within the Extratech premises.</li>
                        </ol>
                        <div onclick="validatecondition()">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="term_and_condition"  name="term_and_condition" value="1"  @if(old('term_and_condition') == 1) checked @endif/>
                                <label class="form-check-label">
                                    I accept the Terms and Conditions
                                </label>
                            </div>
                            <div id="terms-error" class="error">

                            </div>
                        </div>
                    </div>
                </div>
                <div class='card p-5'>
                    <div class='card-title'>Privacy Statement and Declaration</div>
                    <div class='card-body'>
                        <ol>
                            <li>Any information provided by you to Extratech Pty. Ltd as part of this application form, including any supporting materials and documentation, will only be used for the administrative or educational purposes of the company, or in accordance with your specific consent.</li>
                            <li>Extratech will not disclose your personal information to a third party unless required to do so and/or as permitted by law or where you have consented to the disclosure. Extratech may use your personal information for marketing purposes, however if you would like Extratech to refrain from doing so, please advise the Admissions Department via email on info@extratechs.com.au. You have right to access the personal information that Admissions Department via email on info@extratechs.com.au.</li>
                        </ol>
                        <p class='declare-text'>I declare that the information provided is, to the best of my understanding and knowledge, complete and correct. I understand that Extratech Pty. Ltd may perform random checks on the information I have provided, and I may be asked to provide evidence to verify the information in this form. I am aware that there are severe penalties for providing false or misleading information. I understand and acknowledge that there may be a need for the company to share my information with a third party, such as agencies, social medias, government bodies etc. I give my permission for the company to supply any relevant official records and my personal information when it is required for the delivery of services by Extratech Pty. Ltd.</p>
                        <div class='row'>
                            <div class="col-md-6 col-sm-12" onclick="validateprivacy()">
                                <div class='form-check'>
                                    <input class="form-check-input" type="checkbox" id="agree" name="privacy" value="1"  @if(old('privacy') == 2) checked @endif/>
                                    <label class="form-check-label">
                                        I accept the Privacy Policy
                                    </label>
                                </div>
                                <div id="privacy-error" class="error">

                                </div>
                            </div>
                            <div class='col-md-6 col-sm-12 signature'>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Signature</span>
                                    <input type="text" class="form-control" placeholder="Enter your Full Name as Signature" name="signature" value="{{old('signature')}}" id="signature" onkeyup="validatesignature()" />
                                </div>
                                <div id="signature-error" class="error">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="enrollment-btn">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa-solid fa-angles-left"></i> Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next <i class="fa-solid fa-angles-right"></i></button>
                </div>
            </div>
        </div>
        {{--        </form>--}}
        {!! Form::close() !!}
    </section>
@endsection
@section('script')
    @include('student.enrollment.script')
@endsection
