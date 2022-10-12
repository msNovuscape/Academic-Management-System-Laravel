@extends('layouts.app')
@section('title')
    <title>Attendance Report</title>
@endsection
@section('main-panel')
    <div class="main-panel main-panel-table">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <div class="content-wrapper content-wrapper-bg">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Attendance Report</h4>
                        </div>
                    </div>
                    <div>
                        @include('success.success')
                        @include('errors.error')
                    </div>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4">
                        <div class="card-wrap form-block p-0">
                            <div class="block-header p-4">
                                <h3>Attendance Table [{{$batch->name}}]</h3>
                                <div class="tbl-buttons">
                                    <ul class="mb-0 px-2">
                                        <li>
                                            <a href="{{url('reports/attendance')}}">
                                                <img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                    <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                        <div class="row">
                                            <div class="col-12 table-responsive table-details">
                                                <table class="table table-bordered table-responsive table-installment">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">S.N.</th>
                                                            <th scope="col">Name</th>
                                                            @foreach($settings->groupBy('date') as $att_date)
                                                                <th>{{$att_date[0]->date}}</th>
                                                            @endforeach
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($settings->groupBy('student_id') as $att_student)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="table-image">
                                                                            @if($att_student[0]->student)
                                                                                <img src="{{url($att_student[0]->student->image)}}" alt=""/>
                                                                            @else
                                                                                <img src="{{url('images/no_images.png')}}" alt=""/>
                                                                            @endif
                                                                        </div>
                                                                        <div class="d-flex flex-column name-table">
                                                                            <p>{{$att_student[0]->student->admission->user->name}}</p>
                                                                            <p>{{$att_student[0]->student->admission->student_id}}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
{{--                                                                @foreach($settings->where('student_id',$att_student[0]->student_id) as $setting)--}}
{{--                                                                    <td class="text-center">{{$setting->symbol}}</td>--}}
{{--                                                                @endforeach--}}
                                                                @foreach($settings->groupBy('date') as $att_date1)
                                                                    @php
                                                                        $my_attendance = $settings->where('student_id',$att_student[0]->student_id)->where('date',$att_date1[0]->date)
                                                                    @endphp
                                                                    @if($my_attendance->count() > 0)
                                                                        <td class="text-center">{{$my_attendance->first()->symbol}}</td>
                                                                    @else
                                                                        <td class="text-center">-</td>
                                                                    @endif
                                                                @endforeach
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
        </div>
    </div>
    <!-- Add Finance Modal -->
    <div class="modal fade" id="editFinanceModal" tabindex="-1" aria-labelledby="ModalLabelAddCourse" aria-hidden="true">
    </div>
    {{--    @include('admin.finance.finance_modal_edit')--}}
@endsection
