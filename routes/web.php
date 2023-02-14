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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\TechnicalExamController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\CourseModuleController;






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

//Route::group(['middleware'=>['auth']], function () {
//    //routes for change password
//    Route::get('change-password', [ChangePasswordController::class,'index']);
//    Route::post('change-password', [ChangePasswordController::class,'changePassword']);
//    Route::get('logout', [LoginController::class,'logout']);
//});

//routes for admin
Route::group(['middleware'=>['auth']], function () {
//    //routes for change password
    Route::get('change-password', [ChangePasswordController::class,'index']);
    Route::post('change-password', [ChangePasswordController::class,'changePassword']);
    Route::get('logout', [LoginController::class,'logout']);

    //forcely make other users to change password
    Route::get('other/new-password', [ChangePasswordController::class,'getNewPassword']);
    Route::post('other/new-password', [ChangePasswordController::class,'postNewPassword']);

    Route::get('courses', [CourseController::class,'index'])->middleware('checkuserpermission:show_courses');
    Route::get('courses/create', [CourseController::class,'create'])->middleware('checkuserpermission:create_courses');
    Route::post('courses', [CourseController::class,'store'])->middleware('checkuserpermission:create_courses');
    Route::get('courses/{id}/edit', [CourseController::class,'edit'])->middleware('checkuserpermission:update_courses');
    Route::post('courses/{id}', [CourseController::class,'update'])->middleware('checkuserpermission:update_courses');
    Route::get('courses/delete/{id}', [CourseController::class,'delete'])->middleware('checkuserpermission:delete_courses');

    Route::get('timeslots', [TimeSlotController::class,'index'])->middleware('checkuserpermission:show_time_slots');
    Route::get('timeslots/create', [TimeSlotController::class,'create'])->middleware('checkuserpermission:create_time_slots');
    Route::post('timeslots', [TimeSlotController::class,'store'])->middleware('checkuserpermission:create_time_slots');
    Route::get('timeslots/{id}/edit', [TimeSlotController::class,'edit'])->middleware('checkuserpermission:update_time_slots');
    Route::post('timeslots/{id}', [TimeSlotController::class,'update'])->middleware('checkuserpermission:update_time_slots');
    Route::get('timeslots/delete/{id}', [TimeSlotController::class,'delete'])->middleware('checkuserpermission:delete_time_slots');

    Route::get('timetables', [TimeTableController::class,'index'])->middleware('checkuserpermission:show_time_tables');
    Route::get('timetables/create', [TimeTableController::class,'create'])->middleware('checkuserpermission:create_time_tables');
    Route::post('timetables', [TimeTableController::class,'store'])->middleware('checkuserpermission:create_time_tables');
    Route::get('timetables/{id}/edit', [TimeTableController::class,'edit'])->middleware('checkuserpermission:update_time_tables');
    Route::post('timetables/{id}', [TimeTableController::class,'update'])->middleware('checkuserpermission:update_time_tables');
    Route::get('timetables/delete/{id}', [TimeTableController::class,'delete'])->middleware('checkuserpermission:delete_time_tables');

    Route::get('fiscal-years/', [FiscalYearController::class,'index'])->middleware('checkuserpermission:show_fiscal_years');
    Route::get('fiscal-years/create', [FiscalYearController::class,'create'])->middleware('checkuserpermission:create_fiscal_years');
    Route::post('fiscal-years/', [FiscalYearController::class,'store'])->middleware('checkuserpermission:create_fiscal_years');
    Route::get('fiscal-years/{id}/edit', [FiscalYearController::class,'edit'])->middleware('checkuserpermission:update_fiscal_years');
    Route::post('fiscal-years/{id}', [FiscalYearController::class,'update'])->middleware('checkuserpermission:update_fiscal_years');
    //routes for branches
    Route::get('branches/', [BranchController::class,'index'])->middleware('checkuserpermission:show_fiscal_years');
    Route::get('branches/create', [BranchController::class,'create'])->middleware('checkuserpermission:create_fiscal_years');
    Route::post('branches/', [BranchController::class,'store'])->middleware('checkuserpermission:create_fiscal_years');
    Route::get('branches/{id}/edit', [BranchController::class,'edit'])->middleware('checkuserpermission:update_fiscal_years');
    Route::post('branches/{id}', [BranchController::class,'update'])->middleware('checkuserpermission:update_fiscal_years');


    Route::get('batches', [BatchController::class,'index'])->middleware('checkuserpermission:show_batches');
    Route::get('batches/create', [BatchController::class,'create'])->middleware('checkuserpermission:create_batches');
    Route::post('batches', [BatchController::class,'store'])->middleware('checkuserpermission:create_batches');
    Route::get('batches/get_courses/{courses_id}', [BatchController::class,'get_courses']); //ajax call for get course tutor
    Route::get('batches/{id}', [BatchController::class,'show'])->middleware('checkuserpermission:show_batches');
    Route::get('batches/{id}/edit', [BatchController::class,'edit'])->middleware('checkuserpermission:update_batches');
    Route::post('batches/{id}', [BatchController::class,'update'])->middleware('checkuserpermission:update_batches');
    Route::get('batches/delete/{id}', [BatchController::class,'delete'])->middleware('checkuserpermission:delete_batches');

    Route::get('admissions', [AdmissionController::class,'index'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/create', [AdmissionController::class,'create'])->middleware('checkuserpermission:create_admissions');
    Route::get('admissions/get_batches/{course_id}', [AdmissionController::class,'getBatch']);
    Route::get('admissions/get_batch_info/{batch_id}', [AdmissionController::class,'getBatchInfo']);
    Route::get('admissions/get_batch_calender/{batch_id}', [AdmissionController::class,'getBatchCalender']);
    Route::post('admissions', [AdmissionController::class,'store'])->middleware('checkuserpermission:create_admissions');
    Route::get('admissions/show/{id}', [AdmissionController::class,'show'])->middleware('checkuserpermission:show_admissions');
//    Route::get('admissions/show_detail/{admissionId}', [AdmissionController::class,'getStudentDetail'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/{id}/edit', [AdmissionController::class,'edit'])->middleware('checkuserpermission:update_admissions');
    Route::post('admissions/{id}', [AdmissionController::class,'update'])->middleware('checkuserpermission:update_admissions');
    Route::get('admission_email/{id}', [AdmissionController::class,'admissionEmail'])->middleware('checkuserpermission:create_admissions');

    //routes for reset password
    Route::get('admissions/student_password_reset', [AdmissionController::class,'studentPasswordReset'])->middleware('checkuserpermission:create_admissions');
    Route::get('admissions/student_password_reset/{admission_id}', [AdmissionController::class,'getStudentPasswordReset'])->middleware('checkuserpermission:create_admissions');
    Route::post('admissions/student_password_reset/{admission_id}', [AdmissionController::class,'postStudentPasswordReset'])->middleware('checkuserpermission:create_admissions');


    //showing student detail view
    Route::get('admissions/general/{admissionId}', [AdminStudentController::class,'index'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/attendances/{admissionId}', [AdminStudentController::class,'attendance'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/quiz/{admissionId}', [AdminStudentController::class,'quiz'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/finances/{admissionId}', [AdminStudentController::class,'finance'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/counselling/{admissionId}', [AdminStudentController::class,'career'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/course_materials/{admissionId}', [AdminStudentController::class,'courseMaterials'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/course_materials_checked/{admissionId}/{courseMaterialId}', [AdminStudentController::class,'updateCourseMaterialChecked'])->middleware('checkuserpermission:show_admissions');
    Route::get('admissions/course_materials_unchecked/{admissionId}/{courseMaterialId}', [AdminStudentController::class,'updateCourseMaterialUnChecked'])->middleware('checkuserpermission:show_admissions');




    //routes for quiz create
    Route::get('quiz', [QuizController::class,'index'])->middleware('checkuserpermission:show_quizzes');
    Route::get('quiz/create', [QuizController::class,'create'])->middleware('checkuserpermission:create_quizzes');
    Route::post('quiz', [QuizController::class,'store'])->middleware('checkuserpermission:create_quizzes');
    Route::get('quiz/{id}/edit', [QuizController::class,'edit'])->middleware('checkuserpermission:update_quizzes');
    Route::post('quiz/{id}', [QuizController::class,'update'])->middleware('checkuserpermission:update_quizzes');
    Route::get('quiz/delete/{id}', [QuizController::class,'delete'])->middleware('checkuserpermission:delete_quizzes');
    Route::get('quiz/show_all_questions/{id}', [QuizController::class,'showAll'])->middleware('checkuserpermission:show_quizzes');
    //routes for creating quiz questions
    Route::get('quiz/question_create/{quiz_id}', [QuizQuestionController::class,'create'])->middleware('checkuserpermission:create_quizzes');
    Route::get('quiz_option/{dom_id}/{no_of_option}', [QuizQuestionController::class,'quizOptionDom']);//api call for quiz option
    Route::get('quiz_question_dom/{dom_id}/{question_type}', [QuizQuestionController::class,'quizQuestionDom']);//api call for quiz question type
    Route::get('quiz_question/{dom_id}', [QuizQuestionController::class,'quizQuestion']);//api call for quiz question type
    Route::post('quiz/question_create/{quiz_id}', [QuizQuestionController::class,'store'])->middleware('checkuserpermission:create_quizzes');
    Route::get('quiz/question_show/{quiz_id}', [QuizQuestionController::class,'show'])->middleware('checkuserpermission:show_quizzes'); //show the list of quiz question
    Route::get('quiz/quiz_question_show/{id}', [QuizQuestionController::class,'getShow'])->middleware('checkuserpermission:show_quizzes'); //show the individual question
    Route::get('quiz/quiz_question_edit/{id}', [QuizQuestionController::class,'edit'])->middleware('checkuserpermission:update_quizzes'); //show the individual question
    Route::post('quiz/quiz_question_edit/{id}', [QuizQuestionController::class,'update'])->middleware('checkuserpermission:update_quizzes'); //show the individual question
    Route::get('quiz/quiz_question_delete/{id}', [QuizQuestionController::class,'delete'])->middleware('checkuserpermission:delete_quizzes'); //show the individual question
    Route::get('quiz_question_dom_update/{dom_id}/{question_type}', [QuizQuestionController::class,'quizQuestionDomUpdate'])->middleware('checkuserpermission:update_quizzes');//api call for quiz question type

    //routes for quiz assign to batch
    Route::get('quiz_batch', [QuizBatchController::class,'index'])->middleware('checkuserpermission:show_student_quiz_batches');
    Route::get('quiz_batch_create', [QuizBatchController::class,'create'])->middleware('checkuserpermission:create_student_quiz_batches');
    Route::get('quiz_batch_dom/{course_id}', [QuizBatchController::class,'getBatch']); //ajax call
    Route::post('quiz_batch_create', [QuizBatchController::class,'store'])->middleware('checkuserpermission:create_student_quiz_batches');
    Route::get('quiz_batch_edit/{id}', [QuizBatchController::class,'edit'])->middleware('checkuserpermission:update_student_quiz_batches');
    Route::post('quiz_batch_update/{id}', [QuizBatchController::class,'update'])->middleware('checkuserpermission:update_student_quiz_batches');

    //routes for quiz assign to individual
    Route::get('quiz_individual', [QuizIndiviualController::class,'index'])->middleware('checkuserpermission:show_student_quiz_individuals');
    Route::get('quiz_individual_create/{admission_id}', [QuizIndiviualController::class,'create'])->middleware('checkuserpermission:create_student_quiz_individuals');
    Route::post('quiz_individual_create', [QuizIndiviualController::class,'store'])->middleware('checkuserpermission:create_student_quiz_individuals');
    Route::get('quiz_individual_edit/{id}', [QuizIndiviualController::class,'edit'])->middleware('checkuserpermission:update_student_quiz_individuals');
    Route::post('quiz_individual/{id}', [QuizIndiviualController::class,'update'])->middleware('checkuserpermission:update_student_quiz_individuals');

    Route::get('course-materials', [CourseMaterialController::class,'index'])->middleware('checkuserpermission:show_course_materials');
    Route::get('course-materials/create', [CourseMaterialController::class,'create'])->middleware('checkuserpermission:create_course_materials');
    Route::get('course-materials/modules/{course_id}', [CourseMaterialController::class,'getModule'])->middleware('checkuserpermission:create_course_materials');
    Route::post('course-materials', [CourseMaterialController::class,'store'])->middleware('checkuserpermission:create_course_materials');
    Route::get('course-materials/show/{id}', [CourseMaterialController::class,'show'])->middleware('checkuserpermission:show_course_materials');
    Route::get('course-materials/{id}/edit', [CourseMaterialController::class,'edit'])->middleware('checkuserpermission:update_course_materials');
    Route::post('course-materials/{id}', [CourseMaterialController::class,'update'])->middleware('checkuserpermission:update_course_materials');
    Route::get('course-materials/delete/{id}', [CourseMaterialController::class,'delete'])->middleware('checkuserpermission:delete_course_materials');
    //routes for course modules
    Route::get('course-modules', [CourseModuleController::class,'index'])->middleware('checkuserpermission:show_course_materials');
    Route::get('course-modules/create', [CourseModuleController::class,'create'])->middleware('checkuserpermission:create_course_materials');
    Route::post('course-modules', [CourseModuleController::class,'store'])->middleware('checkuserpermission:create_course_materials');
    Route::get('course-modules/{course_id}/edit', [CourseModuleController::class,'edit'])->middleware('checkuserpermission:update_course_materials');
    Route::post('course-modules-delete', [CourseModuleController::class, 'delete'])->middleware('checkuserpermission:update_course_materials');
    Route::post('course-modules/update', [CourseModuleController::class, 'update'])->middleware('checkuserpermission:update_course_materials');


    Route::get('batch-course-materials', [BatchCourseMaterialController::class,'index'])->middleware('checkuserpermission:show_batch_course_materials');
    Route::get('batch-course-materials/create', [BatchCourseMaterialController::class,'create'])->middleware('checkuserpermission:create_batch_course_materials');
    Route::post('batch-course-materials', [BatchCourseMaterialController::class,'store'])->middleware('checkuserpermission:create_batch_course_materials');
    Route::get('batch-course-materials/get_batches/{course_id}', [BatchCourseMaterialController::class,'getBatch']);
    Route::get('batch-course-materials/get_batches_edit/{course_id}', [BatchCourseMaterialController::class,'getBatchEdit']);
    Route::get('batch-course-materials/get_students/{batch_id}', [BatchCourseMaterialController::class,'getBatchStudents']);
    Route::get('batch-course-materials/get_module_students/{batch_id}/{course_module_id}', [BatchCourseMaterialController::class,'getModuleStudents']);
    Route::get('batch-course-materials/show/{batch_id}', [BatchCourseMaterialController::class,'show'])->middleware('checkuserpermission:show_batch_course_materials');
    Route::get('batch-course-materials/{batch_id}/edit', [BatchCourseMaterialController::class,'edit'])->middleware('checkuserpermission:update_batch_course_materials');
    Route::post('batch-course-materials/{batch_id}', [BatchCourseMaterialController::class,'update'])->middleware('checkuserpermission:update_batch_course_materials');

//route access to admin for students
    Route::get('tests', [StudentController::class,'getTests']);

//    Route::group(['prefix' => 'admin'],function (){
//
//        Route::get('score', [StudentController::class,'getScore']);
//
//        Route::get('students', [AdminStudentController::class,'index']);
//        Route::get('students/show/{id}', [AdminStudentController::class,'show']);
//        Route::get('students/{id}/edit', [AdminStudentController::class,'edit']);
//        Route::post('students/{id}', [AdminStudentController::class,'update']);
//        Route::get('students/attendance/{id}', [AdminStudentController::class,'getAttendance']);
//    });

//    routes for attendance
    Route::get('attendance', [AttendanceController::class,'index'])->middleware('checkuserpermission:show_attendances');
    Route::post('attendance', [AttendanceController::class,'store'])->middleware('checkuserpermission:create_attendances'); //ajax call for make batch attendance
    Route::post('attendance/{id}', [AttendanceController::class,'update'])->middleware('checkuserpermission:update_attendances'); //ajax call for update single attendance
    Route::post('attendance_by_date', [AttendanceController::class,'attendanceByDate'])->middleware('checkuserpermission:show_attendances'); //ajax call for update single attendance
    Route::post('attendance_by_name', [AttendanceController::class,'getStudentSearch'])->middleware('checkuserpermission:show_attendances'); //ajax call for search student by name

// routes for student in attendence  for test
    Route::get('attendance/student', [AttendanceController::class,'studentIndex']);
    Route::get('attendance/finance', [AttendanceController::class,'financeIndex']);
    Route::get('attendance/quiz', [AttendanceController::class,'quizIndex']);
    Route::get('attendance/career', [AttendanceController::class,'careerIndex']);
    Route::get('attendance/technical', [AttendanceController::class,'technicalIndex']);

    //routes for student finance
    Route::get('finances', [FinanceController::class,'index'])->middleware('checkuserpermission:show_finances');
    Route::get('finances/unpaid', [FinanceController::class,'unpaid'])->middleware('checkuserpermission:show_finances');
    Route::get('finances/{student_id}', [FinanceController::class,'getFinance'])->middleware('checkuserpermission:show_finances');
    Route::post('finances/{student_id}', [FinanceController::class,'postFinance'])->middleware('checkuserpermission:update_finances');
//    Route::get('finances/{finance_id}/edit', [FinanceController::class,'editFinance']);
//    Route::post('finances/update/{finance_id}', [FinanceController::class,'updateFinance']);

//    Route::get('finances/edit/{admission_id}', [FinanceController::class,'edit']);
    Route::get('finances/{finance_id}/edit', [FinanceController::class,'edit'])->middleware('checkuserpermission:update_finances');
    Route::post('extend_date', [FinanceController::class,'extend_date'])->middleware('checkuserpermission:update_finances');
    Route::post('finances/update/{finance_id}', [FinanceController::class,'update'])->middleware('checkuserpermission:update_finances');

//    Route::get('email', [EmailController::class,'index']);

//    Route::get('pdf', [PdfController::class,'index']);

//routes for report
    //route for finance report
    Route::get('reports/finance', [FinanceReportController::class,'index'])->middleware('checkuserpermission:report_finances');
    Route::get('reports/finance/batch/{course_id}', [FinanceReportController::class,'getBatch'])->middleware('checkuserpermission:report_finances');
    Route::get('reports/finance/student/{batch_id}', [FinanceReportController::class,'getStudent'])->middleware('checkuserpermission:report_finances');
    Route::post('reports/finance', [FinanceReportController::class,'report'])->middleware('checkuserpermission:report_finances');
    Route::post('send_due_email', [FinanceReportController::class,'sendEmail']);
    //routes for due email
    Route::get('reports/due_finance', [FinanceReportController::class,'dueFinance'])->middleware('checkuserpermission:report_finances');
    Route::post('reports/due_finance', [FinanceReportController::class,'postDueFinance'])->middleware('checkuserpermission:report_finances');
//    Route::get('reports/financetest', [FinanceReportController::class,'financetest']);
    //routes for attendance
    Route::get('reports/attendance', [AttendanceReportController::class,'index'])->middleware('checkuserpermission:report_attendances');
    Route::post('reports/attendance', [AttendanceReportController::class,'report'])->middleware('checkuserpermission:report_attendances');
    Route::get('reports/attendance/batch/{course_id}', [AttendanceReportController::class,'getBatch'])->middleware('checkuserpermission:report_attendances');
    Route::get('reports/attendance/student/{batch_id}', [AttendanceReportController::class,'getStudent'])->middleware('checkuserpermission:report_attendances');

    //routes for carrier counselling
    Route::get('counselling', [SCounsellingController::class,'index'])->middleware('checkuserpermission:show_s_counsellings');
    Route::get('counselling/remove/{s_counselling_id}', [SCounsellingController::class,'remove'])->middleware('checkuserpermission:show_s_counsellings');
    Route::get('counselling-completed', [SCounsellingController::class,'getCompleted'])->middleware('checkuserpermission:show_s_counsellings');
    Route::get('counselling/{admissionId}', [SCounsellingController::class,'getCounselling'])->middleware('checkuserpermission:show_s_counsellings');
    Route::post('counselling/status/{admissionId}', [SCounsellingController::class,'postStatus'])->middleware('checkuserpermission:create_s_counsellings');
    Route::post('counselling/attendance/{admissionId}', [SCounsellingController::class,'postAttendance'])->middleware('checkuserpermission:create_s_counselling_attendances');
    Route::get('counsellings/group-attendance', [SCounsellingController::class,'getGroupAttendance'])->middleware('checkuserpermission:show_s_counselling_attendances');
    Route::post('counsellings/group-attendance', [SCounsellingController::class,'postGroupAttendance'])->middleware('checkuserpermission:create_s_counselling_attendances');
    Route::post('counsellings/group-attendance/{s_counselling_attendance_id}', [SCounsellingController::class,'singleAttendance'])->middleware('checkuserpermission:create_s_counselling_attendances');
    Route::post('counsellings-attendance-by-date', [SCounsellingController::class,'counsellingsAttendanceByDate'])->middleware('checkuserpermission:create_s_counselling_attendances');

    //routes for technical exam
     Route::get('technical_exam', [TechnicalExamController::class, 'index']);


    //routes for zoom link
    Route::get('zoom-links', [ZoomLinkController::class,'index'])->middleware('checkuserpermission:show_zoom_links');
    Route::get('zoom-links/create', [ZoomLinkController::class,'create'])->middleware('checkuserpermission:create_zoom_links');
    Route::post('zoom-links', [ZoomLinkController::class,'store'])->middleware('checkuserpermission:create_zoom_links');
    Route::get('zoom-links/{id}/edit', [ZoomLinkController::class,'edit'])->middleware('checkuserpermission:update_zoom_links');
    Route::post('zoom-links/{id}', [ZoomLinkController::class,'update'])->middleware('checkuserpermission:update_zoom_links');

    //routes for assign zoom link to batch
    Route::get('zoom-links-batch', [ZoomLinkBatchController::class,'index'])->middleware('checkuserpermission:show_zoom_link_batches');
    Route::get('zoom-links-batch/create', [ZoomLinkBatchController::class,'create'])->middleware('checkuserpermission:create_zoom_link_batches');
    Route::post('zoom-links-batch', [ZoomLinkBatchController::class,'store'])->middleware('checkuserpermission:create_zoom_link_batches');
    Route::get('zoom-links-batch/get_batches/{course_id}', [ZoomLinkBatchController::class,'getBatch']);
    Route::get('zoom-links-batch/show/{id}', [ZoomLinkBatchController::class,'show'])->middleware('checkuserpermission:show_zoom_link_batches');
    Route::get('zoom-links-batch/{id}/edit', [ZoomLinkBatchController::class,'edit'])->middleware('checkuserpermission:update_zoom_link_batches');
    Route::post('zoom-links-batch/{id}', [ZoomLinkBatchController::class,'update'])->middleware('checkuserpermission:update_zoom_link_batches');
    Route::get('zoom_links_batch/delete/{id}', [ZoomLinkBatchController::class,'delete'])->middleware('checkuserpermission:delete_zoom_link_batches');

    // routes for roles
    Route::get('roles', [RolesController::class,'index'])->middleware('checkuserpermission:show_roles');
    Route::get('roles/create', [RolesController::class,'create'])->middleware('checkuserpermission:create_roles');
    Route::post('roles', [RolesController::class,'store'])->middleware('checkuserpermission:create_roles');
    Route::get('roles/{id}', [RolesController::class,'show'])->middleware('checkuserpermission:show_roles');
    Route::get('roles/{id}/edit', [RolesController::class,'edit'])->middleware('checkuserpermission:update_roles');
    Route::post('roles/{id}', [RolesController::class,'update'])->middleware('checkuserpermission:update_roles');

    //routes for user creation
    Route::get('users', [UserController::class,'index'])->middleware('checkuserpermission:show_users');
    Route::get('users/create', [UserController::class,'create'])->middleware('checkuserpermission:create_users');
    Route::post('users', [UserController::class,'store'])->middleware('checkuserpermission:create_users');
    Route::get('users/{id}', [UserController::class,'show'])->middleware('checkuserpermission:show_users');
    Route::get('users/{id}/edit', [UserController::class,'edit'])->middleware('checkuserpermission:update_users');
    Route::post('users/{id}', [UserController::class,'update'])->middleware('checkuserpermission:update_users');

    //routes for user assign permission
    Route::get('permissions', [UserRoleController::class,'index'])->middleware('checkuserpermission:show_roles');
    Route::get('permissions/create', [UserRoleController::class,'create'])->middleware('checkuserpermission:create_roles');
    Route::post('permissions', [UserRoleController::class,'store'])->middleware('checkuserpermission:create_roles');
    Route::get('permissions/{id}', [UserRoleController::class,'show'])->middleware('checkuserpermission:show_roles');
    Route::get('permissions/{id}/edit', [UserRoleController::class,'edit'])->middleware('checkuserpermission:update_roles');
    Route::post('permissions/{id}', [UserRoleController::class,'update'])->middleware('checkuserpermission:update_roles');
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
