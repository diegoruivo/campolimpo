<?php

namespace CampoLimpo\Http\Controllers\Admin;

use CampoLimpo\Buttons;
use CampoLimpo\System;
use Illuminate\Http\Request;
use CampoLimpo\Http\Controllers\Controller;

class ButtonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = Buttons::orderBy('position', 'ASC')->get();
        $system = System::where('id', 1)->first();

        return view('admin.buttons.index', [
            'buttons' => $buttons,
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

        return view('admin.buttons.create', [
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
        $createButton= Buttons::create($request->all());

        return redirect()->route('admin.buttons.edit', [
            'button' => $createButton->id
        ])->with(['color' => 'green', 'message' => 'Botão cadastrado com sucesso!']);
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
        $button = Buttons::where('id', $id)->first();
        $system = System::where('id', 1)->first();

        return view('admin.buttons.edit', [
            'button' => $button,
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
        $updateButton= Buttons::where('id', $id)->first();
        $updateButton->fill($request->all());
        $updateButton->save();

        return redirect()->route('admin.buttons.edit', [
            'button' => $updateButton->id
        ])->with(['color' => 'green', 'message' => 'Botão atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buttons $button)
    {
        $buttonDestroy = Buttons::destroy($button->id);

        return redirect()->route('admin.buttons.index', [
            'button' => $button->id
        ])->with(['color' => 'green', 'message' => 'Botão excluído com sucesso!']);
    }
}
