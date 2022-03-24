<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_categories';
    use HasFactory;
    protected $table = "categories";

    public function product(){
        return $this->hasMany('App\Models\Product','id_categories','id_categories');
    }
    //hasMany('App\Product','khoangoai','khoachinh') 
}
