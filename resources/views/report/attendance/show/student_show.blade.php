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
                                <h3>Attendance Table [{{$batch->name}}, {{$student->admission->user->name}}]</h3>
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
                                                        <th>S.N.</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($settings as $setting)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$setting->date}}</td>
                                                                <td class="text-center">{{$setting->symbol}}</td>
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
@endsection
