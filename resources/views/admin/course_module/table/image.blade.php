@if(isset($setting))
    @if($setting->course_modules->count() > 0)
        <div class="col-sm-12 col-md-6 stretch-card sl-stretch-card mt-4"  id="tutor-course">
            <div class="row">
                <div class="col-12 table-responsive table-details">
                    <table class="table" id="my-table">
                        <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($setting->course_modules as $courseModule)
                            <tr id="tr_update_{{$courseModule->id}}">
                                <td>
                                    <input type="text" class="form-control image" name="name_old[{{$courseModule->id}}]" value="{{$courseModule->name}}" required>
                                </td>
                                <td>
                                    <a class="btn btn-danger"  role="button" onclick="getPermanentyDelete({{$courseModule->id}})">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary"  role="button" style="float: right" onclick="getMore()">Add More</a>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="col-sm-12 col-md-6 stretch-card sl-stretch-card mt-4"  id="tutor-course">
        <div class="row">
            <div class="col-12 table-responsive table-details">
                <table class="table" id="my-table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="tr_1">
                        <td>
                            <input type="text" class="form-control image" name="name[]" required>
                        </td>
                        <td>
                            <a class="btn btn-danger"  role="button" onclick="getDelete(1)">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary"  role="button" style="float: right" onclick="getMore()">Add More</a>
            </div>
        </div>
    </div>
@endif


