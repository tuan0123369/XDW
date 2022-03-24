<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";

    public function category(){
        return $this->belongsTo('App\Category','id_categories','id_product');
    }
    //return $this->belongsTo('App\Category','khoaingoai','khoachinh');
}
