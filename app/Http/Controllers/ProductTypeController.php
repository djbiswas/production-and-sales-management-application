<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::get();
        return view('productTypes.index',compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productTypes.create');
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
            'product_type_name' => 'required',
            'product_type_notes' => 'sometimes'

        ]);

        $productType = new ProductType();
        $productType->product_type_name = $request->product_type_name;
        $productType->product_type_notes = $request->product_type_notes;

        $productType->save();

        flash('New Product Type Add Success.')->success();

        return redirect()->route('productTypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('productTypes.edit',compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $this->validate($request, [
            'product_type_name' => 'required',
            'product_type_notes' => 'sometimes'

        ]);

        $productType = ProductType::find($productType->id);
        $productType->product_type_name = $request->product_type_name;
        $productType->product_type_notes = $request->product_type_notes;

        $productType->save();

        flash('New Product Type Update Success.')->success();

        return redirect()->route('productTypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        //
    }
}
