<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\RuralEnvironmentalRegistry;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class RuralEnvironmentalRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rural_environmental_registrations = RuralEnvironmentalRegistry::all();
        $system = System::where('id', 1)->first();

        return view('admin.rural_environmental_registrations.index', [
            'rural_environmental_registrations' => $rural_environmental_registrations,
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

        return view('admin.rural_environmental_registrations.create', [
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
        $createRuralEnvironmentalRegistry = RuralEnvironmentalRegistry::create($request->all());

        return redirect()->route('admin.rural_environmental_registrations.edit', [
            'rural_environmental_registry' => $createRuralEnvironmentalRegistry->id
        ])->with(['color' => 'green', 'message' => 'CAR cadastrado com sucesso!']);
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
        $rural_environmental_registry = RuralEnvironmentalRegistry::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.rural_environmental_registrations.edit', [
            'rural_environmental_registry' => $rural_environmental_registry,
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
        $updateRuralEnvironmentalRegistry = RuralEnvironmentalRegistry::where('id', $id)->first();
        $updateRuralEnvironmentalRegistry->fill($request->all());
        $updateRuralEnvironmentalRegistry->save();

        return redirect()->route('admin.rural_environmental_registrations.edit', [
            'rural_environmental_registry' => $updateRuralEnvironmentalRegistry->id
        ])->with(['color' => 'green', 'message' => 'CAR atualizado com sucesso!']);
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
