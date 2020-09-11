<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'payment', 'totalprice', 'ordertime',
        'address', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderContents(){
        return $this->hasMany(OrderContent::class);
    }
}
