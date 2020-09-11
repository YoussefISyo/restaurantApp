<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'photo'
    ];

    public function meals(){
        return $this->hasMany(Meal::class, 'category_id', 'id');
    }
}
