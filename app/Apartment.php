<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  

protected $fillable=[
        'apt_name',
        'apt_typ',
        'tid',
        'pid',
            		];
  public function workorder() 
        {
        return $this->belongsTo('App\Apartment');
        }
}
