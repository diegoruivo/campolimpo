<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\CallSector;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class CallSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = CallSector::all();
        return view('admin.call_sectors.index', [
            'sectors' => $sectors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.call_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createSector= CallSector::create($request->all());

        return redirect()->route('admin.call_sectors.edit', [
            'service' => $createSector->id
        ])->with(['color' => 'green', 'message' => 'Setor de Atendimento cadastrado com sucesso!']);
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
        $sector = CallSector::where('id', $id)->first();

        return view('admin.call_sectors.edit', [
            'sector' => $sector
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
        $sector = CallSector::where('id', $id)->first();
        $sector->fill($request->all());
        $sector->save();

        return redirect()->route('admin.call_sectors.edit', [
            'sector' => $sector->id
        ])->with(['color' => 'green', 'message' => 'Setor de Atendimento atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
