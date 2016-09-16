<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //
    protected $fillable=[
    	'customer_id',
    	'category',
    	'description',
        'Acquired_Value',
        'Acquired_Date',
        'Recent_Value',
        'Recent_Date',

    ];

     public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
