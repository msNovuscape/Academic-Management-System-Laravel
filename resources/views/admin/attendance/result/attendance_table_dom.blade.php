<table class="table" id="attendance_table">
    <thead>
    <tr>
        <th>
            <div class="tblform-check">
                <input class="form-check-input-master" type="checkbox" value="" id="select_all">
                <label class="form-check-label" for="flexCheckDefault"></label>
            </div>
        </th>
        <th>S.N.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="student_list">
    @foreach($settings as $setting)
        <tr>
            <td>
                <div class="tblform-check">
                    <input class="checkbox" type="checkbox" value="{{$setting->student->id}}" id="form-check-input{{$setting->id}}">
                </div>
            </td>
            <td>{{$loop->iteration}}</td>
            <td class="d-flex">
                <img src="{{url($setting->student->image)}}" alt=""/>
                <div class="d-flex flex-column name-table">
                    <p>{{$setting->student->admission->user->name}}</p>
                    <p>{{$setting->student->admission->studet_id}}</p>
                </div>
            </td>
            <td>{{$setting->student->admission->user->email}}</td>
            <td>{{$attendance_date}}</td>
            @if($setting->status == 1)
                <td id="td_status{{$setting->id}}"><button class="active-button" type="button" onclick="singleAttendance({{$setting->id}},{{$setting->status}})" id="att_btn{{$setting->id}}">Present</button></td>
            @else
                <td id="td_status{{$setting->id}}"><button class="deactive-button" type="button" onclick="singleAttendance({{$setting->id}},{{$setting->status}})" id="att_btn{{$setting->id}}">Absent</button></td>
            @endif
            <td class="action-icons">
                <ul class="icon-button d-flex">
                    <li>
                        <a class="dropdown-item" href="{{url('admin/students/attendance/'.$setting->student->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
