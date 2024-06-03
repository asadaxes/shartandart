<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Atribute;
use App\Models\Atributevalue;
use Illuminate\Http\Request;

class AtributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.atribute.index', [
            'atributes' => Atribute::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:atributes,name',
            'value' => 'required',
        ]);

        Atribute::createAtribute($request);
        return redirect()->route('atribute.index')->with('success', 'Atribute created Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.atribute.edit', [
            'atribute' => Atribute::find($id),
            'atributes' => Atribute::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:atributes,name,' . $id,
            'value' => 'required'
        ]);

        Atribute::updateAtribute($request, $id);
        return redirect()->route('atribute.index')->with('success', 'Atribute updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Atribute::destroy($id);
        return redirect()->route('atribute.index')->with('success','Atribute deleted Successfully...');
    }

    public function attributevalues(Request $request)
    {
        $atribute = Atribute::find($request->attribute_id);
        $atributevalues = Atributevalue::where('atribute_id', $atribute->id)->get();
        return response()->json($atributevalues);
    }
}