<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomLinkBatch extends Model
{
    use HasFactory;

    protected $fillable = ['zoom_link_id', 'batch_id'];

    public function zoomLink()
    {
        return $this->belongsTo(ZoomLink::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
