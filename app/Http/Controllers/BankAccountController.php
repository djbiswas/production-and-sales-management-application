<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankAccountController extends Controller
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
        $banks = BankAccount::get();
        return view('bankAccounts.index',compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bankAccounts.create');
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
            'name' => 'required',
            'branch' => 'required'
        ]);

        $bankAccount = New BankAccount();
        $bankAccount->name = $request->name;
        $bankAccount->branch = $request->branch;

        $bankAccount->save();

        flash('New Bank Add Success')->success();

        return redirect()->route('bankAccounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        return view('bankAccounts.edit',compact('bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required'

        ]);
        $bankAccount->name = $request->name;
        $bankAccount->branch = $request->branch;
        $bankAccount->save();

        flash('Bank Account Update Success')->success();

        return redirect()->route('bankAccounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
