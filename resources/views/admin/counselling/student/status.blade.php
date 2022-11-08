<div class="col-sm-12 col-md-6 mt-3 mb-3">
    <div class="border-block ui-checkbox">
        <div class="block-header">
            <h4>Status</h4>
        </div>
        {!! Form::open(['url' => 'counselling/status/'.$setting->id, 'method' => "POST"]) !!}
            <div class="block-body">
                <div class="form-group ">
                    @foreach(config('custom.counselling_statuses') as $in => $val)
                        @if($loop->first)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status[]" value="{{$in}}" id="my-status-{{$in}}" onclick="getVerify({{$in}})"><span>{{$val}}</span>
                                <button type="button" class="btn btn-sm sp-button-one" onclick="showCommentBox({{$in}})">Add Comment</button>
                            </div>
                            <div class="form-group my-4" id="sp-comment-{{$in}}" style="display: none">
                                <textarea name="comment[{{$in}}]"  class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                            </div>
                        @else
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input check-enable" name="status[]" value="{{$in}}" id="my-status-{{$in}}" onclick="getVerify({{$in}})" readonly disabled><span>{{$val}}</span>
                                <button type="button" class="btn btn-sm sp-button-one check-enable" onclick="showCommentBox({{$in}})" readonly="" disabled>Add Comment</button>
                            </div>
                            <div class="form-group my-4" id="sp-comment-{{$in}}" style="display: none">
                                <textarea name="comment[{{$in}}]"  class="form-control check-enable" placeholder="Comment your remarks" rows="3" autocomplete="off" disabled></textarea>
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
