@extends('layouts.app')
@section('title')
    <title>Carrier Counselling</title>
@endsection
@section('main-panel')
    {!! Form::open(['url' => 'counselling_test', 'method' => 'GET']) !!}
        <div class="form-check">
            @foreach(config('custom.counselling_statuses') as $index => $value)
                <input class="form-check-input" type="checkbox" value="{{$index}}" name="status[]">
                <textarea name="comment[{{$index}}]" id="" cols="30" rows="10"></textarea>
                <label class="form-check-label" for="flexCheckDefault">
                    {{$value}}
                </label>
                <br>
            @endforeach
        </div>
    <button type="submit">Submit</button>
    {!! Form::close() !!}
@endsection
