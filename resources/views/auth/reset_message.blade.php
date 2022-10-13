@extends('layouts.app')
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
                    <p class="sign-up__subtitle">Please enter your valid email to send link.</p>
                    @include('errors.error')
                    @include('success.success')
                    <form class="sign-up-form form" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <label class="form-label-wrapper">
                            <p class="form-label">Email</p>
                            <input
                                name="email"
                                class="form-input"
                                type="email"
                                placeholder="Enter your email"
                                required
                            />
                        </label>
                        <button class="form-btn primary-default-btn transparent-btn">
                            Send Link
                        </button>
                    </form>
                </div>
            </div>
        </article>
    </main>
@endsection
