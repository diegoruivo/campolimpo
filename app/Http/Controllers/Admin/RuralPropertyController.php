<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\RuralProperty;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class RuralPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rural_properties = RuralProperty::all();
        $system = System::where('id', 1)->first();

        return view('admin.rural_properties.index', [
            'rural_properties' => $rural_properties,
            'system' => $system
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::orderBy('name')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.rural_properties.create', [
            'users' => $users,
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
        $createRuralProperty = RuralProperty::create($request->all());

        return redirect()->route('admin.rural_properties.edit', [
            'rural_property' => $createRuralProperty->id
        ])->with(['color' => 'green', 'message' => 'Imóvel Rural cadastrado com sucesso!']);
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
    public function edit(Request $request, $id)
    {
        $rural_property = RuralProperty::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();


        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.rural_properties.edit', [
            'rural_property' => $rural_property,
            'system' => $system,
            'users' => $users
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
        $updateRuralProperty = RuralProperty::where('id', $id)->first();
        $updateRuralProperty->fill($request->all());
        $updateRuralProperty->save();

        return redirect()->route('admin.rural_properties.edit', [
            'rural_property' => $updateRuralProperty->id
        ])->with(['color' => 'green', 'message' => 'Imóvel Rural atualizado com sucesso!']);
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
