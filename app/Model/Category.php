<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'slug'];

    public function items()
    {
        return $this->hasMany('App\Model\Item');
    }
}
