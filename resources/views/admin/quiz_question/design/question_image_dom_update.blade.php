{{--     Start Section for image qestion --}}
<div class="col-md-12 d-flex" id="question-block1">
    <div class="col-md-12">
        <div class="d-flex mt-4">
            <div class="col-md-1">
                <label for="Image" class="form-label">Question</label>
            </div>
            <div class="col-md-11">
                <div class="input-group">
                    <input type="text" name="question" class="form-control"  placeholder="Write your question here">
                </div>
                <div class="d-flex">
                    <div class="col-md-6">
                        <input class="form-control mt-4" name="image" type="file" id="formFile1" onchange="preview(1)" required>
                    </div>
                    <div class="quiz-answer-image col-md-6 mt-4 mx-4">
                        <img id="frame1"  class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--     end Section for image qestion --}}
