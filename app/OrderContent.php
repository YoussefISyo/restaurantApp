<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    protected $fillable = [
        'order_id', 'meal_id','quantity'
    ];

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function meals(){
        return $this->belongsTo(Meal::class);
    }
}
