<?php
namespace App\Services;


use App\Models\FiscalYear as Model;

class FiscalYearService {

    public function storeData($requestAll)
    {
        $setting = new Model();
        $setting->name = $requestAll['name'];
        $setting->start_date = $requestAll['start_date'];
        $setting->end_date = $requestAll['end_date'];
        $setting->status = $requestAll['status'];
        $setting->save();
        return $setting;
    }

    public function updateData($requestAll,$id)
    {
        $setting = Model::findOrFail($id);
        $setting->name = $requestAll['name'];
        $setting->start_date = $requestAll['start_date'];
        $setting->end_date = $requestAll['end_date'];
        $setting->status = $requestAll['status'];
        $setting->save();
        return $setting;
    }

}
