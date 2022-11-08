@extends('layouts.app')
@section('title')
    <title> Quiz Question </title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                        <div class="card-heading">
                            <div>
                                <h4>Quiz Question Lists</h4>
                                <p>
                                    You can search the materials by <a href="#" class="card-heading-link">Question</a> and can view all available quiz questions.
                                </p>
                            </div>
                        </div>
                        {!! Form::open(['url' => 'quiz/question_show/'.$quiz->id, 'method' => 'GET']) !!}
                            <div class="filter-btnwrap mt-4">
                                <div class="col-md-12">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                <input type="text" class="form-control" id="inputText" placeholder="Search by questions" name="name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="filter-group mx-2">
                                                    <span>
                                                        <img src="{{url('icons/filter-icon.svg')}}" alt="" class="img-flud">
                                                    </span>
                                                <button class="fltr-btn" type="submit">Filter</button>
                                            </div>
                                            <div class="refresh-group mx-2">
                                                <a onclick="getResetLink('{{Request::segment(1)}}','{{Request::segment(2)}}',{{$quiz->id}})">
                                                    <img src="{{url('icons/refresh-top-icon.svg')}}" alt="" class="img-flud">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}

                        <div class="mt-2">
                            @include('success.success')
                            @include('errors.error')
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4">
                                    <div class="d-flex flex-column">
                                        <h3>Question of  {{$quiz->name}}</h3>
                                    </div>
                                    <div class="add-button">
                                        <a class="nav-link" href="{{url('quiz')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp Back</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Question</th>
                                                            <th>Type</th>
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="student_list">
                                                            @foreach($settings as $setting)
                                                                <tr>
                                                                    <td>{{$settings->firstItem() + $loop->index}}</td>
                                                                    <td>{{$setting->question}}</td>
                                                                    <td> {{config('custom.question_types')[$setting->question_type]}}</td>
                                                                    @if($setting->quiz_question_image)
                                                                        <td>
                                                                            <img src="{{url($setting->quiz_question_image->image)}}" alt="" width="100px">
                                                                        </td>
                                                                    @else
                                                                        <td>-</td>
                                                                    @endif
                                                                    <td>{{config('custom.status')[$setting->status]}}</td>
                                                                    <td class="action-icons">
                                                                        <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="dropdown-item"   href="{{url('quiz/quiz_question_show/'.$setting->id)}}" role="button"><i class="fa-solid fa-eye"></i></a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('quiz/quiz_question_edit/'.$setting->id)}}" role="button"><i class="fa-solid fa-pen"></i></a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item"  href="{{url('quiz/quiz_question_delete/'.$setting->id)}}" role="button" data-bs-toggle="tooltip" data-bs-title="delete" onclick="getConfirm()"><i class="fa-solid fa-trash"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
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
@endsection
@section('script')
    <script>
        function getConfirm() {
            if (confirm('Do you sure want to delete quiz?')) {

            } else {
                event.preventDefault();
                location.reload();
            }
        }
    </script>
@endsection
