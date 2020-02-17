<?php

namespace App\Http\Controllers;

use App\StockItemGroup;
use Illuminate\Http\Request;

class StockItemGroupController extends Controller
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
        $stockItemGroups = StockItemGroup::get();
        return view('stockItemGroups.index',compact('stockItemGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stockItemGroups.create');
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
            'group_name' => 'required',
            'group_description' => 'sometimes'

        ]);

        $stockItemGroup = new StockItemGroup();
        $stockItemGroup->group_name = $request->group_name;
        $stockItemGroup->group_description = $request->group_description;

        $stockItemGroup->save();

        flash('New Stock Group Add Success.')->success();

        return redirect()->route('stockItemGroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockItemGroup  $stockItemGroup
     * @return \Illuminate\Http\Response
     */
    public function show(StockItemGroup $stockItemGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockItemGroup  $stockItemGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(StockItemGroup $stockItemGroup)
    {
        return view('stockItemGroups.edit',compact('stockItemGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockItemGroup  $stockItemGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockItemGroup $stockItemGroup)
    {
        $this->validate($request, [
            'group_name' => 'required',
            'group_description' => 'sometimes'

        ]);

        $stockItemGroup = StockItemGroup::find($stockItemGroup->id);
        $stockItemGroup->group_name = $request->group_name;
        $stockItemGroup->group_description = $request->group_description;

        $stockItemGroup->save();

        flash('New Stock Group Update Success.')->success();

        return redirect()->route('stockItemGroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockItemGroup  $stockItemGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockItemGroup $stockItemGroup)
    {
        //
    }
}
