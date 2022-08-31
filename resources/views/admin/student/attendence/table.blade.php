<table class="table" id="attendance_table">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody id="student_list">
    @foreach($setting->attendances as $std_attendance)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$std_attendance->date}}</td>
            @if($std_attendance->status == 1)
                <td id="td_status{{$std_attendance->id}}"><button class="active-button" type="button" onclick="singleAttendance({{$std_attendance->id}},{{$std_attendance->status}})" id="att_btn{{$std_attendance->id}}">Present</button></td>
            @else
                <td id="td_status{{$std_attendance->id}}"><button class="deactive-button" type="button" onclick="singleAttendance({{$std_attendance->id}},{{$std_attendance->status}})" id="att_btn{{$std_attendance->id}}">Absent</button></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
