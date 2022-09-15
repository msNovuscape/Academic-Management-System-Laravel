<?php
namespace App\Services;

use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\QuizQuestionImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizQuestionService{
    public function storeData($quiz)
    {
//        $aa =1;
//        $aa = request('question'.$aa);
//        dd($aa);
//        dd($aa);
//        foreach (request('count') as $count){
////            dd($count);
//        }

//        dd(request()->all());
        try{
            DB::beginTransaction();
            foreach (request('count') as $index => $value){
                //inserting value to quiz questions table
                    $quiz_question = new QuizQuestion();
                    $quiz_question->quiz_id = $quiz->id;
                    $quiz_question->created_by  = Auth::user()->id;
                    $quiz_question->question_type = request('question_type')[$index];
                    $quiz_question->question = request('question'.$value);
                    $quiz_question->no_of_option = request('no_of_option')[$index];
                    $quiz_question->status = request('status')[$index];
                    $quiz_question->weight = 1;
                    $quiz_question->answer_explanation = request('answer_explanation'.$value);
                    $quiz_question->save();
                //inserting value to quiz question images table
                    if(request('question_type')[$index] == array_search('Image',config('custom.question_types'))){
                        $quiz_question_image = new QuizQuestionImage();
                        $quiz_question_image->quiz_question_id  = $quiz_question->id;
                        $directory = SettingService::makeDirectory(array_search('quiz_image',config('custom.image_folders')));
                        $extension = request('image'.$value)->getClientOriginalExtension();
                        $file_name = md5(rand(111,999).$quiz_question->id).'.'.$extension;
                        $path = $directory.$file_name;
                        request('image'.$value)->move($directory,$file_name);
                        $quiz_question_image->image = $path;
                        $quiz_question_image->name = md5(rand(111,999).$quiz_question->id);
                        $quiz_question_image->save();
                    }
                //inserting value to quiz options table
                    foreach (request('label'.$value) as $in => $val){
                        $quiz_option = new QuizOption();
                        $quiz_option->quiz_question_id = $quiz_question->id;
                        $quiz_option->label = $val;
                        $quiz_option->option = request('option'.$value)[$in];
                        $quiz_option->save();
                    }
                //inserting value to quiz question answers table
                foreach (request('right_answer'.$value) as $i => $v){
                    $check = QuizOption::where('quiz_question_id',$quiz_question->id)->where('label',$v)->get();
                    if($check->count() > 0){
                        $quiz_question_answer = new QuizQuestionAnswer();
                        $quiz_question_answer->quiz_option_id = $check->first()->id;
                        $quiz_question_answer->save();
                    }
                }
            }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

}
