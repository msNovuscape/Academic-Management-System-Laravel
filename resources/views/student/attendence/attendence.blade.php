<div class="attendence">
    <div class="container-fluid">
        <div class="row">
            <div class="filter-btnwrap justify-content-between">
                <div class="d-flex">
{{--                    <div class="input-group">--}}
{{--                        <span>--}}
{{--                            <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                        </span>--}}
{{--                        <input type="text" class="form-control" id="inputText" placeholder="Search" name="fullname" value=""/>--}}
{{--                    </div>--}}
{{--                    <div class="filter-btn mx-4">--}}
{{--                        <a href="" class="d-flex gap-2 text-decoration-none text-white">--}}
{{--                            <img src="{{url('icons/union.svg')}}" class="icon" alt=""/>--}}
{{--                            Filter--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div class="filter-btn mx-2">--}}
{{--                        <a href="" >--}}
{{--                            <img src="{{url('icons/refresh-icon.svg')}}" alt=""/>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-md-8">
                <h1>Attendence Log Details</h1>
                <div class="attendence-log  justify-content-between">
                    <p>Daily Attendance Login details</p>
{{--                    <div class="d-flex">--}}
{{--                        <div>--}}
{{--                            <p class="m-0">--}}
{{--                                Show--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <select class="mx-2 show-count">--}}
{{--                                <option selected>10</option>--}}
{{--                                <option value="1">10</option>--}}
{{--                                <option value="2">20</option>--}}
{{--                                <option value="3">30</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <p>Showing 1 - 11 of  100 results</p>--}}
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                        <div class="card-wrap form-block p-4">
                            <div class="row">
                                <div class="col-12 table-responsive sd-table">
                                    <table class="table attendance-table" id="">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                            <tbody id="student_list">
                                                @foreach($setting->attendances as $attendance)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$attendance->date}}</td>
                                                        @if($attendance->status == 1)
                                                            <td>
                                                                <a type="button"  class="status-table text-decoration-none">Present</a>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a type="button" class="status-table-absent text-decoration-none">Absent</a>
                                                            </td>
                                                        @endif
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
            <div class="col-md-4 calender-view">
                <div class="calender">
                    <h1>Calendar</h1>
                    <p>Your monthly calendar</p>
                    <div class="calender-detail">
                        <div class="row calender-top">
                            <div class="wrapper">
                                <div class="container-calendar">
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <h1 id="monthAndYear" class="d-flex justify-content-start"></h1>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex gap-4 justify-content-end calender-arrow">
                                                <div>
                                                    <button class="calender-button">
                                                        <i class="fa-solid fa-angle-left" id="previous" onclick="previous()"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    <button class="calender-button">
                                                        <i class="fa-solid fa-angle-right" id="next" onclick="next()"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table-calendar" id="calendar" data-lang="en">
                                        <thead id="thead-month"></thead>
                                        <tbody id="calendar-body"></tbody>
                                    </table>
                                    <div class="footer-container-calendar" style="display: none">
                                        <select id="month" >
                                            <option value=0>Jan</option>
                                            <option value=1>Feb</option>
                                            <option value=2>Mar</option>
                                            <option value=3>Apr</option>
                                            <option value=4>May</option>
                                            <option value=5>Jun</option>
                                            <option value=6>Jul</option>
                                            <option value=7>Aug</option>
                                            <option value=8>Sep</option>
                                            <option value=9>Oct</option>
                                            <option value=10>Nov</option>
                                            <option value=11>Dec</option>
                                        </select>
                                        <select id="year" ></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="records mt-4">
                    <h1>Records</h1>
                    <p>Attendance related records</p>
                    <div class="record-detail">
{{--                        <div class="row record-top">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="d-flex gap-1">--}}
{{--                                    <div>--}}
{{--                                        <img src="{{url('icons/time.svg')}}">--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <h2>45 Hours</h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p>Required Hours</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 d-flex gap-4 justify-content-end">--}}
{{--                                <div class="">--}}
{{--                                    <div class="d-flex gap-1">--}}
{{--                                        <div>--}}
{{--                                            <img src="{{url('icons/time.svg')}}">--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h2>31.5 Hours  </h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p>Remaining Hours</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <span class="line"></span>
                        <div class="record-bottom">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Present</td>
                                    <td>:</td>
                                    <td>{{$setting->attendances->where('status',1)->count()}} Days</td>
                                </tr>
                                <tr>
                                    <td>Absent</td>
                                    <td>:</td>
                                    <td>{{$setting->attendances->where('status',2)->count()}} Days</td>
                                </tr>
                                <tr>
                                    <td>Hours</td>
                                    <td>:</td>
                                    <td>{{$setting->attendances->where('status',1)->count() * ((strtotime($setting->admission->batch->time_slot->time_table->end_time) - strtotime($setting->admission->batch->time_slot->time_table->start_time)) / 3600)}} Hours</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
