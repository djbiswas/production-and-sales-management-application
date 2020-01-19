<?php

namespace App\Http\Controllers;

use App\Lc;
use App\ProductModel;
use App\ProductType;
use App\StockItemGroup;
use App\StockUnit;
use App\TaxCategory;
use Illuminate\Http\Request;

class ProductModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $productModels = ProductModel::with('product_type')->with('stock_item_group')->with('tax_category')->with('stock_unit')->get();
        return view('products.index',compact('productModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lcs = Lc::pluck('name','id');
        $stock_units = StockUnit::pluck('unit_name','id');
        $tax_categories = TaxCategory::pluck('tax_name','id');
        $product_types = ProductType::pluck('product_type_name','id');
        $stockItemGroup = StockItemGroup::pluck('group_name','id');
        return view('products.create', compact('product_types','stockItemGroup','tax_categories','stock_units','lcs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_type_id' => 'required',
            'product_model_name' => 'required',
            'unitPrice' => 'required',
            'sellPrice' => 'required',
            'quantity' => 'required',
            'stock_item_group_id' => 'required',
            'tax_category_id' => 'required',
            'lc_id' => 'required',
            'stock_unit_id' => 'required',
            'model_description' => 'sometimes'

        ]);

        $productModel = New ProductModel();
        $productModel->product_type_id = $request->product_type_id;
        $productModel->product_model_name = $request->product_model_name;
        $productModel->unitPrice = $request->unitPrice;
        $productModel->sellPrice = $request->sellPrice;
        $productModel->quantity = $request->quantity;
        $productModel->stock_item_group_id = $request->stock_item_group_id;
        $productModel->tax_category_id = $request->tax_category_id;
        $productModel->lc_id = $request->lc_id;
        $productModel->stock_unit_id = $request->stock_unit_id;
        $productModel->model_description = $request->model_description;

        $productModel->save();

        flash('Product Add Success')->success();

        return redirect()->route('productModels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductModel $productModel)
    {
        $lcs = Lc::pluck('name','id');
        $stock_units = StockUnit::pluck('unit_name','id');
        $tax_categories = TaxCategory::pluck('tax_name','id');
        $product_types = ProductType::pluck('product_type_name','id');
        $stockItemGroup = StockItemGroup::pluck('group_name','id');
        return view('products.edit', compact('productModel','product_types','stockItemGroup','tax_categories','stock_units','lcs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
        $this->validate($request, [
            'product_type_id' => 'required',
            'product_model_name' => 'required',
            'unitPrice' => 'required',
            'sellPrice' => 'required',
            'quantity' => 'required',
            'stock_item_group_id' => 'required',
            'tax_category_id' => 'required',
            'lc_id' => 'required',
            'stock_unit_id' => 'required',
            'model_description' => 'sometimes'

        ]);

        $productModel = ProductModel::find($productModel->id);
        $productModel->product_type_id = $request->product_type_id;
        $productModel->product_model_name = $request->product_model_name;
        $productModel->unitPrice = $request->unitPrice;
        $productModel->sellPrice = $request->sellPrice;
        $productModel->quantity = $request->quantity;
        $productModel->stock_item_group_id = $request->stock_item_group_id;
        $productModel->tax_category_id = $request->tax_category_id;
        $productModel->lc_id = $request->lc_id;
        $productModel->stock_unit_id = $request->stock_unit_id;
        $productModel->model_description = $request->model_description;

        $productModel->save();

        flash('Product Update Success')->success();

        return redirect()->route('productModels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductModel $productModel)
    {
        //
    }
}
