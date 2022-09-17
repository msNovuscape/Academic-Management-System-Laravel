<table class="table">
    <thead>
    <tr>
        <th scope="col" rowspan="2">S.N.</th>
        @if(request('s_name'))
            <th scope="col" rowspan="2">Name</th>
        @endif
        @if(request('student_id'))
            <th scope="col" rowspan="2">Id</th>
        @endif
        @if(request('course_id'))
            <th scope="col" rowspan="2">Course</th>
        @endif
        @if(request('batch'))
            <th scope="col" rowspan="2">Batch</th>
        @endif
        @if(request('email'))
            <th scope="col" rowspan="2">Email</th>
        @endif
        @if(request('mobile_no'))
            <th scope="col" rowspan="2">Mobile No.</th>
        @endif
        @if(request('installment1'))
            <th scope="col" colspan="5" align="center">Installment1</th>
        @endif
        @if(request('installment2'))
            <th scope="col" colspan="5" align="center">Installment2</th>
        @endif
        @if(request('installment3'))
            <th scope="col" colspan="5" align="center">Installment3</th>
        @endif
        <th scope="col" rowspan="2">Discount</th>
        <th scope="col" rowspan="2">Total</th>
    </tr>
    <tr>
        @if(request('installment1'))
            <th>Date</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Bank Status</th>
            <th>Amount</th>
        @endif
        @if(request('installment2'))
            <th>Date</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Bank Status</th>
            <th>Amount </th>
        @endif
        @if(request('installment3'))
            <th>Date</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Bank Status</th>
            <th>Amount</th>
        @endif
    </tr>
    </thead>
    <tbody>
        @foreach($settings as $setting)
            @php
                if(request('installment1')){
                    $installment1 = $installment1 + $setting->finances[0]->amount;
                }
                if(request('installment2')){
                    $installment2 = $installment2 + $setting->finances[1]->amount;
                }
                if(request('installment3')){
                    $installment3 = $installment3 + $setting->finances[2]->amount;
                }
                $discount = $discount + $setting->discount->amount;
            @endphp
            <tr>
                <td>{{$loop->iteration}}</td>
                @if(request('s_name'))
                    <td>{{$setting->user->name}}</td>
                @endif
                @if(request('student_id'))
                    <td>{{$setting->student_id}}</td>
                @endif
                @if(request('course_id'))
                    <td>{{$setting->batch->time_slot->course->name}}</td>
                @endif
                @if(request('batch'))
                    <td>{{$setting->batch->name}}</td>
                @endif
                @if(request('email'))
                    <td>{{$setting->user->email}}</td>
                @endif
                @if(request('mobile_no'))
                    <td>{{$setting->student->mobile_no}}</td>
                @endif

                @if(request('installment1'))
                    <td>{{$setting->finances[0]->date}}</td>
                    @if($setting->finances[0]->status == 1)
                        <td style="background-color: #ffff00;">Paid</td>
                        <td style="background-color: #ffff00;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                    @endif
                    @if($setting->finances[0]->status == 2)
                        <td style="background-color: #de1212;">UnPaid</td>
                        @if($setting->finances[0]->extend_date)
                            <td style="background-color: #ffc107;">{{$setting->finances[0]->extend_date->due_date}}</td>
                        @else
                            <td style="background-color: #de1212;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                        @endif
                    @endif
                    @if($setting->finances[0]->bank_status == 1)
                        <td style="background-color: #1AAC4C;">Verified</td>
                    @endif
                    @if($setting->finances[0]->bank_status == 2)
                        <td style="background-color: #c3bbbb;">Unverified</td>
                    @endif
                    <td align="center">{{sprintf("%.2f", $setting->finances[0]->amount)}}</td>
                @endif

                @if(request('installment2'))
                    <td>{{$setting->finances[1]->date}}</td>
                    @if($setting->finances[1]->status == 1)
                        <td style="background-color: #ffff00;">Paid</td>
                        <td style="background-color: #ffff00;">{{$setting->finances[0]->batch_installment->due_date}}</td>
                    @endif
                    @if($setting->finances[1]->status == 2)
                        <td style="background-color: #de1212;">UnPaid</td>
                        @if($setting->finances[1]->extend_date)
                            <td style="background-color: #ffc107;">{{$setting->finances[1]->extend_date->due_date}}</td>
                        @else
                            <td style="background-color: #de1212;">{{$setting->finances[1]->batch_installment->due_date}}</td>
                        @endif
                    @endif
                    @if($setting->finances[1]->bank_status == 1)
                        <td style="background-color: #1AAC4C;">Verified</td>
                    @endif
                    @if($setting->finances[1]->bank_status == 2)
                        <td style="background-color: #c3bbbb;">Unverified</td>
                    @endif
                    <td align="center">{{sprintf("%.2f", $setting->finances[1]->amount)}}</td>
                @endif

                @if(request('installment3'))
                    <td>{{$setting->finances[2]->date}}</td>
                    @if($setting->finances[2]->status == 1)
                        <td style="background-color: #ffff00;">Paid</td>
                        <td style="background-color: #ffff00;">{{$setting->finances[2]->batch_installment->due_date}}</td>
                    @endif
                    @if($setting->finances[2]->status == 2)
                        <td style="background-color: #de1212;">UnPaid</td>
                        @if($setting->finances[2]->extend_date)
                            <td style="background-color: #ffc107;">{{$setting->finances[2]->extend_date->due_date}}</td>
                        @else
                            <td style="background-color: #de1212;">{{$setting->finances[2]->batch_installment->due_date}}</td>
                        @endif
                    @endif
                    @if($setting->finances[2]->bank_status == 1)
                        <td style="background-color: #1AAC4C;">Verified</td>
                    @endif
                    @if($setting->finances[2]->bank_status == 2)
                        <td style="background-color: #c3bbbb;">Unverified</td>
                    @endif
                    <td align="center">{{sprintf("%.2f", $setting->finances[2]->amount)}}</td>
                @endif

                <td align="center">{{sprintf("%.2f", $setting->discount->amount)}}</td>
                @if(request('installment1') && request('installment2') && request('installment3'))
                    <td align="center">{{sprintf("%.2f", $setting->finances->sum('amount') - $setting->discount->amount)}}</td>
                @elseif(request('installment1') && request('installment2'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount +  $setting->finances[1]->amount)- $setting->discount->amount)}}</td>
                @elseif(request('installment1') && request('installment3'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount +  $setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                @elseif(request('installment2') && request('installment3'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[1]->amount +  $setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                @elseif(request('installment1'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[0]->amount)- $setting->discount->amount)}}</td>
                @elseif(request('installment2'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[1]->amount)- $setting->discount->amount)}}</td>
                @elseif(request('installment3'))
                    <td align="center">{{sprintf("%.2f", ($setting->finances[2]->amount)- $setting->discount->amount)}}</td>
                @endif
            </tr>
        @endforeach
        <tr>
            <td></td>
            @if(request('s_name'))
                <td></td>
            @endif
            @if(request('student_id'))
                <td></td>
            @endif
            @if(request('course_id'))
                <td></td>
            @endif
            @if(request('batch'))
                <td></td>
            @endif
            @if(request('email'))
                <td></td>
            @endif
            @if(request('mobile_no'))
                <td></td>
            @endif

            @if(request('installment1'))
                <td></td>
                <td></td>
                <td></td>
                <td>Total</td>
                <td align="center">{{$installment1}}</td>
            @endif
            @if(request('installment2'))
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center">{{$installment2}}</td>
            @endif
            @if(request('installment3'))
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="center">{{$installment3}}</td>
            @endif
            <td align="center">{{$discount}}</td>
            <td align="center">{{($installment1+$installment2+$installment3) - $discount}}</td>
        </tr>
    </tbody>
</table>

