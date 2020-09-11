<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'name', 'photo', 'price', 'category_id', 'ingrediants'
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
