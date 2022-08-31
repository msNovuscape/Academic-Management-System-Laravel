@extends('student.enrollment.index')
@section('content')
    <main class="page-center">
        <article class="sign-up">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <h1 class="sign-up__title">
                        <div>
                            <img src="{{url('images/extratech-logo.png')}}" alt="">
                        </div>
                    </h1>
                    <p class="sign-up__subtitle">Change Password</p>
                    @include('errors.error')
                    @include('success.success')
                    {!! Form::open(['url' => 'student/new-password','method' => 'POST', 'class' => 'sign-up-form form']) !!}
                        <label class="form-label-wrapper">
                            <p class="form-label">Email</p>
                            <input name="email" class="form-input" type="email" placeholder="Enter your email" required readonly disabled value="{{Auth::user()->email}}"/>
                        </label>
                        <label class="form-label-wrapper">
                            <p class="form-label">New Password</p>
                            <input name="password" class="form-input" type="password" placeholder="Enter your password" required/>
                        </label>
                        <label class="form-label-wrapper">
                            <p class="form-label">Confirm New Password</p>
                            <input name="password_confirmation" class="form-input" type="password" placeholder="Enter your password" required/>
                        </label>
                        <button class="form-btn primary-default-btn transparent-btn mt-4">
                            Sign in
                        </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </article>
    </main>
@endsection
