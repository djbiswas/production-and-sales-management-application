<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawpurchase extends Model
{
    protected $guarded=[];


    public function rawmaterials(){

        return $this->belongsTo(Rawmaterial::class, 'rawmaterial_id', 'id') ;
    }

    public function suppliers(){

        return $this->belongsTo(Supplier::class, 'supplier_id', 'id') ;
    }
}
