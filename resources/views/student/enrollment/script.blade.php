<script>
    Laravel = {
        'url': '{{url("")}}'
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".getDate").flatpickr({
        maxDate : '<?php echo date('Y-m-d')?>',
        dateFormat: "Y-m-d"
    });
    $(".myDate").flatpickr({
        dateFormat: "Y-m-d",
        defaultDate: "<?php echo date('Y-m-d');?>",
    });
    $(".futureDate").flatpickr({
        minDate: "<?php echo date('Y-m-d');?>",
        dateFormat: "Y-m-d",
        defaultDate: "<?php echo date('Y-m-d');?>",
    });

    var fnameError = document.getElementById('fname-error')
    // var fnameError = document.getElementById('fname-error')
    // var lnameError = document.getElementById('lname-error')
    var genderError = document.getElementById('gender-error')
    var emailError = document.getElementById('email-error')
    var dobError = document.getElementById('dob-error')
    var birthcountryError = document.getElementById('birthcoutry-error')
    var mobilenumeError = document.getElementById('mobile-error')
    var resaddressError = document.getElementById('resaddress-error')
    var stateError = document.getElementById('state-error')
    var postcodeError = document.getElementById('postcode-error')
    var courseError = document.getElementById('pref-course-error')
    var commdateError = document.getElementById('commdate-error')
    var imageError = document.getElementById('image-error')
    var ausprError = document.getElementById('auspr-error')
    var currentausError = document.getElementById('ausliving-error')
    var currentlivingError = document.getElementById('currcountry-error')
    var visatypeError = document.getElementById('visatype-error')
    var passnumError = document.getElementById('passportnum-error')
    var passexpError = document.getElementById('passportexp-error')
    var fullnameError = document.getElementById('fullname-error')
    var relationError = document.getElementById('relation-error')
    var contactError = document.getElementById('contact-error')
    var termsError = document.getElementById('terms-error')
    var privacyError = document.getElementById('privacy-error')
    var signatureError = document.getElementById('signature-error')
    var submitError = document.getElementById('submit-error')

    var fname;
    var lname;
    function validatefname(){
        fname = document.getElementById('name').value;
        if(fname.length == 0){
            fnameError.innerHTML = "First name is required!";
            return false;
        }
        if(!fname.match(/^[a-zA-Z\s]*$/)){
            fnameError.innerHTML = "Do not include any sign, symbols and number in your first name!";
            return false;
        }
        fnameError.innerHTML = '';
        return true;
    }

    // function validatelname(){
    //     lname = document.getElementById('lname').value;
    //     if(lname.length == 0){
    //         lnameError.innerHTML = "Last name is required!";
    //         return false;
    //     }
    //     if(!lname.match(/^[a-zA-Z\s]*$/)){
    //         lnameError.innerHTML = "Do not include any sign, symbols and number in your first name!";
    //         return false;
    //     }
    //     lnameError.innerHTML = '';
    //     return true;
    // }

    function validateemail(){
        var email = document.getElementById('email').value;
        if(email.length == 0){
            emailError.innerHTML = "Email is required!";
            return false;
        }
        if(!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/)){
            emailError.innerHTML = "Invalid email address";
            return false;
        }
        emailError.innerHTML = '';
        return true;
    }

    function validategender(){
        var valid = false;
        // var gender = document.enrollment.gender;
        var gender = document.getElementsByClassName("gender");
        for(var i=0;i<gender.length;i++){
            if(gender[i].checked){
                valid = true;
                break;
            }
        }

        if(valid){
            genderError.innerHTML = '';
            return true;
        }else{
            genderError.innerHTML = "Please select your gender!";
            return false;
        }
    }

    function validatedob(){
        var dob = document.getElementById('dob').value;
        if(dob == ""){
            $('#dob').focus();
            dobError.innerHTML = "Date of birth is required!";
            return false;
        }
        dobError.innerHTML = '';
        return true;
    }

    function validatecob(){
        var cob = document.getElementById('cob').value;
        if(cob == ""){
            $('#cob').focus();
            birthcountryError.innerHTML = "Country of birth is required!";
            return false;
        }
        birthcountryError.innerHTML = '';
        return true;
    }

    function validatemobnum(){
        var mobnum = document.getElementById('mobnum').value;
        if(mobnum.length == 0){
            $('#mobnum').focus();
            mobilenumeError.innerHTML = "Mobile number is required!";
            return false;
        }
        if(!mobnum.match(/^\d{10}$/)){
            mobilenumeError.innerHTML = "Invalid mobile number";
            return false;
        }
        mobilenumeError.innerHTML = '';
        return true;
    }

    function validateresaddress(){
        var resaddress = document.getElementById('resaddress').value;
        if(resaddress.length == 0){
            $('#resaddress').focus();
            resaddressError.innerHTML = "Residental address is required!";
            return false;
        }
        resaddressError.innerHTML = '';
        return true;
    }

    function validatestate(){
        var state = document.getElementById('state').value;
        if(state.length == 0){
            $('#state').focus();
            stateError.innerHTML = "State is required!";
            return false;
        }
        stateError.innerHTML = '';
        return true;
    }

    function validatepostcode(){
        var postcode = document.getElementById('postcode').value;
        if(postcode.length == 0){
            $('#postcode').focus();
            postcodeError.innerHTML = "Postcode is required!";
            return false;
        }
        postcodeError.innerHTML = '';
        return true;
    }

    function validatecourse(){
        var course = document.getElementById('course_id').value;
        if(course == ""){
            $('#course_id').focus();
            courseError.innerHTML = "Please select preferred course!";
            return false;
        }
        courseError.innerHTML = '';
        return true;
    }

    function validatecommdate(){
        var commdate = document.getElementById('commdate').value;
        if(commdate == ""){
            $('#commdate').focus();
            commdateError.innerHTML = "Please select Commencement Date!";
            return false;
        }
        commdateError.innerHTML = '';
        return true;
    }

    function validateimage(){
        var image = document.getElementById('profile-image').value;
        if(image == ""){
            $('#profile-image').focus();
            imageError.innerHTML = "Please select you profile picture!";
            return false;
        }
        imageError.innerHTML = '';
        return true;
    }

    function validatepr(){
        var valid = false;
        var pr = document.getElementsByClassName("permanent_residence");
        for(var i=0;i<pr.length;i++){
            if(pr[i].checked){
                valid = true;
                break;
            }
        }
        if(valid){
            ausprError.innerHTML = '';
            return true;
        }else{
            $('.pr[i]').focus();
            ausprError.innerHTML = "Please select any to proceed!";
            return false;
        }
    }
    function validatecurrentcountry(){
        var valid = false;
        var currentcountry = document.getElementsByClassName("is_living_australia");
        for(var i=0;i<currentcountry.length;i++){
            if(currentcountry[i].checked){
                valid = true;
                break;
            }
        }
        if(valid){
            currentausError.innerHTML = '';
            return true;
        }else{
            currentausError.innerHTML = "Please select any to proceed!";
            return false;
        }
    }

    function validatelivingcountry(){
        var livingcountry = document.getElementById('livingcountry').value;
        if(livingcountry == ""){
            $('#livingcountry').focus();
            currentlivingError.innerHTML = "Currently living cuntry is required!";
            return false;
        }
        currentlivingError.innerHTML = '';
        return true;
    }

    function validatecurrentvisaType(){
        var visaType = document.getElementById('visaType').value;
        if(visaType.length == 0){
            $('#visaType').focus();
            visatypeError.innerHTML = "Please select your Visa Type!";
            return false;
        }
        visatypeError.innerHTML = '';
        return true;
    }

    function validatepassportNum(){
        var passportNum = document.getElementById('passportNum').value;
        if(passportNum.length == 0){
            $('#passportNum').focus();
            passnumError.innerHTML = "Please provide your valid passport number!";
            return false;
        }
        if(!passportNum.match(/^[a-zA-Z0-9]{6,10}$/)){
            passnumError.innerHTML = "Invalid passport number!";
            return false;
        }
        passnumError.innerHTML = '';
        return true;
    }

    function validatepassexp(){
        var passexp = document.getElementById('passexp').value;
        if(passexp == ""){
            $('#passexp').focus();
            passexpError.innerHTML = "Please select your valid passport expiry date!";
            return false;
        }
        passexpError.innerHTML = '';
        return true;
    }

    function validatefullname(){
        var fullname = document.getElementById('fullname').value;
        if(fullname.length == 0){
            $('#fullname').focus();
            fullnameError.innerHTML = "Full name is required!";
            return false;
        }
        fullnameError.innerHTML = '';
        return true;
    }

    function validaterelation(){
        var relation = document.getElementById('relation').value;
        if(relation.length == 0){
            $('#relation').focus();
            relationError.innerHTML = "Contact number is required!";
            return false;
        }
        relationError.innerHTML = '';
        return true;
    }

    function validatecontact(){
        var contact = document.getElementById('contact').value;
        if(contact.length == 0){
            $('#contact').focus();
            contactError.innerHTML = "Contact number is required!";
            return false;
        }
        if(!contact.match(/^\d{10}$/)){
            contactError.innerHTML = "Invalid contact number";
            return false;
        }
        contactError.innerHTML = '';
        return true;
    }

    function validatecondition(){
        var valid = false;
        // var condition = document.enrollment.term_and_condition;
        if($('#term_and_condition').is(':checked')){
            valid = true;
        }
        if(valid){
            termsError.innerHTML = '';
            return true;
        }else{
            $('#term_and_condition').focus();
            termsError.innerHTML = "Please accept to proceed!";
            return false;
        }
    }

    function validateprivacy(){
        var valid = false;
        // var agree = document.enrollment.privacy;
        if($('#agree').is(':checked')){
            valid = true;
        }
        if(valid){
            privacyError.innerHTML = '';
            return true;
        }else{
            $('#agree').focus();
            privacyError.innerHTML = "Please accept to proceed!";
            return false;
        }
    }

    function validatesignature(){
        var signature = document.getElementById('signature').value;
        if(signature.length == 0){
            $('#signature').focus();
            signatureError.innerHTML = "Signature field is required!";
            return false;
        }
        if(!signature.match(fname)){
            $('#signature').focus();
            signatureError.innerHTML = "Signature should include Full Name and match First Name and Last Name as filled above with space between!";
            return false;
        }
        signatureError.innerHTML = '';
        return true;
    }
    function firstValidate(){
        if(!validatefname()  || !validateemail() || !validategender() || !validatedob() || !validatecob() || !validatemobnum() || !validateresaddress() || !validatestate() || !validatepostcode() || !validatecourse() || !validatecommdate() || !validateimage() ){
            swal("Invalid form !", "Please fill up the form as instructed !", "info");
            return false;
        }
        else{
            document.getElementsByClassName("step")[currentTab].className += " finish";
            return true;
        }
    }

    function secondValidate(){
        if(!validatepr() || !validatecurrentcountry()|| !validatelivingcountry() || !validatepassexp() || !validatecurrentvisaType() || !validatepassportNum()){
            swal("Invalid form !", "Please fill up the form as instructed !", "info");
            return false;
        }
        else{
            document.getElementsByClassName("step")[currentTab].className += " finish";
            return true;
        }
    }

    function thirdValidate(){
        if(!validatefullname() || !validaterelation() || !validatecontact()){
            swal("Invalid form !", "Please fill up the form as instructed !", "info");
            return false;
        }
        else {
            document.getElementsByClassName("step")[currentTab].className += " finish";
            return true;
        }
    }

    function fourthValidate(){
        if(!validatecondition() || !validateprivacy() || !validatesignature()){
            swal("Invalid form !", "Please fill up the form as instructed !", "info");
            return false;
        }
        else {
            document.getElementsByClassName("step")[currentTab].className += " finish";
            return true;
        }
    }

    function validateForm(){
        // event.preventDefault();
        if(!validatefname()  || !validateemail() || !validategender() || !validatedob() || !validatecob() || !validatemobnum() || !validateresaddress() || !validatestate() || !validatepostcode() || !validatecourse() || !validatecommdate() || !validateimage() || !validatepr() ||
            !validatecurrentcountry()|| !validatelivingcountry() || !validatepassexp() || !validatecurrentvisaType() || !validatepassportNum() || !validatefullname() || !validaterelation() || !validatecontact() || !validatecondition() || !validateprivacy() || !validatesignature()){
            {
                swal("Invalid form !", "Please fill up the form as instructed !", "info");
                return false;
            }
        }else{
            // swal("Good job!", "Your form has been submitted !", "success");
            document.getElementsByClassName("middle-bar")[currentTab].className += " finish";
            return true;
        }
    }

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("step");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            $('.my-p-bar').remove();
            var p_bar = '<div class="progress-bar my-p-bar" id="dynamic'+n+'" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';
            $('#progress-id').append(p_bar);
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit"+ " " + "<li class='fa'>&#xf101;</li><br>";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next"+ " " + "<li class='fa'>&#xf101;</li><br>";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }
    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("step");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !firstValidate()) return false;
        console.log(currentTab)
        if(n == 1 && currentTab && !secondValidate()) return false;
        if(n == 1 && currentTab == 2 && !thirdValidate()) return false;
        if(n == 1 && currentTab == 3 && !fourthValidate()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // document.getElementById("middle-bar").className.replace("active-bar")
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("enrollment").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("middle-bar");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" middle-bar", " ");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " bar-active";

        var j, y = document.getElementsByClassName("circle-num");
        for (j= 0; j < y.length; j++){
            y[j].className = y[j].className.replace(" circle-num", "");
        }
        y[n].className += " circle-active";

        var progress = document.getElementById("progress-bar").css
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
