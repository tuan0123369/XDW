<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function order(){
        return $this->belongsTo('App\Models\Order','id_order','id_order');

    }
    public function product(){
        return $this->belongsTo('App\Models\Product','id_product','id_product');
        
    }
}
