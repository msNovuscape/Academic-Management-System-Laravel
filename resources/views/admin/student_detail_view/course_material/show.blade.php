<div class="attendence">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1>Course Materials</h1>
                <div class="attendence-log  justify-content-between">
                    <p>List of Course Materials</p>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                        <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                            <div class="row">
                                <div class="col-12 table-responsive table-details">
                                    <table class="table" id="">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>S.N.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Module</th>
                                            <th>Type</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="student_list">
                                        @foreach($course_materials as $course_material)
                                            @if($course_materials_assigned->count() > 0 && $setting->course_material_not_assigneds->count() > 0)
                                                <tr>
                                                    <td>
                                                        <div class="form-check ms-1">
                                                            <input class="form-check-input checkbox" id="course_material{{$course_material->id}}" type="checkbox" value="{{$course_material->id}}"  name="course_material_id"  @if($course_materials_assigned->where('id', $course_material->id)->count() > 0 && $setting->course_material_not_assigneds->where('course_material_id', $course_material->id)->count() == 0) checked @endif onclick="getUpdate('{{$setting->id}}', '{{$course_material->id}}')">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$course_material->name}}</td>
                                                    <td>{{$course_material->description}}</td>
                                                    <td>{{$course_material->course_material_module ? $course_material->course_material_module->course_module->name : "-"}}</td>
                                                    <td>{{config('custom.setting_types')[$course_material->type]}}</td>
                                                    <td>
                                                        <a href="{{$course_material->link}}" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @elseif($course_materials_assigned->count() > 0)
                                                <tr>
                                                    <td>
                                                        <div class="form-check ms-1">
                                                            <input class="form-check-input checkbox" id="course_material{{$course_material->id}}" type="checkbox" value="{{$course_material->id}}"  name="course_material_id"  @if($course_materials_assigned->where('id', $course_material->id)->count() > 0) checked @endif onclick="getUpdate('{{$setting->id}}', '{{$course_material->id}}')">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$course_material->name}}</td>
                                                    <td>{{$course_material->description}}</td>
                                                    <td>{{$course_material->course_material_module ? $course_material->course_material_module->course_module->name : "-"}}</td>
                                                    <td>{{config('custom.setting_types')[$course_material->type]}}</td>
                                                    <td>
                                                        <a href="{{$course_material->link}}" target="_blank"><i class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
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
    </div>
</div>
