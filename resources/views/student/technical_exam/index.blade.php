<div class="row">
    {{-- <div class="col-sm-12 col-md-6">
        <div class="exam-details-lblock">
          <h5>Exam Details</h5>

        </div>


        <? if($row['exam_type'] == 'physical'){?>
        <div class="physical-exam mt-4">
          <h5>Exam Test Center</h5>
          <h6><i class="mdi mdi-map-marker-radius me-2 "></i><? echo $row['exam_center']?></h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div>
        <?}else{?>
          <div class="physical-exam mt-4">
          <h5>Exam Type</h5>
          <h6><i class="mdi mdi-map-marker-radius me-2 "></i><? echo $row['exam_type']?></h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div>
        <?}?>

        <div class="physical-exam mt-4">
          <h5>Exam Booked On</h5>
          <h6><? echo $row['booking_date']?></h6>
          <!-- <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p> -->
        </div>
      </div>
      <div class="col-sm-12 col-md-6 mt-4 d-time">
          <h5>Your exam Date and Time</h5>
          <p><i class="mdi mdi-calendar-blank me-2"></i><?echo $row['exam_date']?></p>
          <p><i class="mdi mdi-av-timer me-2"></i><?echo $row['time_slot']?></p>
      </div>

      <?}else{?>
        <div class="row"> --}}

      <div class="col-sm-12 col-md-6">
        <div class="checks-wrap">
          <h5>How would you like to take an exam?</h5>
          <ul>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_type" value = "online" id="online" onclick = "hideLocation()" required>
                <label class="form-check-label" for="online">Online Exam</label>
              </div>
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_type" id="physical" value = "physical" onclick = "showLocation()">
                <label class="form-check-label" for="physical">Physical Exam</label>
              </div>
            </li>
          </ul>
        </div>
        <div class="physical-wrap block-hide" id = "location_block">
          <ul>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exam_center" value="Sydney" id="sydRadio">
                  <label class="form-check-label" for="sydRadio">
                  <h5>Sydney</h5>
                  <p>Suite 132 & 133, Level 3 10 Park Road, Hurstville NSW 2220</p>
                </label>
              </div>
            </li>
            <li>
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
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 maintime-wrap">
          <h5>Choose the exam date and time bellow</h5>
        <div name = "selected_date" id="datepicker">
        </div>
        <div class="examtime-wrap">
            <button type = "submit" name = "submit" class = "block-hide" onclick = "confirmBook(this.id);" id = "9:00AM-12:00PM">9:00AM - 12:00PM</button>
            <button class = "block-hide" id = "12:00PM-3:00PM" onclick = "confirmBook(this.id);">12:00PM - 3:00PM</button>
            <button class = "block-hide" id = "3:00PM-6:00PM" onclick = "confirmBook(this.id);">3:00PM - 6:00PM</button>
        </div>
      </div>
</div>

<script>
      $(function() {
        $('#datepicker').datepicker({
          beforeShowDay: $.datepicker.noWeekends,
          onSelect: function() {
            var exam_calendar_date = $('#datepicker').datepicker('getDate');
             exam_date = $.datepicker.formatDate("yy-mm-dd", exam_calendar_date);

            var element1 = document.getElementById('9:00AM-12:00PM');
            var element2 = document.getElementById('12:00PM-3:00PM');
            var element3 = document.getElementById('3:00PM-6:00PM');
            $.ajax({
              type: "post",
              url: "query/check_booking.php",
              dataType: "json",
              data: { exam_date: exam_date },
              cache: false,
              success: function (data) {
                  element1.classList.add('block-hide');
                  element2.classList.add('block-hide');
                  element3.classList.add('block-hide');
                  if(data.time_slots.length == '3'){


                    return;
                  }
                if(!data.time_slots){
                  element1.classList.remove('block-hide');
                  element2.classList.remove('block-hide');
                  element3.classList.remove('block-hide');

                }else{
                  if(data.time_slots.includes('9:00AM-12:00PM') == false){
                    element1.classList.remove('block-hide');
                  }
                  if(data.time_slots.includes('12:00PM-3:00PM') == false){
                    element2.classList.remove('block-hide');
                  }
                  if(data.time_slots.includes('3:00PM-6:00PM') == false){
                    element3.classList.remove('block-hide');
                  }
                }
              }
            });




          }

        });



      });

      function showLocation(){
    var element = document.getElementById('location_block');
    element.classList.remove('block-hide');

}
function hideLocation(){
  var element = document.getElementById('location_block');
  element.classList.add('block-hide');



}
</script>

