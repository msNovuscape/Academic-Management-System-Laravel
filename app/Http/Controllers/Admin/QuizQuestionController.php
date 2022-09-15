<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizQuestionRequest;
use App\Models\Quiz;
use App\Services\QuizQuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizQuestionController extends Controller
{

    protected $view = 'admin.quiz_question.';
    protected $redirect = 'quiz';

    private $quizQuestionService;

    public function __construct(QuizQuestionService $service)
    {
        $this->quizQuestionService = $service;
    }

    public function create($quiz_id)
    {
        $setting = Quiz::findOrFail($quiz_id);
       return view($this->view.'create',compact('setting'));
    }

    public function quizOptionDom($dom_id,$no_of_option)
    {
        if($no_of_option == 4){
            return response()->json(['no_of_option' => 4],200);
        }
        if($no_of_option == 5){
            $returnHtml = view($this->view.'design.option',['id' => $dom_id])->render();
            return response()->json(array('success' =>true, 'no_of_option' => 5,'html' => $returnHtml));
        }

    }

    public function quizQuestionDom($dom_id,$question_type)
    {
        //for Text type
        if($question_type == 1){
            $returnHtml = view($this->view.'design.question_text_dom',['id' => $dom_id])->render();
            return response()->json(array('success' =>true, 'question_type' => 2,'html' => $returnHtml));
        }
        //for Text Image
        if($question_type == 2){
            $returnHtml = view($this->view.'design.question_image_dom',['id' => $dom_id])->render();
            return response()->json(array('success' =>true, 'question_type' => 2,'html' => $returnHtml));
        }
    }

    public function quizQuestion($dom_id)
    {
        $returnHtml = view($this->view.'design.question',['id' => $dom_id])->render();
        return response()->json(array('success' =>true,'append_after_id' =>$dom_id-1,'html' => $returnHtml));
    }

    public function store($quiz_id)
    {
        $this->validate(\request(),[
            'question_type' => 'required|array',
            'count' => 'required|array',
            'no_of_option' => 'required|array',
            'status' => 'required|array',
        ]);
        $quiz = Quiz::findOrFail($quiz_id);
        $this->quizQuestionService->storeData($quiz);
        Session::flash('success','Quiz question has been created successfully!');
        return redirect($this->redirect);
    }
}
