<!-- Edit Course Modal -->
@foreach($settings as $setting_modal)
    <div class="modal fade" id="modalAddCourse{{$setting_modal->id}}" tabindex="-1" aria-labelledby="ModalLabelAddCourse" aria-hidden="true">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-flex">
                            <div>
                                <h5 class="modal-title" id="ModalLabelAddCourse">
                                    Edit Course
                                </h5>
                                <p class="mb-0">Please enter the course name</p>
                            </div>
                            <a href="" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                        {!! Form::open(['url' => 'courses/'.$setting_modal->id,'method' =>'POST' ]) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group batch-form mb-0">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label for="exampleInputEmail1">Course Name</label>
                                                <div class="col-md-12 mt-4">
                                                    <input name="name" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" value="{{$setting_modal->name}}" required/>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <label for="exampleInputEmail1">Course Code</label>
                                                <div class="col-md-12 mt-4">
                                                    <input name="code" type="text" class="form-control form-control-sm" id="inlineFormInputGroup" value="{{$setting_modal->code}}" required/>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <label for="exampleInputEmail1">Status</label>
                                                <div class="col-md-12 mt-4">
                                                    <select name="status" class="form-control" required>
                                                        <option value="" selected disabled>Please Select Status</option>
                                                        @foreach(config('custom.status') as $index => $value)
                                                            <option value="{{$index}}" @if($setting_modal->status == $index) selected @endif >{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <label for="exampleInputEmail1">Remarks</label>
                                                <div class="col-md-12 mt-4">
                                                    <textarea name="remark" rows="5" placeholder="Write your remarks here">{!! $setting_modal->remark !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row w-100">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-100">Continue <i class="fas fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
