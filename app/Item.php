<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    protected $fillable =[
    	'name',
    	'description',
		'initial_price',
		'market_price',
    	'end_date_time',
    	'image_name',
    	'category_id',
    ];

	protected $dates = ['end_date_time'];
	
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function userBid()
	{
		return $this->belongsToMany('App\User', 'bids', 'item_id','user_id')->withPivot('id', 'user_id', 'item_id', 'amount', 'created_at' ,'updated_at');
	}
	
	public function userPurchase()
	{
		return $this->belongsToMany('App\User', 'purchases', 'user_id', 'item_id')->withPivot('id', 'user_id', 'item_id', 'amount', 'created_at' ,'updated_at');
	}
}
