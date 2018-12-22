<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    
    protected $guarded = [
    ];

    public function item()
    {
        return $this->hasMany('App\Item');
    }
}

