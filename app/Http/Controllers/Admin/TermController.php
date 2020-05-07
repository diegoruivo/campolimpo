<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\System;
use CampoLimpo\Term;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::all();
        $system = System::where('id', 1)->first();

        return view('admin.terms.index', [
            'terms' => $terms,
            'system' => $system
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $system = System::where('id', 1)->first();

        return view('admin.terms.create', [
            'system' => $system
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $termCreate = Term::create($request->all());

        return redirect()->route('admin.terms.edit', [
            'term' => $termCreate->id
        ])->with(['color' => 'green', 'message' => 'Termo Contratual cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::where('id', $id)->first();
        $system = System::where('id', 1)->first();

        return view('admin.terms.edit', [
            'term' => $term,
            'system' => $system
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateTerm = Term::where('id', $id)->first();
        $updateTerm->fill($request->all());
        $updateTerm->save();

        return redirect()->route('admin.terms.edit', [
            'term' => $updateTerm->id
        ])->with(['color' => 'green', 'message' => 'Termo Contratual atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termDestroy = Term::destroy($id);

        return redirect()->route('admin.terms.index', [
            'term' => $id
        ])->with(['color' => 'green', 'message' => 'Termo Contratual excluído com sucesso!']);
    }
}
