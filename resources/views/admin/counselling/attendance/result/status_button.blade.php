@if($setting->status == 1)
    <button class="active-button" type="button" onclick="singleAttendance({{$setting->id}},{{$setting->status}})" id="att_btn{{$setting->id}}">Present</button>
@elseif($setting->status == 2)
    <button class="deactive-button" type="button" onclick="singleAttendance({{$setting->id}},{{$setting->status}})" id="att_btn{{$setting->id}}">Absent</button>
@endif
