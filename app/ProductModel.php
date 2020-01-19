<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $guarded=[];

    public function categories(){

        return $this->belongsToMany(ProductCategory::class, 'product_model', 'category_id','model_id') ;
    }

    public function product_type(){
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id') ;
    }

    public function stock_item_group(){
        return $this->belongsTo(StockItemGroup::class, 'stock_item_group_id', 'id') ;
    }
    public function tax_category(){
        return $this->belongsTo(TaxCategory::class, 'tax_category_id', 'id') ;
    }
    public function stock_unit(){
        return $this->belongsTo(StockUnit::class, 'stock_unit_id', 'id') ;
    }

}
