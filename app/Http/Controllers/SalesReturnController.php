<?php

namespace App\Http\Controllers;

use App\ProductModel;
use App\Sale;
use App\SaleItem;
use App\SalesReturn;
use App\SalesReturnItem;
use Illuminate\Http\Request;

class SalesReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $returns = SalesReturn::with('sale')->with('customer')->get();
        return view('sales_returns.index',compact('returns'));
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
            'date' => 'required',
            'product_model_id' => 'required',
            'sale_id' => 'required',
            'customer_id' => 'required',
            'sale_item_id' => 'required',
            'qty' => 'required',
            'amount' => 'required'
        ]);

        $salesreturn = new SalesReturn();
        $salesreturn->date = $request->date;
        $salesreturn->sale_id = $request->sale_id[0];
        $salesreturn->customer_id = $request->customer_id;
        $salesreturn->items = count($request->sale_id);
        $salesreturn->amount = $request->amount;
        $salesreturn->save();

        $sales = Sale::find($request->sale_id[0]);
        $sales->status = 'Return';
        $sales->save();

        for ($i=0; $i <count($request->sale_id) ; $i++) {
            $salesreturnitem = new SalesReturnItem();
            $salesreturnitem->sales_return_id = $salesreturn->id;
            $salesreturnitem->product_model_id = $request->product_model_id[$i];
            $salesreturnitem->sale_item_id = $request->sale_item_id[$i];
            $salesreturnitem->qty = $request->qty[$i];

            if ($request->qty[$i] != ''){

                $salesreturnitem->save();

                $sale = Sale::find($request->sale_id[$i]);
                $sale->status = 'Returned';
                $product = ProductModel::where('id', $request->product_model_id[$i])->first();
                $qty = $product->quantity;
                $qty = $qty + $request->qty[$i];
                $productModel = ProductModel::find($request->product_model_id[$i]);
                $productModel->quantity = $qty;
                $productModel->save();

                $sale_item = SaleItem::find($request->sale_item_id[$i]);
                $sale_item->status = 1;
                $sale_item->save();
            }

        }

        flash('Product Return Success')->success();
        return redirect()->route('sales_returns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function show(SalesReturn $salesReturn)
    {
        $salesReturn = SalesReturn::where('id',$salesReturn->id)->with('sale')->with('customer')->with('salesReturnItem')->first();
        $returnItems = SalesReturnItem::where('sales_return_id',$salesReturn->id)->with('productModel')->get();
        return view('sales_returns.show',compact('salesReturn','returnItems'));
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
