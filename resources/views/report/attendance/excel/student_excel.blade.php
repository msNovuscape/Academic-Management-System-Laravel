<table class="table">
    <thead>
        <tr>
            <th>Name:</th>
            <th>{{$student->admission->user->name}}</th>
            <th>Batch</th>
            <th>{{$batch->name}}</th>
        </tr>
        <tr>
            <th>S.N.</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$setting->date}}</td>
                @if($setting->status == 1)
                    <td class="text-center" style="background-color: #21ba45;">{{$setting->symbol}}</td>
                @else
                    <td class="text-center" style="background-color: #FF0000;">{{$setting->symbol}}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
