<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product_order(){
        return $this->hasMany(Productorder::class, 'order_id', 'id');
    }


    



}
