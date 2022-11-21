<div class="row role-table" id="personal-permission">
    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
        <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
            <div class="row">
                <div class="col-12 table-responsive table-details">
                    <table class="table" id="">
                        <thead>
                        <tr>
                            <th>S.N.1</th>
                            <th>Name</th>
                            <th>
                                <div class="d-flex">
                                    <div class="tblform-check">
                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall-create">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <div>
                                        Create
                                    </div>
                                </div>
                            </th>
                            <th><div class="d-flex">
                                    <div class="tblform-check">
                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall-show">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <div>
                                        Read
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    <div class="tblform-check">
                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall-update">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <div>
                                        Update
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    <div class="tblform-check">
                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall-delete">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <div>
                                        Delete
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    <div class="tblform-check">
                                        <input class="form-check-input-master" type="checkbox" value="" id="selectall-report">
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <div>
                                        Report
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="student_list">
                        @foreach($settings as $setting)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$setting->common_name}}</td>
                                <td>
                                    <div class="tblform-check">
                                        <input name="create_p[]" class="form-check-input-master checkbox-create" type="checkbox" value="{{$permissions->where('slug', 'create_'.$setting->table_name)->first()->id}}" @if($userPermissions->where('user_id', $userRole->user_id)->where('permission_id', $permissions->where('slug', 'create_'.$setting->table_name)->first()->id)->count() > 0) checked  @endif>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="tblform-check">
                                        <input name="show_p[]" class="form-check-input-master checkbox-show" type="checkbox" value="{{$permissions->where('slug', 'show_'.$setting->table_name)->first()->id}}" @if($userPermissions->where('user_id', $userRole->user_id)->where('permission_id', $permissions->where('slug', 'show_'.$setting->table_name)->first()->id)->count() > 0) checked  @endif>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="tblform-check">
                                        <input name="update_p[]" class="form-check-input-master checkbox-update" type="checkbox" value="{{$permissions->where('slug', 'update_'.$setting->table_name)->first()->id}}" @if($userPermissions->where('user_id', $userRole->user_id)->where('permission_id', $permissions->where('slug', 'update_'.$setting->table_name)->first()->id)->count() > 0) checked  @endif>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="tblform-check">
                                        <input name="delete_p[]" class="form-check-input-master checkbox-delete" type="checkbox" value="{{$permissions->where('slug', 'delete_'.$setting->table_name)->first()->id}}" @if($userPermissions->where('user_id', $userRole->user_id)->where('permission_id', $permissions->where('slug', 'delete_'.$setting->table_name)->first()->id)->count() > 0) checked  @endif>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="tblform-check">
                                        <input name="report_p[]" class="form-check-input-master checkbox-report" type="checkbox" value="{{$permissions->where('slug', 'report_'.$setting->table_name)->first()->id}}" @if($userPermissions->where('user_id', $userRole->user_id)->where('permission_id', $permissions->where('slug', 'report_'.$setting->table_name)->first()->id)->count() > 0) checked  @endif>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
