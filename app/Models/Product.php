<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey ='id_product'; 
    use HasFactory;
    protected $table = 'products';

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'id_categories', 'id_product');
    }

    public function cart()
    {
        return $this->belongsToMany('App\Models\User','cart','id_product','id_product');
    }
    
    public function orderdetail(){
        return $this->hasMany('App\Models\OrderDetail','id_product','id_product');  
    }
}
