<table class="table" id="tutor-table">
    <thead>
    <tr>
        <th>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="select_all">
                <label class="form-check-label" for="selectAll">
                    Select All
                </label>
            </div>
        </th>
        <th>Tutor Name</th>
    </tr>
    </thead>
    <tbody id="student_list">
    @foreach($setting->time_slot->course->activeUserTeachers as $tutor)
        <tr>
            <td>
                <div class="form-check ms-1">
                    <input class="form-check-input checkbox my-tutor" type="checkbox" value="{{$tutor->id}}"  name="user_teacher_id[]" @if($setting->activeUserTeachersBatch->where('user_teacher_id', $tutor->id)->count() > 0) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">
                    </label>
                </div>
            </td>
            <td>{{$tutor->user->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
