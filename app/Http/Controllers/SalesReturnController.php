<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\Sale;
use App\SalesReturn;
use Illuminate\Http\Request;

class SalesReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ttt';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = Sale::get();
        return view('sales_returns.create',compact('sales'));

    }

    public function sr_form(Request $request)
    {
        $sale = Sale::where('id',$request->id)->with('sale_items')->with('sale_payments')->with('customer')->first();
        return view('sales_returns.sr_form',compact('sale'));
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
            'product_model_id' => 'required',
            'sale_id' => 'required',
            'sale_item_id' => 'required',
            'qty' => 'required',
        ]);

        for ($i=0; $i <count($request->sale_id) ; $i++) {

            $salereturn = new SalesReturn();
            $salereturn->product_model_id = $request->product_model_id[$i];
            $salereturn->sale_id = $request->sale_id[$i];
            $salereturn->sale_item_id = $request->sale_item_id[$i];
            $salereturn->qty = $request->qty[$i];
            $salereturn->save();

            $product = ProductModel::where('id', $request->product_model_id[$i])->first();
            $qty = $product->quantity;
            $qty = $qty + $request->qty[$i];

            $productModel = ProductModel::find($request->product);
            $productModel->buyPrice = $request->total_bdt;
            $productModel->unitPrice = $request->total_bdt;
            $productModel->quantity = $qty;
            $productModel->save();
        }

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function show(SalesReturn $salesReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesReturn $salesReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesReturn $salesReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesReturn $salesReturn)
    {
        //
    }
}
