<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
 protected $fillable=[
        'desc',
		'status',
		'expecteddate',
		'estmtdcost',
		'actualdate',
		'actualcost',
            		];


    public function workorders() {
        return $this->hasMany('App\Workorder');

    }
}
