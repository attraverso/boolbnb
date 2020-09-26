<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function houses() {
        return $this->belongsToMany('App\Models\House');
    }
}
