<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Lc;
use Illuminate\Http\Request;

class LcController extends Controller
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
        $lcs = Lc::with('banksAccount')->get();
        return view('lcs.index',compact('lcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = BankAccount::pluck('name','id');
        return view('lcs.create',compact('banks'));
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
            'date' => 'required',
            'name' => 'required',
            'bank_account_id' => 'required',
            'amount' => 'sometimes',
            'price' => 'sometimes',
            'note' => 'sometimes'

        ]);

        $lc = New Lc();
        $lc->date = $request->date;
        $lc->name = $request->name;
        $lc->bank_account_id = $request->bank_account_id;
        $lc->amount = $request->amount;
        $lc->av_qty = $request->amount;
        $lc->price = $request->price;
        $lc->note = $request->note;

        $lc->save();

        flash('New LC Add Success')->success();

        return redirect()->route('lcs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function show(Lc $lc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function edit(Lc $lc)
    {
        $banks = BankAccount::pluck('name','id');
        return view('lcs.edit',compact('lc','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lc $lc)
    {
        $this->validate($request, [
            'date' => 'required',
            'name' => 'required',
            'bank_account_id' => 'required',
            'amount' => 'sometimes',
            'av_qty' => 'sometimes',
            'price' => 'sometimes',
            'note' => 'sometimes'

        ]);

        $lc->date = $request->date;
        $lc->name = $request->name;
        $lc->bank_account_id = $request->bank_account_id;
        $lc->amount = $request->amount;
        $lc->av_qty = $request->amount;
        $lc->price = $request->price;
        $lc->note = $request->note;

        $lc->save();

        flash('LC Update Success')->success();

        return redirect()->route('lcs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lc $lc)
    {
        //
    }
}
