<?php

namespace App\Http\Controllers;

use App\Rawmaterial;
use App\Rawpurchase;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RawpurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 1;
       $rawpurchases = Rawpurchase::with('rawmaterials')->get();
        return view('rawpurchases.index',compact('rawpurchases','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::where('store',session()->get('template'))->pluck('name','id');
        $rawmaterials = Rawmaterial::pluck('name','id');
        return view('rawpurchases.create',compact('rawmaterials','suppliers'));
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
            'rawmaterial_id' => 'required',
            'supplier_id' => 'required',
            'unitprice' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255',
            'cost' => 'sometimes|max:255',
            'price' => 'sometimes|max:255'
        ]);

        $purchases = new Rawpurchase();
        $purchases->date = $request->date;
        $purchases->rawmaterial_id = $request->rawmaterial_id;
        $purchases->supplier_id = $request->supplier_id;
        $purchases->user_id = Auth::user()->id;
        $purchases->unitprice = $request->unitprice;
        $purchases->quantity = $request->quantity;
        $purchases->cost = $request->cost;
        $purchases->price = $request->price;
        $purchases->save();

        $product = Rawmaterial::where('id',$request->rawmaterial_id)->first();
        $qty = $product->quantity;
        $qty = $qty + $request->quantity;

        $productModel = Rawmaterial::find($request->rawmaterial_id);
        $productModel->quantity = $qty;
        $productModel->save();

        flash('New Raw Purchases Update Success.')->success();

        return redirect()->route('rawpurchases.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rawpurchase  $rawpurchase
     * @return \Illuminate\Http\Response
     */
    public function show(Rawpurchase $rawpurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rawpurchase  $rawpurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Rawpurchase $rawpurchase)
    {
        $suppliers = Supplier::where('store',session()->get('template'))->pluck('name','id');
        $rawmaterials = Rawmaterial::pluck('name','id');
        return view('rawpurchases.edit',compact('rawpurchase','rawmaterials','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rawpurchase  $rawpurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rawpurchase $rawpurchase)
    {
        $this->validate($request, [
            'date' => 'required',
            'rawmaterial_id' => 'required',
            'supplier_id' => 'required',
            'unitprice' => 'sometimes|max:255',
            'quantity' => 'sometimes|max:255',
            'cost' => 'sometimes|max:255',
            'price' => 'sometimes|max:255'
        ]);

        $rwp = Rawmaterial::where('id',$rawpurchase->rawmaterial_id)->first();
        $qty = $rwp->quantity;
        $qty = $qty - $rawpurchase->quantity;
        $qty = $qty + $request->quantity;


        $rawpurchase->date = $request->date;
        $rawpurchase->rawmaterial_id = $request->rawmaterial_id;
        $rawpurchase->supplier_id = $request->supplier_id;
        $rawpurchase->user_id = Auth::user()->id;
        $rawpurchase->unitprice = $request->unitprice;
        $rawpurchase->quantity = $request->quantity;
        $rawpurchase->cost = $request->cost;
        $rawpurchase->price = $request->price;
        $rawpurchase->save();

        $productModel = Rawmaterial::find($request->rawmaterial_id);
        $productModel->quantity = $qty;
        $productModel->save();

        flash('New Raw Purchases Update Success.')->success();

        return redirect()->route('rawpurchases.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rawpurchase  $rawpurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rawpurchase $rawpurchase)
    {
        //
    }
}
