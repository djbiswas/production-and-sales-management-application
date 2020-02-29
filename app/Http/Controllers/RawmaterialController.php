<?php

namespace App\Http\Controllers;

use App\Rawmaterial;
use App\StockUnit;
use Illuminate\Http\Request;

class RawmaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawmaterials = Rawmaterial::get();
        return view('rawmaterials.index',compact('rawmaterials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock_units = StockUnit::pluck('unit_name','id');
        return view('rawmaterials.create',compact('stock_units'));
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
            'name' => 'sometimes',
            'stock_unit_id' => 'sometimes',
            'quantity' => 'sometimes|max:255',
            'note' => 'sometimes|max:255'

        ]);

//        return $request->all();

        $rawmaterial = new Rawmaterial();
        $rawmaterial->name = $request->name;
        $rawmaterial->stock_unit_id = $request->stock_unit_id;
        $rawmaterial->note = $request->note;
        $rawmaterial->save();

        flash('New Raw Material Add Success.')->success();

        return redirect()->route('rawmaterials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rawmaterial  $rawmaterial
     * @return \Illuminate\Http\Response
     */
    public function show(Rawmaterial $rawmaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rawmaterial  $rawmaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(Rawmaterial $rawmaterial)
    {
        $stock_units = StockUnit::pluck('unit_name','id');
        return view('rawmaterials.edit',compact('rawmaterial','stock_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rawmaterial  $rawmaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rawmaterial $rawmaterial)
    {
        $this->validate($request, [
            'name' => 'sometimes',
            'stock_unit_id' => 'sometimes',
            'quantity' => 'sometimes|max:255',
            'note' => 'sometimes|max:255'

        ]);

//        return $request->all();

        $rawmaterial->name = $request->name;
        $rawmaterial->stock_unit_id = $request->stock_unit_id;
        $rawmaterial->note = $request->note;
        $rawmaterial->save();

        flash('New Raw Material Add Success.')->success();
        return redirect()->route('rawmaterials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rawmaterial  $rawmaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rawmaterial $rawmaterial)
    {
        //
    }
}
