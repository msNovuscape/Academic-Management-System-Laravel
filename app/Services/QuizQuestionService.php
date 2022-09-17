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
            $aa = 0;
            foreach (request('count') as $index => $value){
                $aa = $aa +1;
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
                        $quiz_question_answer->quiz_question_id = $quiz_question->id;
                        $quiz_question_answer->quiz_option_id = $check->first()->id;
                        $quiz_question_answer->save();
                    }
                }
            }

            DB::commit();
            return $aa;
            return $aa;

        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($quiz_question)
    {

//        dd(request()->all());
//        if(request('label1')){
//            dd($quiz_question->quiz_options[4]);
//            if($quiz_question->quiz_options->count() == count(request('option_old'))){
//
//            }elseif ($quiz_question->quiz_options->count() != count(request('option_old'))){
//            }
//        }
//        dd($quiz_question->quiz_options);
        try{
            DB::beginTransaction();

                $quiz_question->created_by = Auth::user()->id;
                $quiz_question->question_type = request('question_type');
                $quiz_question->question = request('question');
                $quiz_question->no_of_option = request('no_of_option');
                $quiz_question->status = request('status');
                $quiz_question->answer_explanation = request('answer_explanation1');
                $quiz_question->save();
            //inserting value to quiz question images table
            if(request('question_type')== array_search('Image',config('custom.question_types'))){
                if(request('image')){
                    self::update_image($quiz_question);
                }
            }else{
                if($quiz_question->quiz_question_image){
                    $unlink_path = public_path().'/'.$quiz_question->quiz_question_image->image;
                    if (is_file($unlink_path) && file_exists($unlink_path)){
                        unlink($unlink_path);
                    }
                    $quiz_question->quiz_question_image->delete();
                }
            }

            //all option are not old option
            if(request('label1')){
                //new option i.e. 5th option is added or updated
                if($quiz_question->quiz_options->count() == 5 && count(request('option_old')) == 4 && request('label1')){
                    //5th option is updated
                    //updating  value in quiz option table
                    self::quiz_option_update($quiz_question);

                    //update 5th value in the table by inserting new value in quiz option 5th value
                    $quiz_option1 = $quiz_question->quiz_options[4];
                    $quiz_option1->label = request('label1')[0];
                    $quiz_option1->option = request('option1')[0];
                    $quiz_option1->save();

                    //inserting value to quiz question answers table
                    $quiz_question->quiz_question_answers()->delete();
                    if (request('right_answer_old')){
                        self::update_question_answer($quiz_question);
                    }
                    //insert new  quiz question answer
                    if(request('right_answer1')){
                        self::new_question_answer($quiz_question);
                    }

                }
                if($quiz_question->quiz_options->count() == 4 && count(request('option_old')) == 4 && request('label1')){
                    //5th option is added
                    //5th option value is inserting in quiz option table
                    self::quiz_option_update();
                    $quiz_option_new = new QuizOption();
                    $quiz_option_new->quiz_question_id = $quiz_question->id;
                    $quiz_option_new->label = request('label1')[0];
                    $quiz_option_new->option = request('option1')[0];
                    $quiz_option_new->save();
                    //inserting value to quiz question answers table
                    $quiz_question->quiz_question_answers()->delete();
                    if (request('right_answer_old')){
                        self::update_question_answer($quiz_question);
                    }
                    //insert new  quiz question answer
                    if(request('right_answer1')){
                        self::new_question_answer($quiz_question);
                    }
                }
            }elseif ($quiz_question->quiz_options->count() == 5 && count(request('option_old')) == 4){
                //one option has been deleted form 5th old option
                    //updating value into quiz option table
                    self::quiz_option_update();

                    //inserting value to quiz question answers table
                    $quiz_question->quiz_question_answers()->delete();
                    if (request('right_answer_old')){
                        self::update_question_answer($quiz_question);
                    }
                    //deleting 5th value form quiz option table
                    $quiz_question->quiz_options[4]->delete();

            }elseif ($quiz_question->quiz_options->count() == count(request('option_old'))){
                //inserting value in quiz option table
                self::quiz_option_update();

                //inserting value to quiz question answers table
                $quiz_question->quiz_question_answers()->delete();
                if (request('right_answer_old')){
                    self::update_question_answer($quiz_question);
                }
            }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }

    }


    public function quiz_option_update()
    {
        $my_count = 0;
        foreach (request('option_old') as $in => $val){
            $quiz_option = QuizOption::findOrFail($in);
            $quiz_option->label = request('label_old')[$my_count];
            $quiz_option->option = request('option_old')[$in];
            $quiz_option->save();
            $my_count = $my_count +1;
        }
    }

    //update image function
    public function update_image($quiz_question)
    {
        if($quiz_question->quiz_question_image){
            $unlink_path = public_path().'/'.$quiz_question->quiz_question_image->image;
            if (is_file($unlink_path) && file_exists($unlink_path)){
                unlink($unlink_path);
            }

            $quiz_question_image = $quiz_question->quiz_question_image;
            $directory = SettingService::makeDirectory(array_search('quiz_image',config('custom.image_folders')));
            $extension = request('image')->getClientOriginalExtension();
            $file_name = md5(rand(111,999).$quiz_question->id).'.'.$extension;
            $path = $directory.$file_name;
            request('image')->move($directory,$file_name);
            $quiz_question_image->image = $path;
            $quiz_question_image->save();
            return $quiz_question_image;
        }else{
            $quiz_question_image_new = new QuizQuestionImage();
            $quiz_question_image_new->quiz_question_id  = $quiz_question->id;
            $directory = SettingService::makeDirectory(array_search('quiz_image',config('custom.image_folders')));
            $extension = request('image')->getClientOriginalExtension();
            $file_name = md5(rand(111,999).$quiz_question->id).'.'.$extension;
            $path = $directory.$file_name;
            request('image')->move($directory,$file_name);
            $quiz_question_image_new->image = $path;
            $quiz_question_image_new->name = md5(rand(111,999).$quiz_question->id);
            $quiz_question_image_new->save();
        }

    }

    //update quiz question answer
    public function update_question_answer($quiz_question)
    {
        //inserting value to quiz question answers table
        foreach (request('right_answer_old') as $i => $v){
            $check = QuizOption::where('quiz_question_id',$quiz_question->id)->where('label',$v)->get();
            if($check->count() > 0){
                $quiz_question_answer = new QuizQuestionAnswer();
                $quiz_question_answer->quiz_question_id = $quiz_question->id;
                $quiz_question_answer->quiz_option_id = $check->first()->id;
                $quiz_question_answer->save();
            }
        }
    }
    //insert new  quiz question answer
    public function  new_question_answer($quiz_question)
    {
        //inserting value to quiz question answers table
        $check = QuizOption::where('quiz_question_id',$quiz_question->id)->where('label',request('label1')[0])->get();
        if($check->count() > 0){
            $quiz_question_answer = new QuizQuestionAnswer();
            $quiz_question_answer->quiz_question_id = $quiz_question->id;
            $quiz_question_answer->quiz_option_id = $check->first()->id;
            $quiz_question_answer->save();
        }
    }

}
