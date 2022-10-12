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
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="student_list">
    @foreach($settings as $setting)
        <tr id="student_row{{$setting->student->id}}">
            <td>
                <div class="tblform-check">
                    <input class="checkbox" type="checkbox" value="{{$setting->id}}" id="form-check-input{{$loop->iteration}}">
                </div>
            </td>
            <td>{{$loop->iteration}}</td>
            <td class="d-flex">
                <img src="{{url($setting->image)}}" alt=""/>
                <div class="d-flex flex-column name-table">
                    <p>{{$setting->admission->user->name}}</p>
                    <p>{{$setting->admission->student_id}}</p>
                </div>
            </td>
            <td>{{$setting->admission->user->email}}</td>
            <td class="action-icons">
                <ul class="icon-button d-flex">
                    <li>
                        <a class="dropdown-item"   href="{{url('admin/students/attendance/'.$setting->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
