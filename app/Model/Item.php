<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'image'];  
      
    public function Category(){
        return $this->belongsTo('App\Category');
    }
}
