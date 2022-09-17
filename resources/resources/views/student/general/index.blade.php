<div class=" general-forms mt-4" id="editForm" style="display: none">
    {{--    <form name="general" onsubmit="event.preventDefault(); validateForm()">--}}
    {!! Form::open(['url' => 'student/update/'.$setting->id,'method' => 'POST' , 'files' => true,'onsubmit' => 'return validateForm()']) !!}
    <div class="row ">
        @include('student.general.general')
        @include('student.general.residential')
    </div>
{!! Form::close() !!}
{{--    </form>--}}
</div>
