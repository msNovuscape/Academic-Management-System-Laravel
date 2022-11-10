@extends('layouts.app')
@section('title')
    <title>Attendance</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper content-wrapper-bg">
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                        <div>
                            <h4>Student Profile</h4>
                        </div>
                        <ul class="admin-breadcrumb">
                            <li><a href="{{url('')}}" class="card-heading-link">Home</a></li>
                            <li>Student</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 stretch-card mt-4 attendence-nav-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link" id="student-tab" data-toggle="tab" href="student" role="tab" aria-controls="home" aria-selected="true">Student Details</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " id="finance-tab" data-toggle="tab" href="finance" role="tab" aria-controls="profile" aria-selected="false">Finance</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link " id="quiz-tab" data-toggle="tab" href="quiz" role="tab" aria-controls="messages" aria-selected="false">Quiz</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" id="counselling-tab" data-toggle="tab" href="career" role="tab" aria-controls="settings" aria-selected="false">Career Counselling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tech-tab" data-toggle="tab" href="technical" role="tab" aria-controls="settings" aria-selected="false">Technical Exam</a>
                              </li>
                          </ul>
                    </div>
                    <div class="career-section">
                        <div class="col-sm-12 col-md-12 mt-3 mb-3">
                            <div class="border-block">
                              <div class="block-header">
                                <h4>Progress Bar</h4>
                              </div>
                              <div class="block-body sd-progress-block">
                                <div class="progress sd-progress mt-3">
                                  <?
                                  $res = mysqli_query($con, "select * from student_career where student_id = '$id'");
                                  $i = 1;
                                  while ($row = mysqli_fetch_assoc($res)) {
                                  ?>
                                    <div class="progress-bar bg-success pb" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            
                                  <? $i++;
                                  }
                                  if ($i != '6') {
            
                                  ?>
            
                                    <!-- <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div> -->
                                    <div class="progress-bar progress-nc" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            
                                  <? }
                                  for ($count = $i + 1; $count < 6; $count++) { ?>
                                    <div class="progress-bar progress-nc" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div><?
                                  }
                                  ?>
                                </div>
                                <div class="arrow">
                                  <div class="arrow-block">
                                    <div class="block"></div>
                                    <p>Enroll</p>
                                  </div>
                                  <div class="arrow-block">
                                    <div class="block"></div>
                                    <p>In progress</p>
                                  </div>
                                  <div class="arrow-block">
                                    <div class="block"></div>
                                    <p>Interview</p>
                                  </div>
                                  <div class="arrow-block">
                                    <div class="block"></div>
                                    <p>Reference check</p>
                                  </div>
                                  <div class="arrow-block">
                                    <div class="block"></div>
                                    <p>Got a job</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12 col-md-12 mt-3 mb-3">
                            <div class="row">
                              <!-- first column -->
                              <div class="col-sm-12 col-md-6 mt-3 mb-3">
                                <form method = "post" id = "carrier_attendance_save_form">
                                <div class="border-block">
                                  <div class="block-header">
                                    <h4>Attendance</h4>
                                  </div> 
                                  <div class="block-body">
                                    <div class="col-md-6 form-group">
                                      <label class="form-label">Date</label>
                                      <input type="date" class="form-control at-date" name="date">  
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <label>Status</label>
                                      <div class="radio-wrap">
                                        <div class="radio-top">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="present">
                                        <label class="form-check-label" for="flexRadioDefault1">Present</label>
                                        <i class="fa-solid fa-user-check present"></i>
                                      </div>
                                      <div class="radio-top">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="absent">
                                        <label class="form-check-label" for="flexRadioDefault2">Absent</label>
                                        <i class="fa-solid fa-user-check absent"></i>
                                      </div>
                                      </div>
                                      <div class="col-md-2 btn-wrap">
                                        <input type = "hidden" name = 'student_id' value = '<?echo $id?>'/>
                                          <button type="submit" name="catsave" class="btn btn-ctm-save">Save</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                              </div>
                              <!-- first column -->
                              <!-- second column -->
                              <div class="col-sm-12 col-md-6 mt-3 mb-3">
                                <div class="border-block ui-checkbox">
                                  <div class="block-header">
                                    <h4>Status</h4>
                                  </div>
                                  <form method="post" id="carrier_save_form">
                                    <div class="block-body">
                                      <div class="form-group ">
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="status[]" value="1"><span>Enroll</span>
                                          <button type="button" class="btn btn-sm sp-button-one" onclick="showCommentBox()">Add Comment</button>
                                        </div>
                                        <div class="form-group my-4" id="sp-comment-one">
                                          <textarea name="comment[1]" id="per-comment" class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                                        </div>
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="status[]" value="2"><span>In progress</span>
                                          <button type="button" class="btn btn-sm sp-button-two">Add Comment</button>
                                        </div>
                                        <div class="form-group my-4" id="sp-comment-two">
                                          <textarea name="comment[2]" id="per-comment" class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                                        </div>
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="status[]" value="3"><span>Interview</span>
                                          <button type="button" class="btn btn-sm sp-button-three">Add Comment</button>
                                        </div>
                                        <div class="form-group my-4" id="sp-comment-three">
                                          <textarea name="comment[3]" id="per-comment" class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                                        </div>
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="status[]" value="4"><span>Reference check</span>
                                          <button type="button" class="btn btn-sm sp-button-four">Add Comment</button>
                                        </div>
                                        <div class="form-group my-4" id="sp-comment-four">
                                          <textarea name="comment[4]" id="per-comment" class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                                        </div>
                                        <div class="form-check">
                                          <input type="checkbox" class="form-check-input" name="status[]" value="5"><span>Got a job</span>
                                          <button type="button" class="btn btn-sm sp-button-five">Add Comment</button>
                                        </div>
                                        <div class="form-group my-4" id="sp-comment-five">
                                          <textarea name="comment[5]" id="per-comment" class="form-control" placeholder="Comment your remarks" rows="3" autocomplete="off"></textarea>
                                        </div>
                                        <div class="col-md-3 btn-wrap btn-w-100">
                                          <input type="hidden" name='student_id' value='<? echo $id ?>' />
                                          <button type="submit" name="catsave" class="btn btn-ctm-save">Save</button>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- second column -->
                              </div>
                            </div>
                          </div>
                    </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

    let buttonCommentOne = document.querySelector(".sp-button-one");
    var commentBoxOne = document.getElementById("sp-comment-one");

    let CountBtnClicksOne = 0;
    function showCommentBoxOne() { 
      CountBtnClicksOne += 1;
        if(CountBtnClicksOne%2 !== 0){
          commentBoxOne.style.display = "block";
        }
        else{
          commentBoxOne.style.display = "none";
        }
    }

    buttonCommentOne.addEventListener("click", showCommentBoxOne); 

    let buttonCommentTwo = document.querySelector(".sp-button-two");
    var commentBoxTwo = document.getElementById("sp-comment-two");

    let CountBtnClicksTwo = 0;
    function showCommentBoxTwo() {
      CountBtnClicksTwo += 1;
        if(CountBtnClicksTwo%2 !== 0){
          commentBoxTwo.style.display = "block";
        }
        else{
          commentBoxTwo.style.display = "none";
        }
    }

    buttonCommentTwo.addEventListener("click", showCommentBoxTwo); 

    let buttonCommentThree = document.querySelector(".sp-button-three");
    var commentBoxThree = document.getElementById("sp-comment-three");

    let CountBtnClicksThree = 0;
    function showCommentBoxThree() {
      CountBtnClicksThree += 1;
        if(CountBtnClicksThree%2 !== 0){
          commentBoxThree.style.display = "block";
        }
        else{
          commentBoxThree.style.display = "none";
        }
    }

    buttonCommentThree.addEventListener("click", showCommentBoxThree); 

    let buttonCommentFour = document.querySelector(".sp-button-four");
    var commentBoxFour = document.getElementById("sp-comment-four");

    let CountBtnClicksFour = 0;
    function showCommentBoxFour() {
      CountBtnClicksFour += 1;
        if(CountBtnClicksFour%2 !== 0){
          commentBoxFour.style.display = "block";
        }
        else{
          commentBoxFour.style.display = "none";
        }
    }

    buttonCommentFour.addEventListener("click", showCommentBoxFour); 

    let buttonCommentFive = document.querySelector(".sp-button-five");
    var commentBoxFive = document.getElementById("sp-comment-five");

    let CountBtnClicksFive = 0;
    function showCommentBoxFive() {
      CountBtnClicksFive += 1;
        if(CountBtnClicksFive%2 !== 0){
          commentBoxFive.style.display = "block";
        }
        else{
          commentBoxFive.style.display = "none";
        }
    }

    buttonCommentFive.addEventListener("click", showCommentBoxFive); 

</script>
@endsection