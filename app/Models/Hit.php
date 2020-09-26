<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $fillable = [
        'house_id', 'created_at'
    ];
    public function house() {
        return $this->belongsTo('App\Models\House');
    }     
}
