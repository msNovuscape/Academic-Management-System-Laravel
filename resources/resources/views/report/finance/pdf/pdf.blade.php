<head>
    pdf 
</head>
<style></style>
<body>
    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
            <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                <div class="block-header p-4 d-flex justify-content-between block-header-pdf">
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="http://127.0.0.1:8000/images/ET-Minilogo.png" alt="logo">
                    </a>
                    <div class="pdf-heading">
                        <h4>EXTRATECH</h4>
                    </div>
                    <div class="d-flex flex-column justify-content-end pdf-email">
                        <div class="d-flex">
                        <h6>Email:&nbsp;&nbsp;</h6><p>info@extratechs.com.au</p>
                        </div>
                        <div class="d-flex">
                        <h6>Phone:&nbsp;&nbsp;</h6><p>987654321</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive table-details">
                        <table class="table table-bordered table-installment mb-0 table-pdf" id="">
                            <thead>
                            <tr>
                                <th scope="col" rowspan="2">S.N.</th>
                                <th scope="col" rowspan="2">Name</th>
                                <th scope="col" rowspan="2">Course</th>
                                <th scope="col" colspan="2">Installment1</th>
                                <th scope="col" colspan="2">Installment2</th>
                                <th scope="col" colspan="2">Installment3</th>
                                <th scope="col">Total</th>
                            </tr>
                            <tr>
                                <th>Bank Status</th>
                                <th>Amount</th>
                                <th>Bank Status</th>
                                <th>Amount
                                <th>Bank Status</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)
                                @php
                                    $installment1 = $installment1 + $setting->finances[0]->amount;
                                    $installment2 = $installment2 + $setting->finances[1]->amount;
                                    $installment3 = $installment3 + $setting->finances[2]->amount;
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                        <p>{{$setting->user->name}}</p>
                                        <p>{{$setting->student_id}}</p>
                                        </div>
                                    </td>
                                    <td>{{$setting->batch->time_slot->course->name}}</td>
                                    @if($setting->finances[0]->bank_status == 1)
                                        <td style="background-color: #1AAC4C;">Verified</td>
                                    @endif
                                    @if($setting->finances[0]->bank_status == 2)
                                        <td style="background-color: #c3bbbb;">Unverified</td>
                                    @endif
                                    <td>{{sprintf("%.2f", $setting->finances[0]->amount)}}</td>
                                    @if($setting->finances[1]->bank_status == 1)
                                        <td style="background-color: #1AAC4C;">Verified</td>
                                    @endif
                                    @if($setting->finances[1]->bank_status == 2)
                                        <td style="background-color: #c3bbbb;">Unverified</td>
                                    @endif
                                    <td>{{sprintf("%.2f", $setting->finances[1]->amount)}}</td>
                                    @if($setting->finances[2]->bank_status == 1)
                                        <td style="background-color: #1AAC4C;">Verified</td>
                                    @endif
                                    @if($setting->finances[2]->bank_status == 2)
                                        <td style="background-color: #c3bbbb;">Unverified</td>
                                    @endif
                                    <td>{{sprintf("%.2f", $setting->finances[2]->amount)}}</td>
                                    <td>{{$setting->finances->sum('amount')}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total</td>
                                <td></td>
                                <td>{{$installment1}}</td>
                                <td></td>
                                <td>{{$installment2}}</td>
                                <td></td>
                                <td>{{$installment3}}</td>
                                <td>{{$installment1+$installment2+$installment3}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

