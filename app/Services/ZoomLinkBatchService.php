<?php
namespace App\Services;

use App\Models\ZoomLink;
use App\Models\ZoomLinkBatch;

class ZoomLinkBatchService
{
    public function search()
    {
        $settings = ZoomLinkBatch:: orderBy('id','desc');

        if(request('date')){
            $key = \request('date');
            $settings = $settings->where('date',$key);
        }
        if(request('name')){
            $key = \request('name');
            $settings = $settings->whereHas('user',function ($u) use($key){
                $u->where('name','like','%'.$key.'%');
            })->orWhere('student_id','like','%'.$key.'%');
        }
        if(request('course_id')){
            $key = \request('course_id');
            $settings = $settings->whereHas('batch.time_slot',function ($q) use($key){
                $q->where('course_id',$key);
            });
        }
        if(request('batch_id')){
            $key = \request('batch_id');
            $settings = $settings->where('batch_id',$key);
        }
        if (request('per_page')) {
            $per_page = request('per_page');
            $settings = $settings->paginate($per_page);
        } else {
            $settings = $settings->paginate(config('custom.per_page'));
        }
        return $settings;
    }

    public function storeData($validateData)
    {
        $setting = ZoomLinkBatch::firstOrNew(['batch_id' => $validateData['batch_id']]);
        $setting->zoom_link_id = $validateData['zoom_link_id'];
        return $setting->save();
    }

    public function updateData($validateData, $id)
    {
        $setting = ZoomLinkBatch::findOrFail($id);
        $setting->batch_id = $validateData['batch_id'];
        $setting->zoom_link_id = $validateData['zoom_link_id'];
        return $setting->save();
    }
}
