<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded=[];

    public function sale_items(){
        return $this->hasMany(SaleItem::class) ;
    }

    public function sale_payments(){
        return $this->hasMany(SalePayment::class) ;
    }
}
