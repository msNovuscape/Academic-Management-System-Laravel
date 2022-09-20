<script>
    var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
    tabEl.addEventListener('shown.bs.tab', function (event) {
        event.target // newly activated tab
        event.relatedTarget // previous active tab
    })
    function getEdit() {
        $('#detailForm').hide();
        $('#editForm').show();
    }

    var fnameError = document.getElementById('fname-error')
    var lnameError = document.getElementById('lname-error')
    var genderError = document.getElementById('gender-error')
    var emailError = document.getElementById('email-error')
    var dobError = document.getElementById('dob-error')
    var mobilenumeError = document.getElementById('mobile-error')
    var resaddressError = document.getElementById('resaddress-error')
    var stateError = document.getElementById('state-error')
    var postcodeError = document.getElementById('postcode-error')
    var ausprError = document.getElementById('auspr-error')
    var currentausError = document.getElementById('ausliving-error')
    var currentlivingError = document.getElementById('currcountry-error')
    var visatypeError = document.getElementById('visatype-error')
    var passnumError = document.getElementById('passportnum-error')
    var passexpError = document.getElementById('passportexp-error')
    var fullnameError = document.getElementById('fullname-error')
    var relationError = document.getElementById('relation-error')
    var contactError = document.getElementById('contact-error')
    var signatureError = document.getElementById('signature-error')
    var submitError = document.getElementById('submit-error')

    var fname;
    var lname;
    function validatefname(){
        fname = document.getElementById('fname').value;
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

    function validatelname(){
        lname = document.getElementById('lname').value;
        if(lname.length == 0){
            lnameError.innerHTML = "Last name is required!";
            return false;
        }
        if(!lname.match(/^[a-zA-Z\s]*$/)){
            lnameError.innerHTML = "Do not include any sign, symbols and number in your first name!";
            return false;
        }
        lnameError.innerHTML = '';
        return true;
    }

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
        var gender = document.general.gender;
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
            dobError.innerHTML = "Date of birth is required!";
            return false;
        }
        dobError.innerHTML = '';
        return true;
    }

    function validatemobnum(){
        var mobnum = document.getElementById('mobnum').value;
        if(mobnum.length == 0){
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
            resaddressError.innerHTML = "Residental address is required!";
            return false;
        }
        resaddressError.innerHTML = '';
        return true;
    }

    function validatestate(){
        var state = document.getElementById('state').value;
        if(state.length == 0){
            stateError.innerHTML = "State is required!";
            return false;
        }
        stateError.innerHTML = '';
        return true;
    }

    function validatepostcode(){
        var postcode = document.getElementById('postcode').value;
        if(postcode.length == 0){
            postcodeError.innerHTML = "Postcode is required!";
            return false;
        }
        postcodeError.innerHTML = '';
        return true;
    }

    function validatepr(){
        var valid = false;
        var pr = document.general.permanentresidence;
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
            ausprError.innerHTML = "Please select any to proceed!";
            return false;
        }
    }
    function validatecurrentcountry(){
        var valid = false;
        var currentcountry = document.general.living_australia;
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
            currentlivingError.innerHTML = "Currently living cuntry is required!";
            return false;
        }
        currentlivingError.innerHTML = '';
        return true;
    }

    function validatecurrentvisaType(){
        var visaType = document.getElementById('visaType').value;
        if(visaType.length == 0){
            visatypeError.innerHTML = "Please select your Visa Type!";
            return false;
        }
        visatypeError.innerHTML = '';
        return true;
    }

    function validatepassportNum(){
        var passportNum = document.getElementById('passportNum').value;
        if(passportNum.length == 0){
            passnumError.innerHTML = "Please provide your valid passport number!";
            return false;
        }
        if(!passportNum.match(/^[a-zA-Z0-9]{7,8}$/)){
            passnumError.innerHTML = "Invalid passport number!";
            return false;
        }
        passnumError.innerHTML = '';
        return true;
    }

    function validatepassexp(){
        var passexp = document.getElementById('passexp').value;
        if(passexp == ""){
            passexpError.innerHTML = "Please select your valid passport expiry date!";
            return false;
        }
        passexpError.innerHTML = '';
        return true;
    }

    function validatefullname(){
        var fullname = document.getElementById('fullname').value;
        if(fullname.length == 0){
            fullnameError.innerHTML = "Full name is required!";
            return false;
        }
        fullnameError.innerHTML = '';
        return true;
    }

    function validaterelation(){
        var relation = document.getElementById('relation').value;
        if(relation.length == 0){
            relationError.innerHTML = "Contact number is required!";
            return false;
        }
        relationError.innerHTML = '';
        return true;
    }

    function validatecontact(){
        var contact = document.getElementById('contact').value;
        if(contact.length == 0){
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

    function validatesignature(){
        var signature = document.getElementById('signature').value;
        if(signature.length == 0){
            signatureError.innerHTML = "Signature field is required!";
            return false;
        }
        if(!signature.match(fname +" "+ lname)){
            signatureError.innerHTML = "Signature should include Full Name and match First Name and Last Name as filled above with space between!";
            return false;
        }
        signatureError.innerHTML = '';
        return true;
    }

    function validateForm(){
        if(!validatefname() || !validatelname() || !validateemail() || !validategender() || !validatedob() || !validatemobnum() || !validateresaddress() || !validatestate() || !validatepostcode()  || !validatepr() ||
            !validatecurrentcountry()|| !validatelivingcountry() || !validatepassexp() || !validatecurrentvisaType() || !validatepassportNum() || !validatefullname() || !validaterelation() || !validatecontact() || !validatesignature()){
            {
                swal("Invalid form !", "Please fill up the form as instructed !", "info");
                return false;
            }
        }else{
            swal("Good job!", "Your form has been submitted !", "success");
            return true;
        }
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#dob").flatpickr({
        dateFormat: "Y-m-d"
    });
    $("#passexp").flatpickr({
        dateFormat: "Y-m-d"
    });

    function getMinDate(){
        var min_date = $('#dob').val();
        if(min_date != ''){
            $('#to_date').flatpickr({
                minDate: min_date,
                dateFormat: 'Y-m-d',
            });
        }
    }

    function getExpDate(){
        var min_date = $('#passexp').val();
        if(min_date != ''){
            $('#to_date').flatpickr({
                minDate: min_date,
                dateFormat: 'Y-m-d',
            });
        }
    }
    function validateClickForBatchQuiz(quiz_batch_id,admission_id) {
        debugger;
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to take this exam!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1AAC4C',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, take me!'
        }).then((result) => {
            if (result.isConfirmed) {
                // window.location.href =  Laravel.url+'/tests';
                // window.open(Laravel.url+'/tests', '_blank');
                var formData = new FormData();
                formData.append('quiz_batch_id', quiz_batch_id);
                formData.append('admission_id', admission_id);
                //start ajax call
                $.ajax({
                    /* the route pointing to the post function */
                    type: 'POST',
                    url: Laravel.url +"/student/student_quiz_batch",
                    dataType: 'json',
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        end_loader();
                        debugger;
                        if(data['status'] == 'Ok'){
                            window.location.href =  Laravel.url+'/student/quiz_exam';
                        }
                        if(data['status'] == 'No'){
                            window.location.href =  Laravel.url+'/student';
                        }
                        // window.location.href =  Laravel.url+'/student/quiz_exam';
                        // $('#attendance_table').remove();
                        // $('#mytable').append(data['html']);
                    },
                    error: function(error) {
                        end_loader();
                        debugger;
                        errorDisplay('Something went wrong !');
                    }
                });
            }
        })
    }
    function validateClickForIndividualQuiz(quiz_individual_id,admission_id) {
        debugger;
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to take this exam!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1AAC4C',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, take me!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = Laravel.url+'/tests_individual';
                // window.open(Laravel.url+'/tests_individual', '_blank');
            }
        })
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
