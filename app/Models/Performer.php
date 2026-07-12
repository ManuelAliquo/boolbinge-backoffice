<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
