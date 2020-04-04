<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Order extends Model
{
    protected $fillable=['transaction_id'];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
