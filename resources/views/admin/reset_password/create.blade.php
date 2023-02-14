@extends('layouts.app')
@section('title')
    <title>Reset Password</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--start loader--}}
            <div class="loader loader-default" id="loader"></div>
            {{--end loader--}}
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <div class="d-flex flex-column">
                                <h3>Change Password [ {{$setting->user->name}} ]</h3>
                                <p> Email: <b>{{$setting->user->email}}</b></p>
                            </div>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('admissions/student_password_reset')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'admissions/student_password_reset/'.$setting->id,'method' => 'POST','onsubmit' => 'return validateForm()']) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label>Password</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" name="password" class="form-control" value="{{old('password')}}" placeholder="Enter Password" autocomplete="off" id="my-password" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" name="auto_generate" id="auto_generate" onclick="password_generator(6)">
                                                                <label class="form-check-label mt-1" for="auto_generate">
                                                                    Auto Generate
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                            <div class="row">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                    <a href="{{url('admissions/student_password_reset')}}">
                                                        <button type="button">
                                                            Skip
                                                            <i class="fa-solid fa-angles-right"></i>
                                                        </button>
                                                    </a>
                                                    <button type="submit">
                                                        Change Password
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        function password_generator( len ) {
                var length = (len)?(len):(10);
                var string = "abcdefghijklmnopqrstuvwxyz"; //to upper
                var numeric = '0123456789';
                var punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
                var password = "";
                var character = "";
                var crunch = true;
                while( password.length<length ) {
                    entity1 = Math.ceil(string.length * Math.random()*Math.random());
                    entity2 = Math.ceil(numeric.length * Math.random()*Math.random());
                    entity3 = Math.ceil(punctuation.length * Math.random()*Math.random());
                    hold = string.charAt( entity1 );
                    hold = (password.length%2==0)?(hold.toUpperCase()):(hold);
                    character += hold;
                    character += numeric.charAt( entity2 );
                    character += punctuation.charAt( entity3 );
                    password = character;
                }
                password=password.split('').sort(function(){return 0.5-Math.random()}).join('');
                $('#my-password').val(password.substr(0,len))
        }
    </script>
@endsection
