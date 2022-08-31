<option value="" selected disabled class="option-student">Please Select the Name</option>
@foreach($settings as $setting)
    <option value="{{$setting->admission_id}}" @if(old('name') == $setting->id) selected @endif class="option-student">
        {{$setting->admission->user->name}}
    </option>
@endforeach
