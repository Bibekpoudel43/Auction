<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'address', 'phone_no', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
     public function items(){
        return $this->hasMany('App\Item');
    }

    public function itemBid()
	{
		return $this->belongsToMany('App\Item', 'bids', 'item_id', 'user_id')->withPivot('id', 'amount', 'created_at' ,'updated_at');
    }
    
    public function itemPurchase()
	{
		return $this->belongsToMany('App\Item', 'purchases', 'user_id', 'item_id')->withPivot('id', 'user_id', 'item_id', 'amount', 'created_at' ,'updated_at');
	}
}
