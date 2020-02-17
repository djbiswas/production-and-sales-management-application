<?php

namespace App\Http\Controllers;

use App\StockUnit;
use Illuminate\Http\Request;

class StockUnitController extends Controller
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
        $stockUnits = StockUnit::get();
        return view('stockUnits.index',compact('stockUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stockUnits.create');
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
            'unit_name' => 'required',
            'unit_description' => 'sometimes'

        ]);

        $stockUnit = New StockUnit();
        $stockUnit->unit_name = $request->unit_name;
        $stockUnit->unit_description = $request->unit_description;

        $stockUnit->save();

        flash('Stock Unit Add Success')->success();

        return redirect()->route('stockUnits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockUnit  $stockUnit
     * @return \Illuminate\Http\Response
     */
    public function show(StockUnit $stockUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockUnit  $stockUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(StockUnit $stockUnit)
    {
        return view('stockUnits.edit',compact('stockUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockUnit  $stockUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockUnit $stockUnit)
    {
        $this->validate($request, [
            'unit_name' => 'required',
            'unit_description' => 'sometimes'

        ]);

        $stockUnit = StockUnit::find($stockUnit->id);
        $stockUnit->unit_name = $request->unit_name;
        $stockUnit->unit_description = $request->unit_description;

        $stockUnit->save();

        flash('Stock Unit Update Success')->success();

        return redirect()->route('stockUnits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockUnit  $stockUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockUnit $stockUnit)
    {
        //
    }
}
