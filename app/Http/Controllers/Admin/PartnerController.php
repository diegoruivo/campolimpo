<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Partner;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        $system = System::where('id', 1)->first();

        return view('admin.partners.index', [
           'partners' => $partners,
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

        return view('admin.partners.index', [
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
        $createPartner= new Partner();

        if(!empty($request->file('path'))) {
            $createPartner->path = $request->file('path')->store('partners');
        }
        $createPartner->title = $request->title;
        $createPartner->description = $request->description;
        $createPartner->save();

        return redirect()->route('admin.service_category.edit', [
            'partner' => $createPartner->id
        ])->with(['color' => 'green', 'message' => 'Parceiro Site cadastrado com sucesso!']);
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
        $partner = Partner::where('id', $id)->first();
        $system = System::where('id', 1)->first();

        return view('admin.partners.index', [
            'partner' => $partner,
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
        $updatePartner = Partner::where('id', $id)->first();
        $updatePartner->fill($request->all());
        $updatePartner->save();


        if (!empty($request->file('path'))) {
            $updatePartner->path= $request->file()['path']->store('partners');
        }
        $updatePartner->save();


        return redirect()->route('admin.partners.edit', [
            'partner' => $updatePartner->id
        ])->with(['color' => 'green', 'message' => 'Parceiro Site atualizado com sucesso!']);
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
