<script>

        function replace(hide, show){
            document.getElementById(hide).style.display="none";
            document.getElementById(show).style.display="block";
        }

        function generate_year_range(start, end) {
            var years = "";
            for (var year = start; year <= end; year++) {
                years += "<option value='" + year + "'>" + year + "</option>";
            }
            return years;
        }

        today = new Date();
        currentMonth = today.getMonth();
        currentYear = today.getFullYear();
        debugger;
        selectYear = document.getElementById("year");
        selectMonth = document.getElementById("month");


        createYear = generate_year_range(1970, 2050);
        /** or
         * createYear = generate_year_range( 1970, currentYear );
         */

        document.getElementById("year").innerHTML = createYear;

        var calendar = document.getElementById("calendar");
        var lang = calendar.getAttribute('data-lang');

        var months = "";
        var days = "";

        var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        if (lang == "en") {
            months = monthDefault;
            days = dayDefault;
        } else if (lang == "id") {
            months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
        } else if (lang == "fr") {
            months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
            days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
        } else {
            months = monthDefault;
            days = dayDefault;
        }


        var $dataHead = "<tr>";
        for (dhead in days) {
            $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
        }
        $dataHead += "</tr>";

        //alert($dataHead);
        document.getElementById("thead-month").innerHTML = $dataHead;

        monthAndYear = document.getElementById("monthAndYear");
        showCalendar(currentMonth, currentYear);

        function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            showCalendar(currentMonth, currentYear);
        }

        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            showCalendar(currentMonth, currentYear);
        }

        function jump() {
            currentYear = parseInt(selectYear.value);
            currentMonth = parseInt(selectMonth.value);
            showCalendar(currentMonth, currentYear);
        }

        function showCalendar(month, year) {
            var firstDay = ( new Date( year, month ) ).getDay();
            tbl = document.getElementById("calendar-body");
            tbl.innerHTML = "";
            monthAndYear.innerHTML = months[month] + " " + year;
            selectYear.value = year;
            selectMonth.value = month;

            // creating all cells
            var date = 1;
            for ( var i = 0; i < 6; i++ ) {
                var row = document.createElement("tr");
                for ( var j = 0; j < 7; j++ ) {
                    if ( i === 0 && j < firstDay ) {
                        cell = document.createElement( "td" );
                        cellText = document.createTextNode("");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth(month, year)) {
                        break;
                    } else {
                        cell = document.createElement("td");
                        cell.setAttribute("data-date", date);
                        cell.setAttribute("data-month", month + 1);
                        cell.setAttribute("data-year", year);
                        cell.setAttribute("data-month_name", months[month]);
                        cell.className = "date-picker";
                        cell.innerHTML = "<span>" + date + "</span>";

                        //to select arrays of attendance
                        var days1 = [1,2,7,11];
                        for(i =0; i < days1.length; i++){
                            if ( date === days1[i] && year === today.getFullYear() && month === today.getMonth() ) {
                                cell.className = "date-picker selected";
                            }
                        }
                        //to select today of days
                        if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                            cell.className = "date-picker selected";
                        }
                        row.appendChild(cell);
                        date++;
                    }
                }
                tbl.appendChild(row);
            }
        }

        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }

        //update single student attendance
        function singleAttendance(attendance_id,status) {
            //start  confirmation for single attendance
            $.confirm({
                title: 'Do you sure want to make attendance?',
                content: false,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){
                            if(status == 1){
                                //if present(1) then make absent(2)
                                var new_status = 2;
                                var symbol = 'A';
                            }
                            if(status == 2){
                                //if absent(2) then make present(1)
                                var new_status = 1;
                                var symbol = 'P';
                            }
                            start_loader();
                            var formData = new FormData();
                            formData.append('status', new_status);
                            formData.append('symbol', symbol);
                            //start ajax call
                            $.ajax({
                                /* the route pointing to the post function */
                                type: 'POST',
                                url: Laravel.url +"/attendance/"+attendance_id,
                                dataType: 'json',
                                data: formData,
                                processData: false,  // tell jQuery not to process the data
                                contentType: false,
                                /* remind that 'data' is the response of the AjaxController */
                                success: function (data) {
                                    end_loader();
                                    $('#att_btn'+data['data']['id']).remove();
                                    $('#td_status'+data['data']['id']).append(data['html'])
                                    successDisplay(data['message']);
                                },
                                error: function(error) {
                                    end_loader();
                                    errorDisplay('Something went wrong !');
                                }
                            });
                            //end ajax call
                        }
                    },
                    close: function () {
                    }
                }
            });
            //end confirmation for  single attendance
        }
    </script>
