<?php
namespace App\Services;

use App\Models\ZoomLink;

class ZoomLinkService
{
    public function storeData($validateData)
    {
        $setting = ZoomLink::firstOrNew(['course_id' => $validateData['course_id']]);
        $setting->link = $validateData['link'];
        $setting->name = $validateData['name'];
        $setting->status = $validateData['status'];
        return $setting->save();
    }

    public function updateData($validateData, $id)
    {
        $setting = ZoomLink::findOrFail($id);
        $setting->name = $validateData['name'];
        $setting->status = $validateData['status'];
        $setting->link = $validateData['link'];
        return $setting->save();
    }
}
