<?php

namespace App\Http\Controllers;


use App\customer;
use App\ProductModel;
use App\Sale;
use App\SaleItem;
use App\SalePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get();
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
        $inv = 'SST'.$today . $rand;

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
        $this->validate($request, [
            'invoice' => 'required',
            'customer_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'product_model_id' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $saleStatus = 'Due';

        if ($request->due == 0){
            $saleStatus = 'Complete';
        }

        $sale = new Sale();
        $sale->invoice = $request->invoice;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = Auth::user()->id;
        $sale->date = $request->date;
        $sale->subtotal = $request->subtotal;
        $sale->vat = $request->vat;
        $sale->discount = $request->discount;
        $sale->netTotal = $request->netTotal;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $sale->status = $saleStatus;
        $sale->save();


//        $payment = [
//            'invoice' => $request->invoice,
//            'date' => $request->date,
//            'sale_id' => $sale->id,
//            'customer_id' => $request->customer_id,
//            'user_id' => Auth::user()->id,
//            'amount' => $request->paid
//        ];


        $payment = new SalePayment();
        $payment->invoice = $request->invoice;
        $payment->date = $request->date;
        $payment->sale_id = $sale->id;
        $payment->customer_id = $request->customer_id;
        $payment->user_id = Auth::user()->id;
        $payment->amount = $request->paid;
        $payment->save();

        for ($i=0; $i <count($request->price) ; $i++) {
            $saleItem = new SaleItem();
            $saleItem->invoice = $request->invoice;
            $saleItem->sale_id = $sale->id;
            $saleItem->product_model_id = $request->product_model_id[$i];
            $saleItem->orderQuantity = $request->orderQuantity[$i];
            $saleItem->price = $request->price[$i];
            $saleItem->totalPrice = $request->totalPrice[$i];
            $saleItem->save();
        }

        flash('New Sales Add Success.')->success();

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $customers = customer::pluck('name','id');
        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->first();
        return $sale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $customers = customer::pluck('name','id');
        $sale = Sale::where('id',$sale->id)->with('sale_items')->with('sale_payments')->first();
        return view('sales.edit',compact('sale','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request, [
            'invoice' => 'required',
            'customer_id' => 'required',
            'date' => 'required',
            'subtotal' => 'required',
            'vat' => 'sometimes',
            'discount' => 'sometimes',
            'netTotal' => 'required',
            'paid' => 'sometimes',
            'due' => 'sometimes',
            'product_model_id' => 'sometimes',
            'orderQuantity' => 'sometimes',
            'price' => 'sometimes',
            'totalPrice' => 'sometimes'
        ]);

        $saleStatus = 'Due';

        if ($request->due == 0){
            $saleStatus = 'Complete';
        }

        $sale = Sales::find($sales->id);
        $sale->invoice = $request->invoice;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = Auth::user()->id;
        $sale->date = $request->date;
        $sale->subtotal = $request->subtotal;
        $sale->vat = $request->vat;
        $sale->discount = $request->discount;
        $sale->netTotal = $request->netTotal;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $sale->status = $saleStatus;
        $sale->save();

        for ($i=0; $i <count($request->price) ; $i++) {
            $saleItem = new SaleItem();
            $saleItem->invoice = $request->invoice;
            $saleItem->sale_id = $sale->id;
            $saleItem->product_model_id = $request->product_model_id[$i];
            $saleItem->orderQuantity = $request->orderQuantity[$i];
            $saleItem->price = $request->price[$i];
            $saleItem->totalPrice = $request->totalPrice[$i];
            $saleItem->save();
        }

        flash('New Sales Add Success.')->success();

        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        flash('Sale Delete Success')->success();
        return redirect()->route('sales.index');
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
