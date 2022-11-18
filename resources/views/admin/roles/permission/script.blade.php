<script>

    function getPermission(){
        debugger;
        if($('#yes').is(':checked')){
            $("#personal-permission").show();
        }
        if($('#no').is(':checked')){
            $("#personal-permission").hide();
        }
    }

    function validateForm() {
        if($('#role_id').val() == '' || $('#role_id').val() == null){
            errorDisplay('Role and Personal  permission should not be empty at same time!');
            return false
        }
        if($('#yes').is(':checked')){
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
        } else {
            return true;
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
