<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\FiscalYearController;
use App\Http\Controllers\Admin\TimeSlotController;
use App\Http\Controllers\Admin\TimeTableController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\CourseMaterialController;
use App\Http\Controllers\Admin\BatchCourseMaterialController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Report\FinanceReportController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\Admin\QuizBatchController;
use App\Http\Controllers\Admin\QuizIndiviualController;
use App\Http\Controllers\Student\StudentQuizBatchController;
use App\Http\Controllers\Student\StudentQuizIndividualController;
use App\Http\Controllers\Report\AttendanceReportController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\SCounsellingController;
use App\Http\Controllers\Admin\ZoomLinkController;
use App\Http\Controllers\Admin\ZoomLinkBatchController;
use App\Http\Controllers\Admin\RolesController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [HomeController::class,'index']);
Route::get('login', [LoginController::class,'getLogin'])->name('login');
Route::post('login', [LoginController::class,'postLogin']);
Route::get('student', [StudentController::class,'index']);

//routes for resetting forget password
Route::get('forgot-password', [ForgetPasswordController::class,'index'])->middleware('guest')->name('password.request');
Route::post('forgot-password', [ForgetPasswordController::class,'sendLink'])->middleware('guest')->name('password.email');
Route::get('reset-password/{token}', [ForgetPasswordController::class,'reset'])->middleware('guest')->name('password.reset');
Route::post('reset-password', [ForgetPasswordController::class,'postReset'])->middleware('guest');

Route::group(['middleware'=>['auth']], function () {
    //routes for change password
    Route::get('change-password', [ChangePasswordController::class,'index']);
    Route::post('change-password', [ChangePasswordController::class,'changePassword']);

    Route::get('logout', [LoginController::class,'logout']);
});

