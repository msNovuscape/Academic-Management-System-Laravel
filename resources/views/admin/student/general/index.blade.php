@if(isset($edit_status))
    <div class=" general-forms mt-4" id="editForm">
@else
    <div class=" general-forms mt-4" id="editForm"  style="display: none">
@endif
    {{--    <form name="general" onsubmit="event.preventDefault(); validateForm()">--}}
    {!! Form::open(['url' => 'admin/students/'.$setting->id,'method' => 'POST' , 'files' => true]) !!}
        <div class="row ">
            @include('admin.student.general.general')
            @include('admin.student.general.residential')
        </div>
{!! Form::close() !!}
{{--    </form>--}}
</div>
