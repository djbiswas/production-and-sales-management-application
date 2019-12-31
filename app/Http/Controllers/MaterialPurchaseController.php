<?php

namespace App\Http\Controllers;

use App\MaterialPurchase;
use Illuminate\Http\Request;

class MaterialPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialPurchase  $materialPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialPurchase $materialPurchase)
    {
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
        return view('purchases.edit');
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
        //
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
