<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header">
                    <h3>Attendance Info</h3>
                </div>
                <div class="row p-4">
                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <div class="row">
                                    <p> Present = {{$presentCount}}, Absent = {{$absentCount}}</p>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Attendance By</th>
                                        </tr>
                                        </thead>
                                        <tbody id="student_list">
                                        @foreach($attendances as $attendance)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attendance->date}}</td>
                                                @if($attendance->status == '1')
                                                    <td><button class="active-button" type="button">Present</button></td>
                                                @else
                                                    <td><button class="deactive-button" type="button">Absent</button></td>
                                                @endif
                                                <td>{{$attendance->user->name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
