<option value="" selected disabled class="option">Please Select the Batch</option>
@foreach($settings as $setting)
    <option value="{{$setting->id}}"  @if(old('batch_id') == $setting->id) selected @endif class="option">
        {{$setting->time_slot->course->name}} [{{$setting->time_slot->time_table->day}}]
        [{{$setting->time_slot->time_table->start_time}} {{$setting->time_slot->time_table->end_time}}] [Batch {{$setting->id}}]
    </option>
@endforeach
