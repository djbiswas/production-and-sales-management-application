<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawmaterial extends Model
{
    protected $guarded=[];

    public function stockUnits(){
        return $this->belongsTo(StockUnit::class, 'stock_unit_id','id' ) ;
    }
}
