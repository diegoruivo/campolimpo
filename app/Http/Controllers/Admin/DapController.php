<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Dap;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class DapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daps = Dap::all();
        $system = System::where('id', 1)->first();

        return view('admin.daps.index', [
            'daps' => $daps,
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

        return view('admin.daps.create', [
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
        $createDap = Dap::create($request->all());

        return redirect()->route('admin.daps.edit', [
            'dap' => $createDap->id
        ])->with(['color' => 'green', 'message' => 'DAP cadastrada com sucesso!']);
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
        $dap= Dap::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.daps.edit', [
            'dap' => $dap,
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
        $updateDap = Dap::where('id', $id)->first();
        $updateDap->fill($request->all());
        $updateDap->save();

        return redirect()->route('admin.daps.edit', [
            'dap' => $updateDap->id
        ])->with(['color' => 'green', 'message' => 'DAP atualizada com sucesso!']);
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
