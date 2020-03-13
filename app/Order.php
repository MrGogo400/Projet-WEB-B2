<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->belongsToMany(Produit::class, 'order_items','order_id','product_id');
    }
}
