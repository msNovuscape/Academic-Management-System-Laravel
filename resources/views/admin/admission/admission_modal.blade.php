@foreach($settings as $setting_modal)
<!-- Add Course Modal -->
<div class="modal fade" id="modalAddCourse{{$setting_modal->id}}" tabindex="-1" aria-labelledby="ModalLabelAddCourse" aria-hidden="true">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <div>
                            <h5 class="modal-title" id="ModalLabelAddCourse">
                                View Admission
                            </h5>
                            <p class="mb-0">View of Student Admission</p>
                        </div>
                        <a href="" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group batch-form mb-0">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label for="exampleInputEmail1">Student Name</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="name" value="{{$setting_modal->user->name}}" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="student Name" disabled/>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Student Batch</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="code" value="{{$setting_modal->batch->time_slot->course->code}} [{{$setting->batch->time_slot->time_table->day}}] [{{$setting->batch->time_slot->time_table->start_time}}-{{$setting->batch->time_slot->time_table->end_time}}]" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="student Code" disabled/>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Subject</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="code" value="{{$setting_modal->batch->time_slot->course->name}}" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="student Code" disabled/>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Date</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="code" value="{{$setting_modal->date}}" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="student Code" disabled/>
                                            </div>
                                        </div>
{{--                                        <div class="row mt-4">--}}
{{--                                            <label for="exampleInputEmail1">Installment</label>--}}
{{--                                            <div class="col-md-12 mt-4">--}}
{{--                                                <input name="code" value="{{$setting_modal->finance->amount}}" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="student Code" disabled/>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
