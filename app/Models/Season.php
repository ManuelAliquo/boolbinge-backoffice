<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
