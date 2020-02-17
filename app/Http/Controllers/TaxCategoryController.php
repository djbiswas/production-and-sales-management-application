<?php

namespace App\Http\Controllers;

use App\TaxCategory;
use Illuminate\Http\Request;

class TaxCategoryController extends Controller
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
        $tax_categories = TaxCategory::get();
        return view('taxCategories.index',compact('tax_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxCategories.create');
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
            'tax_name' => 'required',
            'tax_description' => 'sometimes'

        ]);

        $taxCategory = new TaxCategory();
        $taxCategory->tax_name = $request->tax_name;
        $taxCategory->tax_description = $request->tax_description;

        $taxCategory->save();

        flash('New Tax Category Add Success')->success();

        return redirect()->route('productTypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaxCategory  $taxCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TaxCategory $taxCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaxCategory  $taxCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxCategory $taxCategory)
    {
        return view('taxCategories.edit',compact('taxCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaxCategory  $taxCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxCategory $taxCategory)
    {
        $this->validate($request, [
            'tax_name' => 'required',
            'tax_description' => 'sometimes'

        ]);

        $taxCategory = TaxCategory::find($taxCategory->id);
        $taxCategory->tax_name = $request->tax_name;
        $taxCategory->tax_description = $request->tax_description;

        $taxCategory->save();

        flash('Tax Category Update Success')->success();

        return redirect()->route('stockUnits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaxCategory  $taxCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxCategory $taxCategory)
    {
        //
    }
}
