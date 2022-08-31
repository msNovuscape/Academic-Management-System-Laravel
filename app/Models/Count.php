<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;

    public static function getCount()
    {
        $count = Count::orderBy('id','desc')->get();
        if(count($count) > 0){
            $setting = $count->first();
            $setting->count = $count->first()->count + 1;
            $setting->save();
            return $setting->count;
        }else{
            $setting = new Count();
            $setting->date = date('Y-m-d');
            $setting->count = 1;
            $setting->save();
            return $setting->count;
        }
    }
}
