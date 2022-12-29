<div class="row">
    <div class="col-sm-12 col-md-12 mt-4 mb-3 sd-firstrow">
        @foreach(config('custom.counselling_statuses') as $index_c => $value_c)
            <div class="border-block sd-blocks">
                <div class="block-body">
                    <h5>{{$value_c}}</h5>
                    <p>You have completed this stage</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-sm-12 col-md-12 mt-3 mb-3">
        <div class="border-block">
            <div class="block-header">
                <h4>Progress Bar</h4>
            </div>
            <div class="block-body sd-progress-block">
                <div class="progress sd-progress mt-3">
                    @if($setting->sCounselling)
                        <div class="progress-bar bg-success pb" style="width: {{$setting->sCounselling->studentCounsellingStatuses->count() * 20}}% " id='my-progressbar' role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    @else
                        <div class="progress-bar bg-success pb" id='my-progressbar'   role="progressbar"  aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                    @if($setting->sCounselling)
                        @if($setting->sCounselling->studentCounsellingStatuses->count() < 5)
                            <div class="progress-bar bg-warning" style="width: 20% "  role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                    @endif
                </div>
                <div class="arrow">
                    @foreach(config('custom.counselling_statuses') as $index_cc => $value_cc)
                        <div class="arrow-block">
                            <div class="block"></div>
                            <p>{{$value_cc}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            @if($setting->sCounselling)
                @if($setting->sCounselling->studentCounsellingStatuses->count() > 0)
                    @foreach($setting->sCounselling->studentCounsellingStatuses as $studentCounsellingStatus)
                        <div class="col-sm-12 col-md-6 mt-3 mb-3">
                            <div class="border-block">
                                <div class="block-header">
                                    <h4>{{config('custom.counselling_statuses')[$studentCounsellingStatus->status]}}</h4>
                                </div>
                                <div class="block-body">
                                    <p>{!! $studentCounsellingStatus->comment !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            @endif
        </div>
        <div class="col-12 career-table table-responsive grid-margin mt-2x">
            <div class="block-header">
                <h3>Attendance</h3>
            </div>
            <table class="table mt-2">
                <thead class="tbl-light-head">
                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($setting->sCounselling)
                    @if($setting->sCounselling->s_counselling_attendances->count() > 0)
                        @foreach($setting->sCounselling->s_counselling_attendances_orderByDate as $s_counselling_attendance)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$s_counselling_attendance->date}}</td>
                                <td>
                                    @if($s_counselling_attendance->status == 2)
                                        <div class="td-pblock" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Absent">
                                            <label class="form-check-label" for="flexRadioDefault1">Absent</label>
                                            <i class="fa-solid fa-user-check absent"></i>
                                        </div>
                                    @else
                                        <div class="td-pblock" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Present">
                                            <label class="form-check-label" for="flexRadioDefault1">Present</label>
                                            <i class="fa-solid fa-user-check present"></i>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
