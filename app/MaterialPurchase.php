<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialPurchase extends Model
{
    protected $guarded=[];

    public function products(){
        return $this->belongsToMany(ProductCategory::class, 'product_model', 'category_id','model_id') ;
    }

    public function product_models(){

        return $this->belongsTo(ProductModel::class, 'product_model_id', 'id') ;
    }

    public function suppliers(){

        return $this->belongsTo(Supplier::class, 'supplier_id', 'id') ;
    }
}
