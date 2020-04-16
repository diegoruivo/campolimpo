<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Company;
use CampoLimpo\System;
use CampoLimpo\User;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;
use \CampoLimpo\Http\Requests\Admin\Company as CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $system = System::where('id', 1)->first();

        return view('admin.companies.index', [
            'companies' => $companies,
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



        return view('admin.companies.create', [
            'users' => $users,
            'system' => $system,
            'selected' => (!empty($user) ? $user : null)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {


        $companyCreate = Company::create($request->all());

        return redirect()->route('admin.companies.edit', [
            'company' => $companyCreate->id
        ])->with(['color' => 'green', 'message' => 'Empresa cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();
        $system = System::where('id', 1)->first();
        $users = User::orderBy('name')->get();

        return view('admin.companies.edit', [
            'company' => $company,
            'system' => $system,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::where('id', $id)->first();
        $company->fill($request->all());
        $company->save();

        return redirect()->route('admin.companies.edit', [
            'company' => $company->id
        ])->with(['color' => 'green', 'message' => 'Empresa atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
