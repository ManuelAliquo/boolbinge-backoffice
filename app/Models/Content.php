<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