//routes for admin
Route::group(['middleware'=>['myAdmin']], function () {
//    //routes for change password
//    Route::get('change-password', [ChangePasswordController::class,'index']);
//    Route::post('change-password', [ChangePasswordController::class,'changePassword']);
//
//    Route::get('logout', [LoginController::class,'logout']);
    Route::get('courses', [CourseController::class,'index']);
    Route::get('courses/create', [CourseController::class,'create']);
    Route::post('courses', [CourseController::class,'store']);
    Route::get('courses/{id}/edit', [CourseController::class,'edit']);
    Route::post('courses/{id}', [CourseController::class,'update']);
    Route::get('courses/delete/{id}', [CourseController::class,'delete']);

    Route::get('timeslots', [TimeSlotController::class,'index']);
    Route::get('timeslots/create', [TimeSlotController::class,'create']);
    Route::post('timeslots', [TimeSlotController::class,'store']);
    Route::get('timeslots/{id}/edit', [TimeSlotController::class,'edit']);
    Route::post('timeslots/{id}', [TimeSlotController::class,'update']);
    Route::get('timeslots/delete/{id}', [TimeSlotController::class,'delete']);

    Route::get('timetables', [TimeTableController::class,'index']);
    Route::get('timetables/create', [TimeTableController::class,'create']);
    Route::post('timetables', [TimeTableController::class,'store']);
    Route::get('timetables/{id}/edit', [TimeTableController::class,'edit']);
    Route::post('timetables/{id}', [TimeTableController::class,'update']);
    Route::get('timetables/delete/{id}', [TimeTableController::class,'delete']);

    Route::get('fiscal-years/', [FiscalYearController::class,'index']);
    Route::get('fiscal-years/create', [FiscalYearController::class,'create']);
    Route::post('fiscal-years/', [FiscalYearController::class,'store']);
    Route::get('fiscal-years/{id}/edit', [FiscalYearController::class,'edit']);
    Route::post('fiscal-years/{id}', [FiscalYearController::class,'update']);


    Route::get('batches', [BatchController::class,'index']);
    Route::get('batches/create', [BatchController::class,'create']);
    Route::post('batches', [BatchController::class,'store']);
    Route::get('batches/get_courses/{courses_id}', [BatchController::class,'get_courses']);
    Route::get('batches/{id}', [BatchController::class,'show']);
    Route::get('batches/{id}/edit', [BatchController::class,'edit']);
    Route::post('batches/{id}', [BatchController::class,'update']);
    Route::get('batches/delete/{id}', [BatchController::class,'delete']);

    Route::get('admissions', [AdmissionController::class,'index']);
    Route::get('admissions/create', [AdmissionController::class,'create']);
    Route::get('admissions/get_batches/{course_id}', [AdmissionController::class,'getBatch']);
    Route::get('admissions/get_batch_info/{batch_id}', [AdmissionController::class,'getBatchInfo']);
    Route::get('admissions/get_batch_calender/{batch_id}', [AdmissionController::class,'getBatchCalender']);
    Route::post('admissions', [AdmissionController::class,'store']);
    Route::get('admissions/show/{id}', [AdmissionController::class,'show']);
    Route::get('admissions/{id}/edit', [AdmissionController::class,'edit']);
    Route::post('admissions/{id}', [AdmissionController::class,'update']);



    //routes for quiz create
    Route::get('quiz', [QuizController::class,'index']);
    Route::get('quiz/create', [QuizController::class,'create']);
    Route::post('quiz', [QuizController::class,'store']);
    Route::get('quiz/{id}/edit', [QuizController::class,'edit']);
    Route::post('quiz/{id}', [QuizController::class,'update']);
    Route::get('quiz/delete/{id}', [QuizController::class,'delete']);
    Route::get('quiz/show_all_questions/{id}', [QuizController::class,'showAll']);
    //routes for creating quiz questions
    Route::get('quiz/question_create/{quiz_id}', [QuizQuestionController::class,'create']);
    Route::get('quiz_option/{dom_id}/{no_of_option}', [QuizQuestionController::class,'quizOptionDom']);//api call for quiz option
    Route::get('quiz_question_dom/{dom_id}/{question_type}', [QuizQuestionController::class,'quizQuestionDom']);//api call for quiz question type
    Route::get('quiz_question/{dom_id}', [QuizQuestionController::class,'quizQuestion']);//api call for quiz question type
    Route::post('quiz/question_create/{quiz_id}', [QuizQuestionController::class,'store']);
    Route::get('quiz/question_show/{quiz_id}', [QuizQuestionController::class,'show']); //show the list of quiz question
    Route::get('quiz/quiz_question_show/{id}', [QuizQuestionController::class,'getShow']); //show the individual question
    Route::get('quiz/quiz_question_edit/{id}', [QuizQuestionController::class,'edit']); //show the individual question
    Route::post('quiz/quiz_question_edit/{id}', [QuizQuestionController::class,'update']); //show the individual question
    Route::get('quiz/quiz_question_delete/{id}', [QuizQuestionController::class,'delete']); //show the individual question
    Route::get('quiz_question_dom_update/{dom_id}/{question_type}', [QuizQuestionController::class,'quizQuestionDomUpdate']);//api call for quiz question type

    //routes for quiz assign to batch
    Route::get('quiz_batch', [QuizBatchController::class,'index']);
    Route::get('quiz_batch_create', [QuizBatchController::class,'create']);
    Route::get('quiz_batch_dom/{course_id}', [QuizBatchController::class,'getBatch']); //ajax call
    Route::post('quiz_batch_create', [QuizBatchController::class,'store']);
    Route::get('quiz_batch_edit/{id}', [QuizBatchController::class,'edit']);
    Route::post('quiz_batch_update/{id}', [QuizBatchController::class,'update']);

    //routes for quiz assign to individual
    Route::get('quiz_individual', [QuizIndiviualController::class,'index']);
    Route::get('quiz_individual_create/{admission_id}', [QuizIndiviualController::class,'create']);
    Route::post('quiz_individual_create', [QuizIndiviualController::class,'store']);
    Route::get('quiz_individual_edit/{id}', [QuizIndiviualController::class,'edit']);
    Route::post('quiz_individual/{id}', [QuizIndiviualController::class,'update']);

    Route::get('course-materials', [CourseMaterialController::class,'index']);
    Route::get('course-materials/create', [CourseMaterialController::class,'create']);
    Route::post('course-materials', [CourseMaterialController::class,'store']);
    Route::get('course-materials/show/{id}', [CourseMaterialController::class,'show']);
    Route::get('course-materials/{id}/edit', [CourseMaterialController::class,'edit']);
    Route::post('course-materials/{id}', [CourseMaterialController::class,'update']);
    Route::get('course-materials/delete/{id}', [CourseMaterialController::class,'delete']);


    Route::get('batch-course-materials', [BatchCourseMaterialController::class,'index']);
    Route::get('batch-course-materials/create', [BatchCourseMaterialController::class,'create']);
    Route::post('batch-course-materials', [BatchCourseMaterialController::class,'store']);
    Route::get('batch-course-materials/get_batches/{course_id}', [BatchCourseMaterialController::class,'getBatch']);
    Route::get('batch-course-materials/show/{batch_id}', [BatchCourseMaterialController::class,'show']);
    Route::get('batch-course-materials/{batch_id}/edit', [BatchCourseMaterialController::class,'edit']);
    Route::post('batch-course-materials/{batch_id}', [BatchCourseMaterialController::class,'update']);

//route access to admin for students
    Route::get('tests', [StudentController::class,'getTests']);

    Route::group(['prefix' => 'admin'],function (){

        Route::get('score', [StudentController::class,'getScore']);

        Route::get('students', [AdminStudentController::class,'index']);
        Route::get('students/show/{id}', [AdminStudentController::class,'show']);
        Route::get('students/{id}/edit', [AdminStudentController::class,'edit']);
        Route::post('students/{id}', [AdminStudentController::class,'update']);
        Route::get('students/attendance/{id}', [AdminStudentController::class,'getAttendance']);
    });

//    routes for attendance
    Route::get('attendance', [AttendanceController::class,'index']);
    Route::post('attendance', [AttendanceController::class,'store']); //ajax call for make batch attendance
    Route::post('attendance/{id}', [AttendanceController::class,'update']); //ajax call for update single attendance
    Route::post('attendance_by_date', [AttendanceController::class,'attendanceByDate']); //ajax call for update single attendance
    Route::post('attendance_by_name', [AttendanceController::class,'getStudentSearch']); //ajax call for search student by name

// routes for student in attendence  for test
    Route::get('attendance/student', [AttendanceController::class,'studentIndex']);
    Route::get('attendance/finance', [AttendanceController::class,'financeIndex']);
    Route::get('attendance/quiz', [AttendanceController::class,'quizIndex']);
    Route::get('attendance/career', [AttendanceController::class,'careerIndex']);
    Route::get('attendance/technical', [AttendanceController::class,'technicalIndex']);

    //routes for student finance
    Route::get('finances', [FinanceController::class,'index']);
    Route::get('finances/unpaid', [FinanceController::class,'unpaid']);
    Route::get('finances/{student_id}', [FinanceController::class,'getFinance']);
    Route::post('finances/{student_id}', [FinanceController::class,'postFinance']);
//    Route::get('finances/{finance_id}/edit', [FinanceController::class,'editFinance']);
//    Route::post('finances/update/{finance_id}', [FinanceController::class,'updateFinance']);

//    Route::get('finances/edit/{admission_id}', [FinanceController::class,'edit']);
    Route::get('finances/{finance_id}/edit', [FinanceController::class,'edit']);
    Route::post('extend_date', [FinanceController::class,'extend_date']);
    Route::post('finances/update/{finance_id}', [FinanceController::class,'update']);

    Route::get('email', [EmailController::class,'index']);

    Route::get('pdf', [PdfController::class,'index']);

//routes for report
    //route for finance report
    Route::get('reports/finance', [FinanceReportController::class,'index']);
    Route::get('reports/finance/batch/{course_id}', [FinanceReportController::class,'getBatch']);
    Route::get('reports/finance/student/{batch_id}', [FinanceReportController::class,'getStudent']);
    Route::post('reports/finance', [FinanceReportController::class,'report']);
    Route::post('send_due_email', [FinanceReportController::class,'sendEmail']);
    //routes for due email
    Route::get('reports/due_finance', [FinanceReportController::class,'dueFinance']);
    Route::post('reports/due_finance', [FinanceReportController::class,'postDueFinance']);
    Route::get('reports/financetest', [FinanceReportController::class,'financetest']);
    //routes for attendance
    Route::get('reports/attendance', [AttendanceReportController::class,'index']);
    Route::post('reports/attendance', [AttendanceReportController::class,'report']);
    Route::get('reports/attendance/batch/{course_id}', [AttendanceReportController::class,'getBatch']);
    Route::get('reports/attendance/student/{batch_id}', [AttendanceReportController::class,'getStudent']);

    //routes for carrier counselling
    Route::get('counselling', [SCounsellingController::class,'index']);
    Route::get('counselling-completed', [SCounsellingController::class,'getCompleted']);
    Route::get('counselling/{admissionId}', [SCounsellingController::class,'getCounselling']);
    Route::post('counselling/status/{admissionId}', [SCounsellingController::class,'postStatus']);
    Route::post('counselling/attendance/{admissionId}', [SCounsellingController::class,'postAttendance']);
    Route::get('counsellings/group-attendance', [SCounsellingController::class,'getGroupAttendance']);
    Route::post('counsellings/group-attendance', [SCounsellingController::class,'postGroupAttendance']);
    Route::post('counsellings/group-attendance/{s_counselling_attendance_id}', [SCounsellingController::class,'singleAttendance']);
    Route::post('counsellings-attendance-by-date', [SCounsellingController::class,'counsellingsAttendanceByDate']);

    //routes for zoom link
    Route::get('zoom-links', [ZoomLinkController::class,'index']);
    Route::get('zoom-links/create', [ZoomLinkController::class,'create']);
    Route::post('zoom-links', [ZoomLinkController::class,'store']);
    Route::get('zoom-links/{id}/edit', [ZoomLinkController::class,'edit']);
    Route::post('zoom-links/{id}', [ZoomLinkController::class,'update']);

    //routes for assign zoom link to batch
    Route::get('zoom-links-batch', [ZoomLinkBatchController::class,'index']);
    Route::get('zoom-links-batch/create', [ZoomLinkBatchController::class,'create']);
    Route::post('zoom-links-batch', [ZoomLinkBatchController::class,'store']);
    Route::get('zoom-links-batch/get_batches/{course_id}', [ZoomLinkBatchController::class,'getBatch']);
    Route::get('zoom-links-batch/show/{id}', [ZoomLinkBatchController::class,'show']);
    Route::get('zoom-links-batch/{id}/edit', [ZoomLinkBatchController::class,'edit']);
    Route::post('zoom-links-batch/{id}', [ZoomLinkBatchController::class,'update']);
    Route::get('zoom_links_batch/delete/{id}', [ZoomLinkBatchController::class,'delete']);

    // routes for roles
    Route::get('roles', [RolesController::class,'index']);
    Route::get('roles/create', [RolesController::class,'create']);
    Route::post('roles', [RolesController::class,'store']);
    Route::get('roles/{id}', [RolesController::class,'show']);
    Route::get('roles/{id}/edit', [RolesController::class,'edit']);
    Route::post('roles/{id}', [RolesController::class,'update']);

});

