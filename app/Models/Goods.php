<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $fillable=['name','c_id','price','intro','is_on_sale','logo'];

    //一对一
    public function goods_category( ){
        return $this->belongsTo(GoodsCategory::class,"c_id");
    }
}
