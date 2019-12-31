<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialPurchase extends Model
{
    protected $guarded=[];

    public function products(){

        return $this->belongsToMany(ProductCategory::class, 'product_model', 'category_id','model_id') ;
    }
}
