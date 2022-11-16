<div class="finance">
    <div class="container-fluid">
        <div class="block-header bg-header d-flex justify-content-between p-0 py-4">
            <div class="d-flex flex-column">
                <h3>Installment Table</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive table-details">
                <table class="table table-bordered table-installment" id="tableInstallment">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Installment</th>
                        <th>Amount</th>
                        <th>Status</th>
                        {{-- <th>Bank Status</th> --}}
                        <th>Due Date</th>
                    </tr>
                    </thead>
                    <tbody id="student_list">
                    @foreach($setting->admission->finances as $finance)
                        <tr id="tr_1">
                            <td id="td_count_1">{{$loop->iteration}}</td>
                            <td class="table-date">
                                <div class="input-group">
                                    <p>{{config('custom.installment_types')[$finance->batch_installment->installment_type]}}</p>
                                    {{-- <input type="text" class="form-control"  value="{{config('custom.installment_types')[$finance->batch_installment->installment_type]}}" readonly> --}}
                                </div>
                            </td>
                            <td class="table-date">
                                <div class="input-group">
                                    <p>{{$finance->amount}}</p>
                                    {{-- <input type="number" name="amount[]" min="1" class="form-control amount" id="amount1" required readonly value="{{$finance->amount}}"> --}}
                                </div>
                            </td>
                            <td>
                                @if($finance->status == 1)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                        <p class="active-button">paid</p>
                                    </a>
                                @endif
                                @if($finance->status == 2)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                        <p class="deactive-button">UnPaid</p>
                                    </a>
                                @endif
                            </td>
                            {{-- <td>
                                @if($finance->bank_status == 1)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                        <p class="active-button">Verified</p>
                                    </a>
                                @endif
                                @if($finance->bank_status == 2)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCourse">
                                        <p class="deactive-button">Unverified</p>
                                    </a>
                                @endif
                            </td> --}}
                            <td>
                                {{$finance->batch_installment->due_date}}
                            </td>
                        </tr>
                    @endforeach
                    <tr id="tr_last">
                        <td></td>
                        <td colspan="1">Total</td>
                        <td id="total_amount_id">{{$setting->admission->finances->sum('amount')}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
