<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\IndividualQuizResult;
use App\Models\QuizIndiviual;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\StudentQuizIndividual;
use App\Models\StudentQuizQuestionIndividual;
use App\Services\Quiz\QuizIndividualService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentQuizIndividualController extends Controller
{

    protected $view = 'student.quiz_individual_question.';
    private $quizIndividualService;

    public function __construct(QuizIndividualService $service)
    {
        $this->quizIndividualService = $service;
    }

    public function postQuiz()
    {
        $this->validate(\request(),[
            'quiz_indiviual_id' => 'required|numeric',
            'admission_id' => 'required|numeric'
        ]);

        if(Session::has('student_quiz_batch_id')){
            Session::forget('student_quiz_batch_id');
        }
        if(Session::has('student_quiz_individual_id')){
            Session::forget('student_quiz_individual_id');
        }
        $check_student_quiz_individuals = StudentQuizIndividual::where('quiz_indiviual_id',request('quiz_indiviual_id'))->where('admission_id',request('admission_id'))->orderBy('id','desc')->get();
//       return response()->json(['check_student_quiz_batch' => $check_student_quiz_batch,'data' =>request()->all(),'count' => $check_student_quiz_batch->count()]);
        if($check_student_quiz_individuals->count() > 0){
//           return response()->json(['check_student_quiz_batch' => $check_student_quiz_batch],200);
            //student has given the quiz but not finished or due to some technical error not quiz has not finished
            $check_student_quiz_individual = $check_student_quiz_individuals->first();
            //student has enter on quiz but not submitted any of questions (0) or student has  given answers at least one quiz (2)
//           if($check_student_quiz_batch->end_time > date('Y-m-d H:i:s')){
            if($check_student_quiz_individual->status != '1'){
                if($check_student_quiz_individual->end_time > date('Y-m-d h:i:s')){
                    //student has enter on quiz but not submitted any of questions i.e. status 0
                    if($check_student_quiz_individual->status == '0'){
                        Session::put('student_quiz_individual_id',$check_student_quiz_individual->id);
                        return response()->json(['status' => 'Ok'],200);
                    }
                    //student has  given answers at least one quiz i.e. status 2
                    if($check_student_quiz_individual->status == '2'){
                        Session::put('student_quiz_individual_id',$check_student_quiz_individual->id);
                        return response()->json(['status' => 'Ok'],200);
                    }
                }else{
                    $check_student_quiz_individual->status = '1';
                    $check_student_quiz_individual->save();
                    Session::flash('success','Dear student your quiz time is exceeded!');
                    return response()->json(['status' => 'No'],200);
                }
            }


            //if student has given quiz and finished
            if($check_student_quiz_individual->status == '1'){
                //checking no. of attempt
//                if($check_student_quiz_individual->count() > $check_student_quiz_individual->quiz_individual->no_of_attempt){
                if($check_student_quiz_individual->count() > 2){
                    Session::flash('success','Dear student your quiz no. of attempt has been exceeded!');
                    return response()->json(['status' => 'No'],200);
                }else{
                    $quiz_individual = QuizIndiviual::findOrFail(\request('quiz_indiviual_id'));
                    $setting = new StudentQuizIndividual();
                    $setting->quiz_indiviual_id  = \request('quiz_indiviual_id');
                    $setting->admission_id = \request('admission_id');
                    $setting->date = date('Y-m-d');
//               $setting->start_time = date('h:i:s');
                    $setting->start_time = date('Y-m-d h:i:s');
                    $time_periods_in_seconds = $quiz_individual->quiz->time_period * 60;
                    $setting->end_time = date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s')) + $time_periods_in_seconds));
                    $setting->status = '0'; //not started
                    $setting->save();
                    Session::put('student_quiz_individual_id',$setting->id);
                    return response()->json(['status' => 'Ok'],200);

                }

            }

        }else{
//           return response()->json(['check_student_quiz_batch_test' => 'test'],200);
            //checking no. of attempt
            if($check_student_quiz_individuals->count() > 2){
                Session::flash('success','Dear student your quiz no. of attempt has been exceeded!');
                return response()->json(['status' => 'No'],200);
            }else{
                //student has not given any quiz
                $quiz_individual = QuizIndiviual::findOrFail(\request('quiz_indiviual_id'));
                $setting = new StudentQuizIndividual();
                $setting->quiz_indiviual_id  = \request('quiz_indiviual_id');
                $setting->admission_id = \request('admission_id');
                $setting->date = date('Y-m-d');
//               $setting->start_time = date('h:i:s');
                $setting->start_time = date('Y-m-d h:i:s');
                $time_periods_in_seconds = $quiz_individual->quiz->time_period * 60;
                $setting->end_time = date("Y-m-d h:i:s", (strtotime(date('Y-m-d h:i:s')) + $time_periods_in_seconds));
                $setting->status = '0'; //not started
                $setting->save();
                Session::put('student_quiz_individual_id',$setting->id);
                return response()->json(['status' => 'Ok'],200);
            }

        }

    }

    public function getQuiz()
    {
        if(Session::has('student_quiz_individual_id')){
            $quiz_question  = $this->quizIndividualService->getQuizSetting();
            if($quiz_question == false){
                Session::flash('success','No any question for this quiz has been found!');
                return redirect('');
            }else{
                $quiz_question_result  = $this->quizIndividualService->getQuizSetting();
                $quiz_question = $quiz_question_result[0];
                $question_count = $quiz_question_result[1] + 1;
                $time_period = $quiz_question_result[2];
                $total_question = QuizQuestion::where('quiz_id',$quiz_question->quiz_id)->count();
                $no_of_right_answers = $quiz_question->quiz_question_answers->count();
//                $next_quiz_question = QuizQuestion::where('id', '>', $quiz_question->id)->orderBy('id')->get();
                return view($this->view.'index',compact('quiz_question','question_count','total_question','time_period','no_of_right_answers'));

            }
        } else{
            Session::forget('student_quiz_individual_id');
            Session::flash('custom_success','Your session has been expired!');
            return redirect('student');
        }
    }

    public function getNextQuestion()
    {
//        $option_ids = json_decode(\request('option_id'));
//        return response()->json(['data' => request()->all(),'option_id' => $option_ids]);
        $this->validate(request(),[
            'quiz_question_id' =>'required|numeric',
            'option_id' =>'required',
            'quiz_question_count' =>'required|numeric',
        ]);
        $option_ids = json_decode(\request('option_id'));
        if(Session::has('student_quiz_individual_id')){
            $setting = $this->quizIndividualService->storeQuizAnswer($option_ids);
            $quiz_question  = QuizQuestion::where('id', '>', $setting->quiz_question_id)->where('quiz_id',$setting->quiz_question->quiz->id)->orderBy('id')->get();
            if($quiz_question->count() > 0){
                $quiz_question = $quiz_question->first();
                $no_of_right_answers = $quiz_question->quiz_question_answers->count();
                $question_count = request('quiz_question_count') +1;
                $returnHtml = view($this->view.'quiz_dom',['quiz_question' => $quiz_question,'question_count' => $question_count,'no_of_right_answers' => $no_of_right_answers])->render();
                $newButtonHtml = view($this->view.'new_button_dom',['quiz_question' => $quiz_question])->render();
                return response()->json(array('success' =>true, 'html' => $returnHtml,'button' => $newButtonHtml,'no_of_right_answers' =>$no_of_right_answers,'quiz_status' => 'Yes'));
//                return view($this->view.'index',compact('quiz_question','question_count','total_question','time_period','no_of_right_answers'));
            }else{
                $setting->student_quiz_Individual->status = '1';
                $setting->student_quiz_Individual->save();
                Session::forget('student_quiz_individual_id');
                Session::flash('success','Dear student you have successfully given the exam !');
                return response()->json(['quiz_status' => 'No'],200);
            }

        }else{
            Session::forget('student_quiz_individual_id');
            Session::flash('custom_success','Your session has been expired!');
            return redirect('student');
        }


        return response()->json(['data' => request()->all(),'option_id' => $option_ids]);


    }

    public function quizBatchTimeOut()
    {
        if(Session::has('student_quiz_individual_id')){
            $student_quiz_individual_id = Session::get('student_quiz_individual_id');
            $student_quiz_individual = StudentQuizIndividual::findOrFail($student_quiz_individual_id);
            $student_quiz_individual->status = '1';
            $student_quiz_individual->save();
            Session::forget('student_quiz_individual_id');
            Session::flash('success','Dear student your quiz time has been exceeded!');
            return response()->json(['quiz_status' => 'No'],200);
        }else{
            Session::forget('student_quiz_individual_id');
            Session::flash('custom_success','Your session has been expired!');
            return redirect('student');
        }
    }

    public function quizIndividualResult($id)
    {
        $setting = StudentQuizIndividual::findOrFail($id);
//        $my_settings = $setting->student_quiz_question_individuals_list;
        $my_settings = StudentQuizQuestionIndividual::where('s_q_individual_id',$setting->id)->paginate(config('custom.per_page'));
        if(!$setting->individual_quiz_result){
            $count = 0;
            foreach ($setting->student_quiz_question_individuals_list as $sqqi){
                $my_result = self::ans_right_or_wrong($sqqi->id);
                if($my_result == 'Correct'){
                    $count = $count +1;
                }
            }
            $individual_quiz_result = new IndividualQuizResult();
            $individual_quiz_result->s_q_individual_id  = $setting->id;
            $individual_quiz_result->total_question_attempted  = $setting->student_quiz_question_individuals_list->count();
            $individual_quiz_result->score  = $count;
            $individual_quiz_result->save();
            return view('student.quiz_score.score_individual',compact('setting','individual_quiz_result','my_settings'));
        }
        return view('student.quiz_score.score_individual',compact('setting','my_settings'));
    }

    public static  function ans_right_or_wrong($student_quiz_question_individual_id)
    {
        $result = 'Correct';
        $sqqi = StudentQuizQuestionIndividual::findOrFail($student_quiz_question_individual_id);
        foreach ($sqqi->student_quiz_question_individual_answers as $ans1){
            $quiz_question_ans = QuizQuestionAnswer::where('quiz_question_id',$sqqi->quiz_question_id)
                ->where('quiz_option_id',$ans1->quiz_option_id)->get();
            if(count($quiz_question_ans) > 0){
                $result = 'Correct';
            }else{
                $result = 'Incorrect';
                break;
            }
        }
        return $result;
    }
}
