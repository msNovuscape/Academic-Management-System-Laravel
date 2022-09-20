<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QuizQuestion;
use App\Models\StudentQuizBatch;

use App\Services\Quiz\QuizBatchService;
use Illuminate\Support\Facades\Session;

class StudentQuizBatchController extends Controller
{

    protected $view = 'student.quiz_question.';
    private $quizBatchService;

    public function __construct(QuizBatchService $service)
    {
        $this->quizBatchService = $service;
    }
    public function postQuiz()
    {
       $this->validate(\request(),[
           'quiz_batch_id' => 'required|numeric',
           'admission_id' => 'required|numeric'
       ]);
       $setting = new StudentQuizBatch();
       $setting->quiz_batch_id = \request('quiz_batch_id');
       $setting->admission_id = \request('admission_id');
       $setting->date = date('Y-m-d');
       $setting->save();
       Session::put('student_quiz_batch_id',$setting->id);
       return response()->json(['status' => 'Ok'],200);
    }

    public function getQuiz()
    {
        if(Session::has('student_quiz_batch_id')){

            $quiz_question  = $this->quizBatchService->getQuizSetting();
            if($quiz_question == false){
                Session::flash('success','No any question for this quiz has been found!');
                return redirect('');
            }else{
                $question_count = 1;
                $quiz_question  = $this->quizBatchService->getQuizSetting();
                $total_question = QuizQuestion::where('quiz_id',$quiz_question->quiz_id)->count();
                $time_period = $quiz_question->quiz->time_period * 60;
                $no_of_right_answers = $quiz_question->quiz_question_answers->count();
//                $next_quiz_question = QuizQuestion::where('id', '>', $quiz_question->id)->orderBy('id')->get();
               return view($this->view.'index',compact('quiz_question','question_count','total_question','time_period','no_of_right_answers'));

            }
        } else{
            return redirect('');
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
        if(Session::has('student_quiz_batch_id')){
            $setting = $this->quizBatchService->storeQuizAnswer($option_ids);
            $quiz_question  = QuizQuestion::where('id', '>', $setting->quiz_question_id)->where('quiz_id',$setting->quiz_question->quiz->id)->orderBy('id')->get();
            if($quiz_question->count() > 0){
                $quiz_question = $quiz_question->first();
                $no_of_right_answers = $quiz_question->quiz_question_answers->count();
                $question_count = request('quiz_question_count') +1;
                $returnHtml = view($this->view.'quiz_dom',['quiz_question' => $quiz_question,'question_count' => $question_count,'no_of_right_answers' => $no_of_right_answers])->render();
                $newButtonHtml = view($this->view.'new_button_dom',['quiz_question' => $quiz_question])->render();
                return response()->json(array('success' =>true, 'html' => $returnHtml,'button' => $newButtonHtml,'no_of_right_answers' =>$no_of_right_answers));
//                return view($this->view.'index',compact('quiz_question','question_count','total_question','time_period','no_of_right_answers'));
            }else{
                return response()->json(['aa' => 'quiz end'],200);
            }

        }else{
            Session::flash('success','Your session has been expired!');
            return redirect('');
        }


        return response()->json(['data' => request()->all(),'option_id' => $option_ids]);


    }
}
