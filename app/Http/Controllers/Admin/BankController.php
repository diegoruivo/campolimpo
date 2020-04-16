<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Bank;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        $system = System::where('id', 1)->first();

        return view('admin.banks.index', [
            'banks' => $banks,
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

        return view('admin.banks.create', [
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
        $createBank = Bank::create($request->all());

        return redirect()->route('admin.banks.edit', [
            'bank' => $createBank->id
        ])->with(['color' => 'green', 'message' => 'Banco cadastrado com sucesso!']);
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
        $bank = Bank::where('id', $id)->first();
        $system = System::where('id', 1)->first();

        return view('admin.banks.edit', [
            'bank' => $bank,
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
        $updateBank = Bank::where('id', $id)->first();
        $updateBank->fill($request->all());
        $updateBank->save();

        if (!empty($request->file('logo'))) {
            $updateBank->logo = $request->file('logo')->store('bank');
            $updateBank->save();
        }


        return redirect()->route('admin.banks.edit', [
            'bank' => $updateBank->id
        ])->with(['color' => 'green', 'message' => 'Banco atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $destroyBank = Bank::destroy($bank->id);

        return redirect()->route('admin.banks.index', [
            'bank' => $bank->id
        ])->with(['color' => 'green', 'message' => 'Banco excluído com sucesso!']);
    }
}
