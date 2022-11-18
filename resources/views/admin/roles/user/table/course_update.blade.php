<div class="col-sm-12 col-md-12 stretch-card sl-stretch-card" id="tutor-course">
    <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
        <div class="row">
            <div class="col-12 table-responsive table-details">
                <table class="table" id="">
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
                        <th>S.N.</th>
                        <th>Course Name</th>
                    </tr>
                    </thead>
                    <tbody id="student_list">
                    @foreach($courses as $course)
                        <tr>
                            <td>
                                <div class="form-check ms-1">
                                    <input class="form-check-input checkbox chk-update" type="checkbox" value="{{$course->id}}"  name="course_id_update[]" @if($course->userTeachers->where('user_id', $setting->id)->where('status', 1)->count() > 0) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    </label>
                                </div>
                            </td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$course->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
