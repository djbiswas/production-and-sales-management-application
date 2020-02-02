<?php

namespace App\Http\Controllers;

use App\customer;
use App\ProductModel;
use App\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $inv = $today . $rand;

        $customers = customer::pluck('name','id');

        return view('sales.create',compact('customers','inv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }


    /**
     * GetProducts
     */
    public function getProducts(Request $request)
    {
        $name = $request->get('name');
        $fieldName =  $request->get('fieldName');

        $name = strtolower(trim($name));
        if (empty($fieldName)) {
            $fieldName = 'product_model_name';
        }

//        $countries = DB::table('country')
//            ->select('country.*')
//            ->where(`LOWER(`.$fieldName.`)`, 'LIKE', "$name%")
//            ->limit(25)
//            ->get();

        $products = ProductModel::where(`LOWER(`.$fieldName.`)`, 'LIKE', "$name%")->get();

        return $products;
    }

    public function addNewRow()
    {
        $products = ProductModel::pluck('product_model_name','id');
        return view('sales.addNewRow',compact('products'));
    }

    public function single_sell_item(Request $request) {
        $id = $request->id;
        $product = ProductModel::where('id',$id)->first();
        return $product;

    }

}
