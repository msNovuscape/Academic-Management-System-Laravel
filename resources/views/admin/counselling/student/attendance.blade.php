@if($setting->sCounselling)
    <div class="col-sm-12 col-md-6 mt-3 mb-3">
        {!! Form::open(['url' => 'counselling/attendance/'.$setting->id, 'method' => "POST"]) !!}
        <div class="border-block">
            <div class="block-header">
                <h4>Attendance</h4>
            </div>
            <div class="block-body">
                <div class="col-md-6 mb-3 form-group">
                    <label class="form-label">Date</label>
                    <input type="text" class="form-control" id="sDate" name="date" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Status</label>
                    <div class="radio-wrap">
                        <div class="radio-top">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                            <label class="form-check-label" for="flexRadioDefault1">Present</label>
                            <i class="fa-solid fa-user-check present"></i>
                        </div>
                        <div class="radio-top">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="2">
                            <label class="form-check-label" for="flexRadioDefault2">Absent</label>
                            <i class="fa-solid fa-user-check absent"></i>
                        </div>
                    </div>
                    @if(Auth::user()->customMenuPermission('create_s_counselling_attendances'))
                        <div class="col-md-2 btn-wrap">
                            <button type="submit" name="catsave" class="btn btn-ctm-save">Save</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@else
    <div class="col-sm-12 col-md-6 mt-3 mb-3">
        {!! Form::open(['url' => 'counselling/attendance/'.$setting->id, 'method' => "POST"]) !!}
        <div class="border-block">
            <div class="block-header">
                <h4>Attendance</h4>
            </div>
            <div class="block-body">
                <div class="col-md-6 mb-3 form-group">
                    <label class="form-label">Date</label>
                    <input type="text" class="form-control currentDate" name="date" required disabled>
                </div>
                <div class="col-md-6 form-group">
                    <label>Status</label>
                    <div class="radio-wrap">
                        <div class="radio-top">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1" disabled>
                            <label class="form-check-label" for="flexRadioDefault1">Present</label>
                            <i class="fa-solid fa-user-check present"></i>
                        </div>
                        <div class="radio-top">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="2" disabled>
                            <label class="form-check-label" for="flexRadioDefault2">Absent</label>
                            <i class="fa-solid fa-user-check absent"></i>
                        </div>
                    </div>
                    <div class="col-md-2 btn-wrap">
                        <button type="submit" name="catsave" class="btn btn-ctm-save" disabled>Save</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endif
