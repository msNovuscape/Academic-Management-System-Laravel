@section('script')
    <script>
        $("#from_date").flatpickr({
            dateFormat: "Y-m-d"
        });
        function getMinDate(){
            var min_date = $('#from_date').val();
            if(min_date != ''){
                $('#to_date').flatpickr({
                    minDate: min_date,
                    dateFormat: 'Y-m-d',
                });
            }
        }

        function getCancel(id) {
            $('#add-more-block'+id).remove();
        }
        function getQuestionDom(id) {
            var question_type = $('#question_type'+id).val();
            var dom_id = id;
            debugger;
            start_loader();
            $.ajax({
                type:'GET',
                url:Laravel.url+'/quiz_question_dom/'+dom_id+'/'+question_type,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    end_loader();
                    debugger;
                    $('#suppotingblock'+id).remove();

                    $('#mainblock'+id).after(data['html']);
                    debugger;
                },
                error: function (error){
                    end_loader();
                    debugger;
                    errorDisplay('Something went worng !');
                }
            });
        }

        function getOption(id) {
            start_loader()
            var no_of_option = $('#no_of_option'+id).val();
            var dom_id = id;
            $.ajax({
                type:'GET',
                url:Laravel.url+'/quiz_option/'+dom_id+'/'+no_of_option,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    end_loader();
                    debugger;
                    if(data['no_of_option'] == 4){
                        $('#fifth-option'+id).remove();
                    }else {
                        $('#dom-option'+id).after(data['html']);
                    }
                },
                error: function (error){
                    end_loader();
                    debugger;
                    errorDisplay('Something went worng !');
                }
            });
        }
        var count = 1;
        function addMore(dom) {
            count = count +1;
            debugger;
            $.ajax({
                type:'GET',
                url:Laravel.url+'/quiz_question/'+count,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success:function (data){
                    end_loader();
                    debugger;
                    $('#add-more-block'+data['append_after_id']).after(data['html']);
                    debugger;
                },
                error: function (error){
                    end_loader();
                    debugger;
                    errorDisplay('Something went worng !');
                }
            });


        }

        function preview(id) {
            var image_url = URL.createObjectURL(event.target.files[0]);
            $('#frame'+id).attr('src', image_url);
        }
        function clearImage() {
            document.getElementById('formFile').value = null;
            frame1.src = "";
        }
    </script>
@endsection
