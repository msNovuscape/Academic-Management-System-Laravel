<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCounselling extends Model
{
    use HasFactory;

    public function studentCounsellingStatuses()
    {
        return $this->hasMany(SCounsellingStatus::class);
    }
}
