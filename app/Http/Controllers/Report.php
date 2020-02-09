<?php

namespace App\Http\Controllers;

use App\customer;
use App\MaterialPurchase;
use App\ProductModel;
use App\Sale;
use App\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Report extends Controller
{
    public function sales_report() {
        $customers = customer::pluck('name','id');
        return view('reports.sales_report',compact('customers'));
    }


    public function get_sales_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $customer_id = $request->customer_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($customer_id == ''){
                    $sales_date = Sale::whereRaw($query)->with('customer')->get();
                }else {
                    $sales_date = Sale::whereRaw($query)->where('customer_id',$request->customer_id)->with('customer')->get();
                }

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
                $sales_date = Sale::with('customer')->get();
            }
            return DataTables::of($sales_date)->make(true);
        }
    }

    public function purchases_report() {
        $suppliers = Supplier::pluck('name','id');
        return view('reports.purchases_report',compact('suppliers'));

    }

    public function get_purchases_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $supplier_id = $request->supplier_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($supplier_id == ''){
                    $purchase_data = MaterialPurchase::whereRaw($query)->with('product_models')->with('suppliers')->get();
                }else {
                    $purchase_data = MaterialPurchase::whereRaw($query)->where('supplier_id',$request->supplier_id)->with('suppliers')->with('product_models')->get();
                }

            } else {
//              $purchase_data = Trip::orderBy('id', 'desc')->get();
                $purchase_data = MaterialPurchase::with('suppliers')->with('product_models')->get();
            }
            return DataTables::of($purchase_data)->make(true);
        }
    }

    public function stock_report() {
        $products = ProductModel::pluck('product_model_name','id');
        return view('reports.stock_report',compact('products'));

    }

    public function get_stock_data(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->product_id)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $product_id = $request->product_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($product_id == ''){
                    $product_data = ProductModel::with('product_type')->with('stock_item_group')->get();
                }else {
                    $product_data = ProductModel::where('id',$product_id)->with('product_type')->with('stock_item_group')->get();
                }

            } else {
//              $product_data = Trip::orderBy('id', 'desc')->get();
                $product_data = ProductModel::with('product_type')->with('stock_item_group')->get();
            }
            return DataTables::of($product_data)->make(true);
        }
    }


    public function customer_report() {
        return view('reports.customer_report');

    }



}
