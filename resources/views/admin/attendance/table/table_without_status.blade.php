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
        <tr id="student_row{{$setting->id}}">
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
                        <a class="dropdown-item"   href="{{url('admissions/attendances/'.$setting->admission->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="view"><i class="fa-solid fa-eye"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    @if($batchTransfers->count() > 0)
        @foreach($batchTransfers as $batchTransfer)
            <tr id="student_row{{$batchTransfer->id}}">
                <td>
                    <div class="tblform-check">
                        <input class="checkbox" type="checkbox" value="{{$batchTransfer->id}}" id="form-check-input{{$loop->iteration + $settings->count()}}">
                    </div>
                </td>
                <td>{{$loop->iteration + $settings->count()}}</td>
                <td class="d-flex">
                    <img src="{{url($batchTransfer->image)}}" alt=""/>
                    <div class="d-flex flex-column name-table">
                        <p>{{$batchTransfer->admission->user->name}}</p>
                        <p>{{$batchTransfer->admission->student_id}}</p>
                    </div>
                </td>
                <td>{{$batchTransfer->admission->user->email}}</td>
                <td class="action-icons">
                    <ul class="icon-button d-flex">
                        <li>
                            <a class="dropdown-item"   href="{{url('admissions/attendances/'.$batchTransfer->admission->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="view"><i class="fa-solid fa-eye"></i></a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>
