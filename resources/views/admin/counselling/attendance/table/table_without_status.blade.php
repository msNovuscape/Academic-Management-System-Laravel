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
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="student_list">
    @foreach($settings as $setting)
        <tr id="student_row{{$setting->id}}">
            <td>
                <div class="tblform-check">
                    <input class="checkbox" type="checkbox" value="{{$setting->id}}" id="form-check-input{{$loop->iteration}}">
                </div>
            </td>
            <td>{{$loop->iteration}}</td>
            <td class="">
                <div class="d-flex">
                    <div class="table-image">
                        @if($setting->admission->student)
                            <img src="{{url($setting->admission->student->image)}}" alt=""/>
                        @else
                            <img src="{{url('images/no_images.png')}}" alt=""/>
                        @endif
                    </div>
                    <div class="d-flex flex-column name-table">
                        <p>{{$setting->admission->user->name}}</p>
                        <p>{{$setting->admission->student_id}}</p>
                    </div>
                </div>
            </td>
            <td>{{$setting->admission->user->email}}</td>
            @if($setting->s_counselling_attendances->where('date', $date)->count() > 0 )
                @if($setting->s_counselling_attendances->where('date', $date)->first()->status == 1)
                    <td id="td_status{{$setting->s_counselling_attendances->where('date', $date)->first()->id}}"><button class="active-button" type="button" onclick="singleAttendance({{$setting->s_counselling_attendances->where('date', $date)->first()->id}},{{$setting->s_counselling_attendances->where('date', $date)->first()->status}})" id="att_btn{{$setting->s_counselling_attendances->where('date', $date)->first()->id}}">Present</button></td>
                @else
                    <td id="td_status{{$setting->s_counselling_attendances->where('date', $date)->first()->id}}"><button class="deactive-button" type="button" onclick="singleAttendance({{$setting->s_counselling_attendances->where('date', $date)->first()->id}},{{$setting->s_counselling_attendances->where('date', $date)->first()->status}})" id="att_btn{{$setting->s_counselling_attendances->where('date', $date)->first()->id}}">Absent</button></td>
                @endif
            @else
                <td id="td_status{{$setting->id}}">-</td>
            @endif
            <td class="action-icons">
                <ul class="icon-button d-flex">
                    <li>
                        <a class="dropdown-item"   href="{{url('counselling/'.$setting->admission->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="view"><i class="fa-solid fa-eye"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
