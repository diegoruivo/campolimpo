<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Call;
use CampoLimpo\CallSector;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::orderBy('id', 'DESC')->get();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();
        $services = Service::orderBy('title')->get();
        $sectors = CallSector::all();

        return view('admin.calls.index', [
            'calls' => $calls,
            'system' => $system,
            'users' => $users,
            'services' => $services,
            'sectors' => $sectors
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
        $services = Service::orderBy('title')->get();
        $sectors = CallSector::all();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        if (!empty($request->service)) {
            $service = Service::where('id', $request->service)->first();
        }

        if (!empty($request->sector)) {
            $sector = CallSector::where('id', $request->sector)->first();
        }

        return view('admin.calls.create', [
            'users' => $users,
            'system' => $system,
            'services' => $services,
            'sectors' => $sectors
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
        $createCall= Call::create($request->all());

        return redirect()->route('admin.calls.edit', [
            'call' => $createCall->id
        ])->with(['color' => 'green', 'message' => 'Atendmento cadastrado com sucesso!']);

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
    public function edit(Request $request,$id)
    {
        $call = Call::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();
        $sectors = CallSector::orderBy('title')->get();
        $services = Service::orderBy('id')->get();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        if (!empty($request->service)) {
            $service = Service::where('id', $request->service)->first();
        }

        if (!empty($request->sector)) {
            $sector = CallSector::where('id', $request->sector)->first();
        }

        return view('admin.calls.edit', [
            'call' => $call,
            'system' => $system,
            'users' => $users,
            'services' => $services,
            'sectors' => $sectors
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
        $updateCall = Call::where('id', $id)->first();
        $updateCall->fill($request->all());
        $updateCall->save();

        return redirect()->route('admin.calls.edit', [
            'call' => $updateCall->id
        ])->with(['color' => 'green', 'message' => 'Atendimento atualizado com sucesso!']);
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
