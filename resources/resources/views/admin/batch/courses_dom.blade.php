<option value="" selected disabled class="option">Please Select Your TimeSlot</option>

@foreach($settings as $setting)
    <option value="{{$setting->id}}" class="option">{{$setting->time_table->day}}[{{$setting->time_table->start_time}}-{{$setting->time_table->end_time}}]</option>
@endforeach
