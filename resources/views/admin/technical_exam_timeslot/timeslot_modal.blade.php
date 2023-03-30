<div class="modal fade" id="modalAddTimeSlot" tabindex="-1" aria-labelledby="ModalLabelAddCourse" aria-hidden="true">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <div>
                            <h5 class="modal-title" id="ModalLabelAddCourse">
                                Add TimeSlot
                            </h5>
                            <p class="mb-0">Please enter the TimeSlots</p>
                        </div>
                        <a href="" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                    {!! Form::open(['url' => 'technical_exam_timeslot','method' =>'POST' ]) !!}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group batch-form mb-0">
                                    <div class="col-md-12">
                                     
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Start Time</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="start_time" type="time" class="form-control" id="inlineFormInputGroup" placeholder="Course Code" required/>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">End Time</label>
                                            <div class="col-md-12 mt-4">
                                                <input name="end_time" type="time" class="form-control" id="inlineFormInputGroup" placeholder="Course Code" required/>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Status</label>
                                            <div class="col-md-12 mt-4">
                                                <select name="status" class="form-control" required>
                                                    <option value="" selected disabled>Please Select Status</option>
                                                    @foreach(config('custom.status') as $index => $value)
                                                        <option value="{{$index}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-4">
                        <div class="row w-100">
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    Save <i class="fas fa-angle-double-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>