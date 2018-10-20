<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable=['name','author','content','class_id'];

    public function atricle_categories(  ){
        return $this->hasOne(AtricleCategory::class,'id','class_id');

        }

}
