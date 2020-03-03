<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   Manufacturer extends Model
{
    public function product_models(){

        return $this->belongsTo(ProductModel::class, 'product_model_id', 'id') ;
    }

    public function product_type(){

        return $this->belongsTo(ProductType::class, 'product_type_id', 'id') ;
    }
}
