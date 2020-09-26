<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'user_id', 'title', 'nr_of_rooms', 'nr_of_beds', 'nr_of_bedrooms', 'nr_of_bathrooms', 'square_mt', 'address', 'latitude', 'longitude', 'description', 'advertised', 'visible'
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }     

    public function payments() {
        return $this->hasMany('App\Models\Payment');
    }     

    public function hits() {
        return $this->hasMany('App\Models\Hit');
    }     

    public function messages() {
        return $this->hasMany('App\Models\Message');
    }     

    public function services() {
        return $this->belongsToMany('App\Models\Service');
    }
}
