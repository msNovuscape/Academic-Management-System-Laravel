<div class="col-sm-12 col-md-12 stretch-card mt-4" id="material_select">
    <div class="card-wrap form-block p-0">
        <div class="block-header bg-header d-flex justify-content-between p-4">
            <div class="d-flex flex-column">
                <h3>Course Materials</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                    <div class="row">
                        <div class="col-12 table-responsive table-details">
                            <table class="table" id="">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check" onclick="allCheck()">
                                            <input class="form-check-input" type="checkbox" value="" id="select_all" @if($setting->batch_course_materials->count() == $course_materials->count()) checked @endif>
                                            <label class="form-check-label" for="selectAll">
                                                Select All
                                            </label>
                                        </div>
                                    </th>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Link</th>
                                </tr>
                                </thead>
                                <tbody id="student_list">
                                @foreach($course_materials as $course_material)
                                    <tr>
                                        <td>
                                            <div class="form-check ms-1">
                                                <input class="form-check-input checkbox" type="checkbox" value="{{$course_material->id}}"  name="course_material_id[]" onclick="allCheck()" @if($setting->batch_course_materials->where('course_material_id',$course_material->id)->count() > 0) checked @endif>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$course_material->name}}</td>
                                        <td>{{$course_material->description}}</td>
                                        <td>{{config('custom.setting_types')[$course_material->type]}}</td>
                                        @if($course_material->type == 1)
                                            <td><a href="{{url($course_material->link)}}" target="_blank"><i class="fa-solid fa-eye"></i></a></td>
                                        @else
                                            <td><a href="{{$course_material->link}}" target="_blank"></a><i class="fa-solid fa-eye"></i></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="pagination-section">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
