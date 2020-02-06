<?php

namespace App\Http\Controllers;

use App\ReturnProduct;
use Illuminate\Http\Request;

class ReturnProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return_products = ReturnProduct::get();
        return view('return_products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnProduct $returnProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnProduct $returnProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnProduct $returnProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnProduct $returnProduct)
    {
        //
    }
}
