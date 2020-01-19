<?php

namespace App\Http\Controllers;

use App\Lc;
use Illuminate\Http\Request;

class LcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lcs = Lc::get();
        return view('lcs.index',compact('lcs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lcs.create');
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
            'note' => 'sometimes'

        ]);

        $stockUnit = New Lc();
        $stockUnit->name = $request->name;
        $stockUnit->note = $request->note;

        $stockUnit->save();

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
        return view('lcs.edit',compact('lc'));
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
            'name' => 'required',
            'note' => 'sometimes'

        ]);

        $stockUnit = Lc::find($lc->id);
        $stockUnit->name = $request->name;
        $stockUnit->note = $request->note;

        $stockUnit->save();

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
