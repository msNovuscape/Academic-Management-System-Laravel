<div class="col-sm-12 col-md-12 stretch-card mt-4" id="material_select">
    <div class="card-wrap form-block p-0">
        <div class="block-header bg-header d-flex justify-content-between p-4">
            <div class="d-flex flex-column">
                <h3>Assign Module to Students</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                    <div class="row">
                        <div class="col-12 table-responsive table-details">
                            <table class="table" id="">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check" onclick="allCheck()">
                                            <input class="form-check-input" type="checkbox" value="" id="select_all">
                                            <label class="form-check-label" for="selectAll">
                                                Select All
                                            </label>
                                        </div>
                                    </th>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Transfer Status</th>
                                    <th>Admission Date</th>
                                </tr>
                                </thead>
                                <tbody id="student_list">
                                @foreach($setting->admissions as $admission)
                                    <tr>
                                        <td>
                                            <div class="form-check ms-1">
                                                <input class="form-check-input checkbox" type="checkbox" value="{{$admission->id}}"  name="admissionId[]" onclick="allCheck()" @if($admission->admissionBatchMaterialsByModule($courseModule->id)->count() > 0) checked @endif>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="">
                                            <div class="d-flex">
                                                <div class="table-image">
                                                    @if($admission->student)
                                                        <img src="{{url($admission->student->image)}}" alt=""/>
                                                    @else
                                                        <img src="{{url('images/no_images.png')}}" alt=""/>
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column name-table">
                                                    <p>{{$admission->user->name}}</p>
                                                    <p>{{$admission->student_id}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            No
                                        </td>
                                        <td>{{$admission->date}}</td>
                                    </tr>
                                @endforeach
                                @foreach($setting->active_batch_transfer as $batch_transfer)
                                    <tr class="batch-transfer-indication">
                                        <td>
                                            <div class="form-check ms-1">
                                                <input class="form-check-input checkbox" type="checkbox" value="{{$batch_transfer->admission->id}}"  name="transferAdmissionId[]" onclick="allCheck()" @if($batch_transfer->admission->transferBatchMaterialsByModule($courseModule->id)->count() > 0) checked @endif>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="">
                                            <div class="d-flex">
                                                <div class="table-image">
                                                    @if($batch_transfer->admission->student)
                                                        <img src="{{url($batch_transfer->admission->student->image)}}" alt=""/>
                                                    @else
                                                        <img src="{{url('images/no_images.png')}}" alt=""/>
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column name-table">
                                                    <p>{{$batch_transfer->admission->user->name}}</p>
                                                    <p>{{$batch_transfer->admission->student_id}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$batch_transfer->previous_batch->name_other}}
                                        </td>
                                        <td>{{$batch_transfer->admission->date}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="pagination-section">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
