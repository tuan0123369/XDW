<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function orderdetail()
    {
        return $this->hasMany('App\Models\OrderDetail', 'id_order', 'id_order');
    }

    public function addOrder($id_user)
    {
    }
}
