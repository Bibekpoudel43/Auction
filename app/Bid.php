<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable= [
    	'bid_amount', 'user_id', 'item_id', 'status'
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function items(){
    	return $this->belongsTo('App\Item');
    }
}
