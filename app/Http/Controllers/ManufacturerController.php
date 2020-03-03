<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\ProductModel;
use App\ProductType;
use App\Rawmaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::get();
        return view('manufacturers.index',compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawmaterials = Rawmaterial::pluck('name','id');
        $tiles = ProductModel::where('store','Tiles')->pluck('product_model_name','id');
        $productClass = ProductType::pluck('product_type_name','id');
        return view('manufacturers.create',compact('rawmaterials','productClass','tiles'));

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
            'date' => 'sometimes',
            'product_model_id' => 'sometimes',
            'quantity' => 'required',
            'product_type_id' => 'required',
            'select_sand' => 'required',
            'white_sand' => 'required',
            'red_color' => 'required',
            'yellow_color' => 'required',
            'black_color' => 'required',
            'chemical_color' => 'required',
            'cement' => 'required',
            'stone' => 'required'

        ]);

        $manufacturer = new Manufacturer();
        $manufacturer->date = $request->date;
        $manufacturer->product_model_id = $request->product_model_id;
        $manufacturer->quantity = $request->quantity;
        $manufacturer->product_type_id = $request->product_type_id;
        $manufacturer->select_sand = $request->select_sand;
        $manufacturer->white_sand = $request->white_sand;
        $manufacturer->red_color = $request->red_color;
        $manufacturer->yellow_color = $request->yellow_color;
        $manufacturer->black_color = $request->black_color;
        $manufacturer->chemical_color = $request->chemical_color;
        $manufacturer->cement = $request->cement;
        $manufacturer->stone = $request->stone;
        $manufacturer->save();

        $product = ProductModel::find($request->product_model_id);
        return $product->quantity = $product->quantity + $request->quantity;
        $product->save();

        $select_sand = Rawmaterial::find(1);
        $select_sand->quantity = $select_sand->quantity - ($request->select_sand * $request->quantity);
        $select_sand->save();

        $white_sand = Rawmaterial::find(2);
        $white_sand->quantity = $white_sand->quantity - ($request->white_sand * $request->quantity);
        $white_sand->save();

        $red_color = Rawmaterial::find(3);
        $red_color->quantity = $red_color->quantity - ($request->red_color * $request->quantity);
        $red_color->save();

        $yellow_color = Rawmaterial::find(4);
        $yellow_color->quantity = $yellow_color->quantity - ($request->yellow_color * $request->quantity);
        $yellow_color->save();

        $black_color = Rawmaterial::find(5);
        $black_color->quantity = $black_color->quantity - ($request->black_color * $request->quantity);
        $black_color->save();

        $chemical_color = Rawmaterial::find(6);
        $chemical_color->quantity = $chemical_color->quantity - ($request->chemical_color * $request->quantity);
        $chemical_color->save();

        $cement = Rawmaterial::find(7);
        $cement->quantity = $cement->quantity - ($request->cement * $request->quantity);
        $cement->save();

        $stone = Rawmaterial::find(8);
        $stone->quantity = $stone->quantity - ($request->stone * $request->quantity);
        $stone->save();

        flash('New Manufacturer Complete.')->success();
        return redirect()->route('manufacturers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        //
    }


    public function class_data(Request $request) {
        $id = $request->id;
        $product = ProductType::where('id',$id)->first();
        return $product;
    }

}
