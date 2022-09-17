<div
    class="modal fade"
    id="modalAddTimeSlot"
    tabindex="-1"
    aria-labelledby="ModalLabelAddCourse"
    aria-hidden="true"
>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <div>
                            <h5 class="modal-title" id="ModalLabelAddCourse">
                                Add Time Slot to Course
                            </h5>
                            <p class="mb-0">Please select the course and time slot</p>
                        </div>
                        <a href="" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>

                    {!! Form::open(['url' => 'timeslots','method' =>'POST' ]) !!}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group batch-form mb-0">
                                    <div class="col-md-12">
                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Course Name</label>
                                            <div class="col-md-12 mt-4">
                                                <select name="course_id" class="form-control">
                                                    <option value="" selected disabled>Please Select Course Name</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Time Table</label>
                                            <div class="col-md-12 mt-4">
                                                <select name="time_table_id" class="form-control">
                                                    <option value="" selected disabled>Please Select Your Time</option>
                                                    @foreach($time_tables as $time_table)
                                                        <option value="{{$time_table->id}}">{{$time_table->day}} [{{$time_table->start_time."-".$time_table->end_time}}]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Branch </label>
                                            <div class="col-md-12 mt-4">
                                                <select name="branch_id" class="form-control">
                                                    <option value="" selected disabled>Please Select Your Branch</option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mt-4">
                                            <label for="exampleInputEmail1">Status</label>
                                            <div class="col-md-12 mt-4">
                                                <select name="status" class="form-control">
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
                                <button
                                    type="button"
                                    class="btn btn-secondary w-100"
                                    data-bs-dismiss="modal"
                                >
                                    Cancel
                                </button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    Continue <i class="fas fa-angle-double-right"></i>
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
