<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    protected $guarded=[];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function customer(){
        return $this->belongsTo(customer::class);
    }

    public function salesReturnItem(){
        return $this->hasMany(SalesReturnItem::class);
    }
}
