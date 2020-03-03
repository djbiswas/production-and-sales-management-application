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

    public function __construct()
    {
        $this->middleware('auth');
    }

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
            'select_sand' => 'required',
            'white_sand' => 'required',
            'red_color' => 'required',
            'yellow_color' => 'required',
            'black_color' => 'required',
            'chemical_color' => 'required',
            'cement' => 'required',
            'stone' => 'required',
            'product_type_notes' => 'sometimes'
        ]);

        $productType = new ProductType();
        $productType->product_type_name = $request->product_type_name;
        $productType->select_sand = $request->select_sand;
        $productType->white_sand = $request->white_sand;
        $productType->red_color = $request->red_color;
        $productType->yellow_color = $request->yellow_color;
        $productType->black_color = $request->black_color;
        $productType->chemical_color = $request->chemical_color;
        $productType->cement = $request->cement;
        $productType->stone = $request->stone;
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
            'select_sand' => 'required',
            'white_sand' => 'required',
            'red_color' => 'required',
            'yellow_color' => 'required',
            'black_color' => 'required',
            'chemical_color' => 'required',
            'cement' => 'required',
            'stone' => 'required',
            'product_type_notes' => 'sometimes'

        ]);

        $productType = ProductType::find($productType->id);
        $productType->product_type_name = $request->product_type_name;
        $productType->select_sand = $request->select_sand;
        $productType->white_sand = $request->white_sand;
        $productType->red_color = $request->red_color;
        $productType->yellow_color = $request->yellow_color;
        $productType->black_color = $request->black_color;
        $productType->chemical_color = $request->chemical_color;
        $productType->cement = $request->cement;
        $productType->stone = $request->stone;
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
