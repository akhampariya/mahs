<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
 protected $fillable=[
        'tenantname',
        'desc',
		'status',
		'expecteddate',
		'estmtdcost',
		'actualdate',
		'actualcost',
        'createdBy',
            		];


    // public function workorders() {
    //     return $this->hasMany('App\Workorder');

    // }

        public function user() {
        return $this->belongsTo('App\User');

    }
}
