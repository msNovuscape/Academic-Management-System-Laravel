{{--Dashboard accordian js--}}
    <script>
        $(document).ready(function(){
            $("#myBtnCourse").click(function(){
                $("#myCollapseCourse").collapse("toggle");
                var x = document.getElementById('icon-toggle-course');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnTimetable").click(function(){
                $("#myCollapseTimetable").collapse("toggle");
                var x = document.getElementById('icon-toggle-timetable');    
                x.classList.toggle("fa-angle-right");
                
            });
            $("#myBtnTimeslot").click(function(){
                $("#myCollapseTimeslot").collapse("toggle");
                var x = document.getElementById('icon-toggle-timeslot');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnBatch").click(function(){
                $("#myCollapseBatch").collapse("toggle");
                var x = document.getElementById('icon-toggle-batch');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnFiscalyear").click(function(){
                $("#myCollapseFiscalyear").collapse("toggle");
                var x = document.getElementById('icon-toggle-fiscalYear');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnAdmission").click(function(){
                $("#myCollapseAdmission").collapse("toggle");
                var x = document.getElementById('icon-toggle-admission');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnStudent").click(function(){
                $("#myCollapseStudent").collapse("toggle");
                var x = document.getElementById('icon-toggle-student');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnAttendance").click(function(){
                $("#myCollapseAttendance").collapse("toggle");
                var x = document.getElementById('icon-toggle-attendance');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnQuiz").click(function(){
                $("#myCollapseQuiz").collapse("toggle");
                var x = document.getElementById('icon-toggle-quiz');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnCourseMaterial").click(function(){
                $("#myCollapseCourseMaterial").collapse("toggle");
                var x = document.getElementById('icon-toggle-courseMaterial');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myBtnBatchCM").click(function(){
                $("#myCollapseBatchCM").collapse("toggle");
                var x = document.getElementById('icon-toggle-batchCM');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myFinanceBtn").click(function(){
                $("#myFinance").collapse("toggle");
                var x = document.getElementById('icon-toggle-finance');    
                x.classList.toggle("fa-angle-right");
            });
            $("#mySettingsBtn").click(function(){
                $("#myCollapseSettings").collapse("toggle");
                var x = document.getElementById('icon-toggle-settings');    
                x.classList.toggle("fa-angle-right");
            });
            $("#myMaterialsBtn").click(function(){
                $("#myCollapseMaterials").collapse("toggle");
                var x = document.getElementById('icon-toggle-materials');    
                x.classList.toggle("fa-angle-right");
            });
        });
    </script>


