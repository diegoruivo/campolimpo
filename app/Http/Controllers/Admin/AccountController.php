<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Account;
use CampoLimpo\Bank;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        $users = User::orderBy('name')->get();
        $banks = Bank::orderBy('bank')->get();
        $system = System::where('id', 1)->first();


        return view('admin.accounts.index', [
            'accounts' => $accounts,
            'users' => $users,
            'banks' => $banks,
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
        $banks = Bank::orderBy('bank')->get();
        $system = System::where('id', 1)->first();

        if (!empty($request->user)) {
            $user = User::where('id', $request->user)->first();
        }

        return view('admin.accounts.create', [
            'users' => $users,
            'banks' => $banks,
            'system' => $system,
            'selected_user' => (!empty($user) ? $user : null),
            'selected_bank' => (!empty($bank) ? $bank : null)
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
        $createAccount= Account::create($request->all());

        return redirect()->route('admin.accounts.edit', [
            'account' => $createAccount->id
        ])->with(['color' => 'green', 'message' => 'Dados Bancários cadastrados com sucesso!']);
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
        $account = Account::where('id', $id)->first();
        $users = User::orderBy('name')->get();
        $banks = Bank::orderBy('bank')->get();
        $system = System::where('id', 1)->first();


        return view('admin.accounts.edit', [
            'account' => $account,
            'users' => $users,
            'banks' => $banks,
            'system' => $system,
            'selected_user' => (!empty($user) ? $user : null),
            'selected_bank' => (!empty($bank) ? $bank : null)
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
        $account = Account::where('id', $id)->first();
        $account->fill($request->all());
        $account->save();

        $users = User::orderBy('name')->get();
        $banks = Bank::orderBy('bank')->get();
        $system = System::where('id', 1)->first();


        return redirect()->route('admin.accounts.edit', [
            'account' => $account->id
        ])->with(['color' => 'green', 'message' => 'Dados Bancários atualizados com sucesso!']);
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
