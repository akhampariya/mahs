<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
 protected $fillable=[
        'tenantname',
        'tenant_id',   
        'desc',
		'status',
		'expecteddate',
		'estmtdcost',
		'actualdate',
		'actualcost',
        'createdBy',
            		];


        public function property()
        {
        return $this->hasMany('App\Property');
        }

        public function user() 
        {
        return $this->belongsTo('App\User');
        }
       public function apartment() 
        {
        return $this->belongsTo('App\Apartment');
        }
}
