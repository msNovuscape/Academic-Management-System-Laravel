<option value="" selected disabled class="option">Please Select the Batch</option>

@foreach($settings as $setting)
    <option value="{{$setting->id}}" @if(old('batch_id') == $setting->id) selected @endif class="option">
        {{$setting->name}}
    </option>
@endforeach
