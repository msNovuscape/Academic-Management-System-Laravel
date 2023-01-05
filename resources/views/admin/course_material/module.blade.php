<option value="" selected disabled class="option-module">Please Select the module</option>
@foreach($settings as $setting)
    <option value="{{$setting->id}}" @if(old('course_module_id') == $setting->id) selected @endif class="option-module">
        {{$setting->name}}
    </option>
@endforeach
