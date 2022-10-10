@extends('layouts.app')
@section('title')
    <title>Quiz Batch</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading">
                            <div>
                                <h4>Quiz Assigned To Batch Lists</h4>
                                <p>
                                    You can search the student by <a href="#" class="card-heading-link">name, group, date,</a> and can view all available courses.
                                </p>
                            </div>
                        </div>
                        <form id="search">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="filter-btnwrap justify-content-between">
                                            <div class="d-flex">
                                                <div class="input-group">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="inputText" placeholder="Search by Quiz" name="name" onchange="filterList()"/>
                                                </div>
                                                <div class="input-group mx-4">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                    <select name="batch_id" class="form-control" onchange="filterList()">
                                                        <option value="" selected disabled>Search by Batch</option>
                                                        @foreach($batches as $batch)
                                                            <option value="{{$batch->id}}">{{$batch->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Quiz Batch Table</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('quiz_batch_create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Quiz To Batch</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap form-block p-4 card-wrap-bs-none pt-0">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table" id="">
                                                        <thead>
                                                            <tr>
                                                                <th>S.N.</th>
                                                                <th>Quiz</th>
                                                                <th>Batch</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            @foreach($settings as $setting)
                                                                <tr>
                                                                    <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                    <td>{{$setting->quiz->name}}</td>
                                                                    <td>{{$setting->batch->name}}</td>
                                                                    <td>{{config('custom.status')[$setting->status]}}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('quiz_batch_edit/'.$setting->id)}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="pagination-section">
                                                            {{$settings->links()}}
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
            </div>
        </div>
    </div>
@endsection
