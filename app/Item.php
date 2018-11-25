<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    protected $fillable =[
    	'name',
    	'description',
    	'initial_price',
    	'end_date_time',
    	'image_name',
    	'user_id'
    ];

    protected $dates = ['end_date_time'];

    public function users(){
    	return $this->belongsTo('App\User');
    }
}
