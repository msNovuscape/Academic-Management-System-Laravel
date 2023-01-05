<div class="col-sm-12 col-md-6 mt-4" id="course-module-dom">
    <div class="form-group batch-form">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <label>Course Module</label>
                </div>
                <div class="col-md-9">
                    <div class="input-group">
                        <select name="course_module_id" id="course_module_id" class="form-control" required onchange="getBatchStudents()">
                            <option value="" selected disabled class="option-module">Please Select the module</option>
                            @foreach($course_modules as $course_module)
                                <option value="{{$course_module->id}}" @if(old('course_module_id') == $course_module->id) selected @endif class="option-module">
                                    {{$course_module->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

