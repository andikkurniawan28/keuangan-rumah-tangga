<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Models\Globalization;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $global = Globalization::index();
        $income = Income::all();
        return view('income.index', compact('global', 'income'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $global = Globalization::index();
        return view('income.create', compact('global'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Income::create($request->all());
        return redirect()->route('income.index')->with('success', ucfirst('pemasukan has been stored.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $global = Globalization::index();
        $income = Income::whereId($id)->get()->last();
        return view('income.show', compact('global', 'income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $global = Globalization::index();
        $income = Income::whereId($id)->get()->last();
        return view('income.edit', compact('global', 'income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Income::whereId($id)->update([
            'description' => $request->description,
            'value' => $request->value,
        ]);
        return redirect()->route('income.index')->with('success', ucfirst('pemasukan has been updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Income::whereId($id)->delete();
        return redirect()->route('income.index')->with('success', ucfirst('pemasukan has been deleted.'));
    }
}