//    Routes for students
Route::group(['middleware'=>'student','prefix'=>'student'], function () {
    Route::get('', [StudentController::class,'index']);
    Route::get('new-password', [StudentController::class,'getNewPassword']);
    Route::post('new-password', [StudentController::class,'postNewPassword']);
    Route::get('enrollments', [StudentController::class,'getEnroll']);
    Route::post('enrollments', [StudentController::class,'postEnroll']);
    Route::post('update/{id}', [StudentController::class,'update']);

    Route::get('materials', [StudentController::class,'getMaterial']);
    Route::get('zoom-links', [ZoomLinkController::class,'studentZoomLink']);

    //routes for quiz for batch students
    Route::post('student_quiz_batch', [StudentQuizBatchController::class,'postQuiz']); //ajax call to initiate quiz
    Route::get('quiz_exam', [StudentQuizBatchController::class,'getQuiz']);
    Route::post('student_quiz_batch_next_question', [StudentQuizBatchController::class,'getNextQuestion']);
    Route::post('student_quiz_batch_time_out', [StudentQuizBatchController::class,'quizBatchTimeOut']);//ajax call to end quiz when time is out
    Route::get('quiz_batch/{id}', [StudentQuizBatchController::class,'quizBatchResult']);

    //routes for quiz for individual students
    Route::post('student_quiz_individual', [StudentQuizIndividualController::class,'postQuiz']); //ajax call to initiate quiz
    Route::get('my_quiz_exam', [StudentQuizIndividualController::class,'getQuiz']);
    Route::post('student_quiz_individual_next_question', [StudentQuizIndividualController::class,'getNextQuestion']);
    Route::post('student_quiz_individual_time_out', [StudentQuizIndividualController::class,'quizBatchTimeOut']);//ajax call to end quiz when time is out
    Route::get('quiz_individual/{id}', [StudentQuizIndividualController::class,'quizIndividualResult']);



});
