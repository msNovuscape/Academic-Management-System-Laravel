<table class="table">
    <thead>
        <tr>
            <th scope="col">S.N.</th>
            <th scope="col">Due Date</th>
            <th scope="col">Batch</th>
            <th scope="col">Installment</th>
            <th scope="col">Name</th>
            <th scope="col">Student Id</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($settings as $setting)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$setting->batch_installment->due_date}}</td>
                <td>{{$setting->admission->batch->name}}</td>
                <td>{{config('custom.installment_types')[$setting->batch_installment->installment_type]}}</td>
                <td>{{$setting->admission->user->name}}</td>
                <td>{{$setting->admission->student_id}}</td>
                <td>{{$setting->admission->user->email}}</td>
                @if($setting->admission->student)
                    <td>{{$setting->admission->student->mobile_no}}</td>
                @else
                    <td>-</td>
                @endif
                <td>{{$setting->batch_installment->amount - $setting->amount}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
