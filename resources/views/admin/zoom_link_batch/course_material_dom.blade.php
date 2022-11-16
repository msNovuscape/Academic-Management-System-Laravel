<div class="col-sm-12 col-md-12 stretch-card mt-4" id="material_select">
    <div class="card-wrap form-block p-0">
        <div class="block-header bg-header d-flex justify-content-between p-4">
            <div class="d-flex flex-column">
                <h3>Zoom Links</h3>
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
                                        <div class="form-check">
                                            <label class="form-check-label" for="selectAll">
                                                Please Select One
                                            </label>
                                        </div>
                                    </th>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                </tr>
                                </thead>
                                <tbody id="student_list">
                                    @foreach($course_materials as $course_material)
                                        <tr>
                                            <td>
                                                <div class="form-check ms-1">
                                                    <input class="form-check-input checkbox" type="radio" value="{{$course_material->id}}"  name="zoom_link_id">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$course_material->name}}</td>
                                            <td><a href="{{url($course_material->link)}}" target="_blank"><i class="fa-solid fa-eye"></i></a></td>
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
