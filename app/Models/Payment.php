<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $guarded = [];

    public function advert() {
        return $this->belongsTo('App\Models\Advert');
    }     

    public function house() {
        return $this->belongsTo('App\Models\House');
    }     
}
