<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\CallSector;
use CampoLimpo\Contract;
use CampoLimpo\Document;
use CampoLimpo\DocumentCategory;
use CampoLimpo\Http\Requests\Admin\Contract as ContractRequest;
use CampoLimpo\Service;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();
        $system = System::where('id', 1)->first();

        return view('admin.contracts.index', [
            'contracts' => $contracts,
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
        $services = Service::orderBy('title')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        if (!empty($request->service)) {
            $service = Service::where('id', $request->service)->first();
        }

        return view('admin.contracts.create', [
            'users' => $users,
            'services' => $services,
            'system' => $system,
            'selected' => (!empty($user) ? $user : null)
        ]);

        return view('admin.contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {

        $createContract= Contract::create($request->all());
        $createContract->terms = $request->terms;
        $createContract->save();

        return redirect()->route('admin.contracts.edit', [
            'contract' => $createContract->id
        ])->with(['color' => 'green', 'message' => 'Contrato cadastrado com sucesso!']);
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
        $contract = Contract::where('id', $id)->first();
        $users = User::orderBy('name')->get();
        $services = Service::orderBy('id')->get();
        $sectors = CallSector::all();
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.contracts.edit', [
            'contract' => $contract,
            'users' => $users,
            'services' => $services,
            'sectors' => $sectors,
            'system' => $system,
            'selected' => (!empty($user) ? $user : null)
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
        $updateContract= Contract::where('id', $id)->first();
        $updateContract->fill($request->all());
        $updateContract->save();
        $updateContract->terms = $request->terms;
        $updateContract->save();

        return redirect()->route('admin.contracts.edit', [
            'contract' => $updateContract->id
        ])->with(['color' => 'green', 'message' => 'Contrato atualizado com sucesso!']);
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
