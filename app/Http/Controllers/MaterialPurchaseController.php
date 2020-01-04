<?php

namespace App\Http\Controllers;

use App\MaterialPurchase;
use App\ProductModel;
use App\Supplier;
use App\Currency;
use Illuminate\Http\Request;

class MaterialPurchaseController extends Controller
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
        $purchases = MaterialPurchase::with('product_models')->with('suppliers')->get();
        return view('purchases.index')->with(compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductModel::pluck('product_model_name', 'id');
        $suppliers = Supplier::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'value');
        return view('purchases.create')->with(compact('products','suppliers','currencies'));

    }


    function get_currency() {

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
            'product' => 'sometimes',
            'supplier' => 'required',
            'currency' => 'sometimes|max:255',
            'lc' => 'sometimes|max:255',
            'total_bdt' => 'sometimes|max:255',
            'duty' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255'

        ]);

        $unit_price = $request->total_bdt_amount / $request->quantity;


        $purchases = new MaterialPurchase();
        $purchases->product_model_id = $request->product;
        $purchases->supplier_id = $request->supplier;
        $purchases->currency = $request->currency;
        $purchases->lc = $request->lc;
        $purchases->total_bdt = $request->total_bdt;
        $purchases->duty = $request->duty;
        $purchases->quantity = $request->quantity;
        $purchases->unit_price = $unit_price;



        $purchases->save();

        flash('New Purchases Add Success.')->success();

        return redirect()->route('materialPurchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialPurchase  $materialPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialPurchase $materialPurchase)
    {
         return $materialPurchase;
        return view('purchases.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialPurchase  $materialPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialPurchase $materialPurchase)
    {

        $products = ProductModel::pluck('product_model_name', 'id');
        $suppliers = Supplier::pluck('name', 'id');
        return view('purchases.edit')->with(compact('materialPurchase','products','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialPurchase  $materialPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialPurchase $materialPurchase)
    {
        $this->validate($request, [
            'product' => 'sometimes',
            'supplier' => 'required',
            'currency' => 'sometimes|max:255',
            'lc' => 'sometimes|max:255',
            'total_bdt' => 'sometimes|max:255',
            'duty' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255'

        ]);

        $unit_price = $request->total_bdt_amount / $request->quantity;


        $purchases = MaterialPurchase::find($materialPurchase->id);
        $purchases->product_model_id = $request->product;
        $purchases->supplier_id = $request->supplier;
        $purchases->currency = $request->currency;
        $purchases->lc = $request->lc;
        $purchases->total_bdt = $request->total_bdt;
        $purchases->duty = $request->duty;
        $purchases->quantity = $request->quantity;
        $purchases->unit_price = $unit_price;



        $purchases->save();

        flash('New Purchases Update Success.')->success();

        return redirect()->route('materialPurchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialPurchase  $materialPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialPurchase $materialPurchase)
    {
        //
    }
}
