<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function performers()
    {
        return $this->belongsToMany(Performer::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
