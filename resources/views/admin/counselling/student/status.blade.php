@if($setting->sCounselling)
    <div class="col-sm-12 col-md-6 mt-3 mb-3">
        <div class="border-block ui-checkbox">
            <div class="block-header">
                <h4>Status</h4>
            </div>
            {!! Form::open(['url' => 'counselling/status/'.$setting->id, 'method' => "POST", 'onsubmit' => 'return validateForm()']) !!}
            <div class="block-body">
                <div class="form-group ">
                    @foreach(config('custom.counselling_statuses') as $in => $val)
                        @if($setting->sCounselling->studentCounsellingStatuses->where('status', $in)->count() > 0)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" checked name="status[]" value="{{$in}}" id="my-status-{{$in}}" onclick="getVerify({{$in}})"><span>{{$val}}</span>
                                <button type="button" class="btn btn-sm sp-button-one" onclick="showCommentBox({{$in}})">Add Comment</button>
                            </div>
                            <div class="form-group my-4" id="sp-comment-{{$in}}" style="display: none">
                                <textarea name="comment[{{$in}}]"  class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off">{!! $setting->sCounselling->studentCounsellingStatuses->where('status', $in)->first()->comment !!}</textarea>
                            </div>
                        @else
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status[]" value="{{$in}}" id="my-status-{{$in}}" onclick="getVerify({{$in}})"><span>{{$val}}</span>
                                <button type="button" class="btn btn-sm sp-button-one" onclick="showCommentBox({{$in}})">Add Comment</button>
                            </div>
                            <div class="form-group my-4" id="sp-comment-{{$in}}" style="display: none">
                                <textarea name="comment[{{$in}}]"  class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-md-3 btn-wrap btn-w-100">
                        <button type="submit"  class="btn btn-ctm-save">Save</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- second column -->
    </div>
@else
    <div class="col-sm-12 col-md-6 mt-3 mb-3">
        <div class="border-block ui-checkbox">
            <div class="block-header">
                <h4>Status</h4>
            </div>
            {!! Form::open(['url' => 'counselling/status/'.$setting->id, 'method' => "POST", 'onsubmit' => 'return validateForm()']) !!}
            <div class="block-body">
                <div class="form-group ">
                    @foreach(config('custom.counselling_statuses') as $in => $val)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="status[]" value="{{$in}}" id="my-status-{{$in}}" onclick="getVerify({{$in}})"><span>{{$val}}</span>
                            <button type="button" class="btn btn-sm sp-button-one" onclick="showCommentBox({{$in}})">Add Comment</button>
                        </div>
                        <div class="form-group my-4" id="sp-comment-{{$in}}" style="display: none">
                            <textarea name="comment[{{$in}}]"  class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                        </div>
                    @endforeach
                    <div class="col-md-3 btn-wrap btn-w-100">
                        <button type="submit"  class="btn btn-ctm-save">Save</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- second column -->
    </div>
@endif
