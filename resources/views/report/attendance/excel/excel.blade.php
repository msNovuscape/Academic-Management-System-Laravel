<table class="table">
    <thead>
        <tr>
            <th scope="col">S.N.</th>
            <th scope="col">Name</th>
            <th scope="col">Id</th>
            <th scope="col">Batch</th>
            @foreach($settings->groupBy('date') as $att_date)
                <th>{{$att_date[0]->date}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($settings->groupBy('student_id') as $att_student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <div class="d-flex">
                        <div class="d-flex flex-column name-table">
                            <p>{{$att_student[0]->student->admission->user->name}}</p>
                        </div>
                    </div>
                </td>
                <td>{{$att_student[0]->student->admission->student_id}}</td>
                <td>{{$att_student[0]->student->admission->batch->name}}</td>
                @foreach($settings->groupBy('date') as $att_date1)
                    @php
                        $my_attendance = $settings->where('student_id',$att_student[0]->student_id)->where('date',$att_date1[0]->date)
                    @endphp
                    @if($my_attendance->count() > 0)
                        @if($my_attendance->first()->status == 1)
                            <td class="text-center" style="background-color: #21ba45;">{{$my_attendance->first()->symbol}}</td>
                        @else
                            <td class="text-center" style="background-color: #FF0000;">{{$my_attendance->first()->symbol}}</td>
                        @endif
                    @else
                        <td class="text-center" style="background-color: #ffff00;">Null</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
