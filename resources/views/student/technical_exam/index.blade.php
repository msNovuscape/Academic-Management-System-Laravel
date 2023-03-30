<div class="row">

    @if($exam_booking->count() > 0)
    @php
    $exam_detail = $exam_booking->first()->technical_exam_detail;
    $exam = $exam_detail->technical_exam;
@endphp
      <div class="col-sm-12 col-md-6">
        <div class="exam-details-lblock">
          <h5>Exam Details</h5>

        </div>


        @if($exam->exam_type == '2')
        <div class="physical-exam mt-4">
          <h5>Exam Test Center</h5>
          <h6><i class="mdi mdi-map-marker-radius me-2 "></i>{{ $exam_detail->branch->address }}</h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div>
        @else
        <div class="physical-exam mt-4">
          <h5>Exam Type</h5>
          <h6><i class="mdi mdi-map-marker-radius me-2 "></i>Online</h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div>
        @endif

        {{-- <div class="physical-exam mt-4">
          <h5>Exam Booked On</h5>
          <h6><? echo $row['booking_date']?></h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div> --}}
      </div>
      <div class="col-sm-12 col-md-6 mt-4 d-time">
          <h5>Your exam Date and Time</h5>
          <p><i class="mdi mdi-calendar-blank me-2"></i>{{ $exam->date }}</p>
          <p><i class="mdi mdi-av-timer me-2"></i>{{ $exam_detail->technical_exam_timeslot->start_time.' - '.$exam_detail->technical_exam_timeslot->end_time }}</p>
      </div>

      @else
        {{-- <div class="row">  --}}

      <div class="col-sm-12 col-md-6">
        <div class="checks-wrap">
          <h5>How would you like to take an exam?</h5>
          <ul>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_type" value = "1" data-type="1" id="online-exam" required>
                <label class="form-check-label" for="online">Online Exam</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_type" id="physical-exam" value = "2" data-type="2">
                <label class="form-check-label" for="physical">Physical Exam</label>
              </div>
            </li>
          </ul>
        </div>
        <div class="physical-wrap block-hide" id = "location_block">
          <ul>
            @foreach($branches as $branch)
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_center" value="{{ $branch->id }}" id="sydRadio{{ $branch->id }}">
                  <label class="form-check-label" for="sydRadio{{ $branch->id }}">
                  <h5>{{ $branch->name }}</h5>
                  <p>{{ $branch->address }}</p>
                </label>
              </div>
            </li>
            @endforeach
            {{-- <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_center" value="Melbourne" id="melRadio">
                  <label class="form-check-label" for="melradio">
                  <h5>Melbourne</h5>
                  <p>2B/95 Bell Street Coburg,VIC,Australia 3058</p>
                </label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_center" value="Canberra" id="canberraRadio">
                  <label class="form-check-label" for="canberraRadio">
                  <h5>Canberra</h5>
                  <p>2B/95 Bell Street Coburg,VIC,Australia 3058</p>
                </label>
              </div>
            </li> --}}
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 maintime-wrap block-hide" id = "calendar-container">
          <h5>Choose the exam date and time below</h5>
          <div id="calendar-apppearance"></div>
          <div id='available-times' class="available-times"></div>


        {{-- <div name = "selected_date" id="datepicker"> --}}
        {{-- </div> --}}
        {{-- <div class="examtime-wrap">
            <button type = "submit" name = "submit" class = "block-hide" onclick = "confirmBook(this.id);" id = "9:00AM-12:00PM">9:00AM - 12:00PM</button>
            <button class = "block-hide" id = "12:00PM-3:00PM" onclick = "confirmBook(this.id);">12:00PM - 3:00PM</button>
            <button class = "block-hide" id = "3:00PM-6:00PM" onclick = "confirmBook(this.id);">3:00PM - 6:00PM</button>
        </div> --}}
      </div>
      <div id='not-available' class="not-available"></div>

      @endif
       <!-- Appointment Modal -->
       <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="appointmentModalLabel">Book Technical Exam</span></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="book-modal-info">
                        <p>You are about to book a technical exam for the date of&nbsp;<span id = "booking_date"></span><span class="time" id = "time"></span></p>
                    </div>
                    <!-- Form with the fields name, email, phone, and notes -->
                    <form id ="appointment-form">
                    <input type="hidden" name="exam_id" id="exam_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" onclick = "submitBooking()" class="btn btn-primary" id="appointmentbtn">Confirm Booking</button>
                    {{-- <button class="buttonload btn btn-primary" id="buttonenqload" disabled>
                        <i class="fas fa-spinner fa-pulse"></i> Submiting
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    {!! Html::script('plugins/jquery/jquery-ui.min.css') !!}
    </script>
        <script>
            var branches = document.getElementsByName("exam_center");

            $('#physical-exam').click(function (e) {
                $('#available-times').html('');
                $('#not-available').html('');
                $('#calendar-apppearance').remove();
                $('input:radio[name=exam_center]').each(function () { $(this).prop('checked', false); });
                var element = document.getElementById('location_block');
                element.classList.remove('block-hide');
            });

            for (var i = 0; i < branches.length; i++) {
                branches[i].addEventListener("change", function() {
                    if (this.checked) {
                        branch_id =  this.value;
                        $('#available-times').html('');
                        $('#not-available').html('');
                        // var element = document.getElementById('calendar-container');
                        // element.classList.remove('block-hide');
                        get_technical_exams(branch_id);

                    }
                });
            }
            $('#online-exam').click(function (e) {
                $('#available-times').html('');
                $('#not-available').html('');
                var element = document.getElementById('location_block');
                element.classList.add('block-hide');

                var id = $(this).data("type");
                branch_id = null;


                get_technical_exams(branch_id);
            });

      function displayCalendar(technical_exams){



        $('#calendar-apppearance').remove();
        $('<div id="calendar-apppearance"></div>').appendTo('#calendar-container')
        var $calender = $("#calendar-apppearance");

        var now = new Date();
        // console.log(exams);

        var events = [];

        technical_exams.forEach(function(list) {
            events.push({
                date: list.date,
                timeslot: list.timeslot,
                classname: "clickable event-clickable",
                id:list.id
            });
        });


        $calender.zabuto_calendar({
            update: true,
            classname: 'table event-colourful table-bordered lightgrey-weekends',
            week_starts: 'monday',
            show_days: true,
            cell_border: true,
            weekstartson: 0,
            navigation_markup: {
                prev: '<i class="fas fa-chevron-circle-left"></i>',
                next: '<i class="fas fa-chevron-circle-right"></i>'
            },


            events:events

        });

        let allBtns = document.querySelectorAll("td")
        $calender.on('zabuto:calendar:day', function (e) {


        var momentDate = moment(e.date, 'ddd MMM DD YYYY HH:mm:ss [GMT]ZZ');
        var isoDate = momentDate.format('YYYY-MM-DD');


        var filteredEvents = events.filter(function(event) {
        return event.date === isoDate;
    });

    timeslot = [];

    if (filteredEvents.length > 0) {

        filteredEvents.forEach(function(event) {

            timeslot.push({
                slot: event.timeslot,
                id:event.id
            });
        });
    }

    if (timeslot.length > 0) {

            var timeSlots = '';

            for (var i = 0; i < timeslot.length; i++) {
                var time = timeslot[i]['slot'];
                var id = timeslot[i]['id'];
                // var isAmStart = appointment.start_time < '12:00:00';
                // var isAmEnd = appointment.end_time < '12:00:00';
                var isAmStart = '';
                var isAmEnd = '';
                timeSlots += '<button type="button" class="time-slot" data-toggle="modal" data-target="#appointmentModal" data-exam-id="' + id + '" data-time="'+time+'">' + time +'</button>';
            }

            $('#available-times').html(timeSlots);

            $('.time-slot').click(function (e) {
                e.preventDefault();
                var examId = $(this).data("exam-id");
                var dsiplayTime = $(this).data("time");
                // alert(dsiplayTime);
                // var endTime = $(this).data("end-time");
                $('#appointment-form input[name="exam_id"]').val(examId);
                $('#booking_date').html('<b>'+isoDate+'</b>');
                // if(id == 1){
                //     $('#booking_service').html('<b>Education Service</b>');
                // }
                // if(id == 2){
                //     $('#booking_service').html('<b>Migration/Visa Service</b>');
                // }
                $('#time').html('&nbsp;<b>('+dsiplayTime+')</b>');
                // $('#end_time').html('<b>'+endTime+')</b>');
                $("#modal").modal("show");

            });
    }

    allBtns.forEach(function(el){
                el.classList.remove("active");
            });

            // Add the class on clicked one
            e.target.classList.add("active");
    })
    }


    function get_technical_exams(branch_id)
    {
        $.ajax({
                url: "/student/technical_exam_dates",
                    type:"POST",
                        data:{
                                branch_id:branch_id
                             },
                            success:function(response){
                                if (response) {
                                    if(response.technical_exams.length > 0){
                                        var element = document.getElementById('calendar-container');
                                        element.classList.remove('block-hide');
                                        console.log(response.technical_exams);
                                        displayCalendar(response.technical_exams);
                                    }else{
                                        // var element = document.getElementById('calendar-container');
                                        // element.classList.remove('block-hide');
                                        $('#calendar-apppearance').remove();
                                        $('#not-available').html('No dates available');
                                    }
                                        // var appointments = response.appointment;
                                        // formated_date = response.formated_date
                                        // dispalyAppointments(appointments,formated_date,id);
                                }
                            },
                            error: function(response) {

                            }
        });
    }

    function submitBooking(){

            // loaderenqBtn.classList.add('displayBtn')
            // appointmentBtn.classList.add('buttonload')
            $.ajax({
                url: "/student/technical_exam_submit",
                type: "post",
                data: $("#appointment-form").serialize(),
                success: function(response) {
                    $("#modal").modal("hide");
                    // var isAmStart = response.appointment.start_time < '12:00:00';
                    // var isAmEnd = response.appointment.end_time < '12:00:00';

                    // loaderenqBtn.classList.remove('displayBtn');
                    Swal.fire({
                        title: 'Booked!!',
                        text: 'Exam Successfully Booked',
                        icon: 'success'
                        }).then(function(){
                        location.reload();
                        }
                        )
                }
            });

    }


</script>

