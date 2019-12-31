<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded=[];


    public function models(){

        return $this->belongsToMany(ProductModel::class, 'product_model', 'category_id','model_id') ;
    }
}
