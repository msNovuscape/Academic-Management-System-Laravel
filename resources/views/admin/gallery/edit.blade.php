@extends('admin.layouts.app')
@section('title')
    <title>Gallery</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            {{--start loader--}}
            <div class="loader loader-default" id="loader"></div>
            {{--end loader--}}
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Edit Gallery</h3>
                            <p class="ms-4">Fill the following fields to edit a gallery</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li>
                                        <a href="{{url('my-gallery')}}"><img src="{{url('images/cancel-icon.png')}}" alt="cancel-icon"/></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                {!! Form::open(['url' => 'my-gallery/'.$setting->id,'method' => 'POST', 'files' => true]) !!}
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label>Name<span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"   name="name" value="{{$setting->name}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 mt-2">
                                                <div class="form-group batch-form">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Status <span style="color: red;">*</span></label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <select  id="status" name="status" class="form-control" required>
                                                                        <option value="" selected disabled>Please select Status</option>
                                                                        @foreach(config('custom.status') as $in => $val)
                                                                            <option value="{{$in}}" @if($setting->status == $in) selected @endif>{{$val}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('admin.gallery.table.image')
                                    <div class="row mt-4">
                                        <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                            <div class="row">
                                                <div class="button-section d-flex justify-content-end mt-2 mb-4">
                                                    <a href="{{url('my-gallery')}}">
                                                        <button type="button">
                                                            Skip
                                                            <i class="fa-solid fa-angles-right"></i>
                                                        </button>
                                                    </a>
                                                    <button type="submit">
                                                        update & Continue
                                                        <i class="fas fa-angle-double-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function getDelete(id) {
            if($('.image').length > 1){
                $('#tr_'+id).remove();
            } else {
                errorDisplay('Please Select at least one image!');
            }
        }

        var count = 1;
        function getMore() {
            count = count +1;
            var html = '<tr id="tr_'+count+'">'+
                '<td>'+
                '<input type="file" class="form-control image" name="image[]" required>'+
                '</td>'+
                '<td>'+
                '<a class="btn btn-danger"  role="button" onclick="getDelete('+count+')">Delete</a>'+
                '</td>'+
                '</tr>';
            $('#my-table > tbody:last').append(html);
        }

        function getPermanentyDelete(gallery_image_id) {
            event.preventDefault()
            if($('.image').length > 1){
                $.confirm({
                    title: 'Do you sure want to delete?',
                    content: false,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Delete',
                            btnClass: 'btn-red',
                            action: function(){
                                debugger;
                                // var find_document_id = dom["id"].split("_");
                                // var document_id =val;
                                var formData = new FormData();
                                formData.append('gallery_image_id', gallery_image_id);
                                debugger
                                start_loader();
                                $.ajax({
                                    /* the route pointing to the post function */
                                    type: 'POST',
                                    url: Laravel.url +"/my-gallery-image",
                                    dataType: 'json',
                                    data: formData,
                                    processData: false,  // tell jQuery not to process the data
                                    contentType: false,
                                    /* remind that 'data' is the response of the AjaxController */
                                    success: function (data) {
                                        end_loader();
                                        $('#tr_update_'+gallery_image_id).remove();

                                    },
                                    error: function(error) {
                                        end_loader();
                                        errorDisplay(error["responseJSON"]["message"]);
                                    }
                                });
                            }
                        },
                        close: function () {
                        }
                    }
                });
            } else {
                errorDisplay('Please Select at least one image!');
            }
        }

    </script>
@endsection
