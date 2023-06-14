<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Models\Globalization;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $global = Globalization::index();
        $expenditure = Expenditure::all();
        return view('expenditure.index', compact('global', 'expenditure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $global = Globalization::index();
        return view('expenditure.create', compact('global'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Expenditure::create($request->all());
        return redirect()->route('expenditure.index')->with('success', ucfirst('pengeluaran has been stored.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $global = Globalization::index();
        $expenditure = Expenditure::whereId($id)->get()->last();
        return view('expenditure.show', compact('global', 'expenditure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $global = Globalization::index();
        $expenditure = Expenditure::whereId($id)->get()->last();
        return view('expenditure.edit', compact('global', 'expenditure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Expenditure::whereId($id)->update([
            'description' => $request->description,
            'value' => $request->value,
        ]);
        return redirect()->route('expenditure.index')->with('success', ucfirst('pengeluaran has been updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expenditure::whereId($id)->delete();
        return redirect()->route('expenditure.index')->with('success', ucfirst('pengeluaran has been deleted.'));
    }
}
