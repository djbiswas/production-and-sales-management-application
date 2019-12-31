<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $guarded=[];

    public function categories(){

        return $this->belongsToMany(ProductCategory::class, 'product_model', 'category_id','model_id') ;
    }
}
