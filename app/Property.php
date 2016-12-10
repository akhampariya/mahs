<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=[
        'property_name',
        // 'apt_no',   
        'address',
        ];

        public function workorder() {
        return $this->belongsTo('App\Workorder');
        return $this->belongsTo('App\Apartment');


    }
}
