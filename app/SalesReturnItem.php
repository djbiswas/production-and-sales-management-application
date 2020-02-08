<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReturnItem extends Model
{
    protected $guarded=[];

    public function productModel(){
        return $this->belongsTo(ProductModel::class);
    }
}
