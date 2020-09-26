<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseService extends Model
{
	protected $table = 'house_service';

    public function houses() {
		$this->belongsToMany('App\Models\House');
	}
 
	public function services() {
		$this->belongsToMany('App\Models\Service');
	}
}
